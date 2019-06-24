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
require ('includes/crear-shortcodes.php');

/********  CREAR MENU PARA DESCARGAR CSV    ************/
function crear_menu(){
    add_menu_page('Descarga CSV', 'Descarga Encuesta', 'activate_plugins', 'descarga_csv', 'funcion_descarga', '', 7);
}
add_action('admin_menu', 'crear_menu');

/*******    BTN DESCARGA CSV Y CREACION DEL ARCHIVO CSV ********/
function funcion_descarga(){
    $ruta_fichero_descarga = "/wp-content/plugins/encuesta-life-arimeda/salida-csv/descarga-csv.xlsx";
    echo '<a href="' . $ruta_fichero_descarga . '" class="enlace-descarga-csv" download="">Descargar datos encuesta</a>';

    include($_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/encuesta-life-arimeda/includes/funciones_csv.php");
    generar_archivo_csv();
}

function encolar_los_estilos_del_plugin() {
    wp_enqueue_style( 'estilos-encuesta', '/wp-content/plugins/encuesta-life-arimeda/css/estilos-encuesta.css' );
}
add_action( 'wp_enqueue_scripts', 'encolar_los_estilos_del_plugin' );