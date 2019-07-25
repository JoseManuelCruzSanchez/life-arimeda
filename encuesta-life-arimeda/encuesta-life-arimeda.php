<?php
/*
Plugin Name: Encuesta Life Arimeda
Plugin URI: https://cruzestudio.es/
Description: Plugin para encuesta. Shortcodes:  [short_encuesta]  [short_mensaje_quiere_hacer_encuesta]
Version: 1.0
Author: Cruz Estudio
Author URI: https://cruzestudio.es/
License: GPLv2 o posterior
*/

defined('ABSPATH') or die('La seguridad es lo primero');

require ('includes/crear-shortcodes.php');

/********  CREAR MENU PARA DESCARGAR CSV    ************/
function crear_menu(){
    add_menu_page('Descarga CSV', 'Descarga Encuesta', 'activate_plugins', 'descarga_csv', 'funcion_descarga', '
dashicons-download', 7);
}
add_action('admin_menu', 'crear_menu');

/*******    BTN DESCARGA CSV Y CREACION DEL ARCHIVO CSV ********/
function funcion_descarga(){
    $ruta_imagen = '/wp-content/plugins/encuesta-life-arimeda/imagenes/excel.png';
    $ruta_fichero_descarga = "/wp-content/plugins/encuesta-life-arimeda/salida-csv/descarga-csv.xlsx";
    echo '<div class="wrap">
            <h1 id="info-usuarios-contestan-encuesta">' . cuantos_usuarios_han_rellenado_la_encuesta() . '</h1>
            <div class="cont-enlace-descarga-excel">
                <a href="' . $ruta_fichero_descarga . '" class="enlace-descarga-csv" download="">
                    <img src="' . $ruta_imagen . '">
                </a>
                <p>Descarga Datos Encuesta</p>
            </div>            
          </div>';

    include($_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/encuesta-life-arimeda/includes/funciones_csv.php");
    generar_archivo_csv();
}

function estilos_frontend() {
    wp_enqueue_style( 'estilos-encuesta-frontend', '/wp-content/plugins/encuesta-life-arimeda/css/estilos-encuesta.css' );
}
add_action( 'wp_enqueue_scripts', 'estilos_front_end' );

function estilos_backend() {
    wp_enqueue_style( 'estilos-encuesta-backend', '/wp-content/plugins/encuesta-life-arimeda/css/backend-estilos.css' );
}
add_action( 'admin_enqueue_scripts', 'estilos_backend' );

function cuantos_usuarios_han_rellenado_la_encuesta(){
    global $wpdb;
    $resultado = json_decode(json_encode($wpdb->get_results("select count(*) from encuesta")), true);
    $resultado = intval($resultado[0]['count(*)']);
    if ($resultado === 0){
        return 'Ningún usuario ha contestado a la encuesta todavía';
    }
    else if ($resultado === 1){
        return '1 usuario ha contestado la encuesta';
    }
    else if ($resultado > 1){
        return $resultado . 'usuarios han contestado la encuesta';
    }
}

