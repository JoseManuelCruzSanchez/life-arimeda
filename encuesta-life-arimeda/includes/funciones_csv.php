<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 20/06/2019
 * Time: 19:38
 */
function generar_archivo_csv(){
    include_once("xlsxwriter.class.php");
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);

    $ruta_crear_fichero = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/encuesta-life-arimeda/salida-csv/descarga-csv.xlsx';

    global $wpdb;
    $data = json_decode(json_encode($wpdb->get_results("select * from encuesta"), true));

    //echo '<pre>' . var_export($data, true) . '</pre>';
    $encabezados = array("id","id_usuario","fecha","idioma","region","profesion_ganadero","profesion_agricultor","profesion_administracion","profesion_centro_investigacion","profesion_educacion","profesion_tecnico","profesion_tecnologia_equipos","profesion_otros","edad","conoce_life_arimeda","como_conoce_life","aa_importancia_preservar","aa_gestion_purin_derivados","aa_gestion_purin","aa_consecuencias_salud","pla_valoracion_general","pla_contribucion_zonas_agricolas_mediterraneas","pla_sostenibilidad_desarrollo","rn","rn_web","rn_twiter","rn_email","rn_otros","textarea_observaciones");
    $array_matriz = array();

    foreach ($data as $fila){
        $array_fila = array();
        foreach ($fila as $item){
            array_push($array_fila, $item);
        }
        array_push($array_matriz, $array_fila);
    }
    $styles1 = array( 'font'=>'Arial','font-size'=>12,'font-style'=>'bold', 'fill'=>'#a3b92a', 'halign'=>'center', 'border'=>'left,right,top,bottom');
    $writer = new XLSXWriter();
    $writer->setAuthor('www.cruzestudio.es');
    $writer->writeSheetRow('Datos encuesta Life Arimeda', $encabezados, $styles1);
    foreach($array_matriz as $row)
        $writer->writeSheetRow('Datos encuesta Life Arimeda', $row);

    $writer->writeToFile($ruta_crear_fichero);

//echo $writer->writeToString();
    exit(0);
}

//function generar_archivo_csv(){
//    //    //$ruta_crear_fichero = "../salida-csv/descarga-csv.xlsx";
//    $ruta_crear_fichero = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/encuesta-life-arimeda/salida-csv/descarga-csv.csv';
////    $ruta_crear_fichero = $_SERVER['DOCUMENT_ROOT']. "/wp-content/themes/Impreza-child/descarga-csv.csv";
//
//    global $wpdb;
//    $data = json_decode(json_encode($wpdb->get_results("select * from encuesta"), true));
//
//    $fila_csv = "id;id_usuario;fecha;profesion_ganadero;profesion_agricultor;profesion_administracion;profesion_centro_investigacion;profesion_educacion;profesion_tecnico;profesion_tecnologia_equipos;profesion_otros;edad;conoce_life_arimeda;como_conoce_life;aa_importancia_preservar;aa_gestion_purin_derivados;aa_gestion_purin;aa_consecuencias_salud;pla_valoracion_general;pla_contribucion_zonas_agricolas_mediterraneas;pla_sostenibilidad_desarrollo;rn;rn_web;rn_twiter;rn_email;rn_otros;textarea_observaciones;\n";
//    foreach ($data as $fila){
//        foreach ($fila as $item){
//            $fila_csv .= $item . ";";
////            echo '<pre>' . var_export($item, true) . '</pre>';
//        }
//        $fila_csv .= "\n";
//    }
//
//    echo $fila_csv;
//    $file = fopen($ruta_crear_fichero,"w");
//    fwrite($file, $fila_csv);
//    fclose($file);
//
//
//    echo '<hr><hr><hr><hr>';
//    echo '<pre>' . var_export($data, true) . '</pre>';
//}


