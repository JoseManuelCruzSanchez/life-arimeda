<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 17/06/2019
 * Time: 17:06
 */

$datos['profesion-ganadero'] = "";
$datos['profesion-agricultor'] = "";
$datos['profesion-administracion'] = "";
$datos['profesion-centro-investigacion'] = "";
$datos['profesion-educacion'] = "";
$datos['profesion-tecnico'] = "";
$datos['profesion-tecnologia-equipos'] = "";
$datos['profesion-otros'] = "";

    if(isset($_REQUEST['profesion-ganadero'])){
        $datos['profesion-ganadero'] = $_REQUEST['profesion-ganadero'];
    }
    if(isset($_REQUEST['profesion-agricultor'])){
        $datos['profesion-agricultor'] = $_REQUEST['profesion-agricultor'];
    }

    if(isset($_REQUEST['profesion-administracion'])){
        $datos['profesion-administracion'] = $_REQUEST['profesion-administracion'];
    }
    if(isset($_REQUEST['profesion-centro-investigacion'])){
        $datos['profesion-centro-investigacion'] = $_REQUEST['profesion-centro-investigacion'];
    }
    if(isset($_REQUEST['profesion-educacion'])){
        $datos['profesion-educacion'] = $_REQUEST['profesion-educacion'];
    }
    if(isset($_REQUEST['profesion-tecnico'])){
        $datos['profesion-tecnico'] = $_REQUEST['profesion-tecnico'];
    }
    if(isset($_REQUEST['profesion-tecnologia-equipos'])){
        $datos['profesion-tecnologia-equipos'] = $_REQUEST['profesion-tecnologia-equipos'];
    }
    if(isset($_REQUEST['profesion-otros'])){
        $datos['profesion-otros'] = $_REQUEST['profesion-otros'];
    }

$datos['edad'] = "";

    if(isset($_REQUEST['edad'])){
        $datos['edad'] = $_REQUEST['edad'];
    }

$datos['conoce-life-arimeda'] = "";
$datos['como-conoce-life'] = "";

    if(isset($_REQUEST['conoce-life-arimeda'])){
        $datos['conoce-life-arimeda'] = $_REQUEST['conoce-life-arimeda'];
    }
    if(isset($_REQUEST['como-conoce-life'])){
        $datos['como-conoce-life'] = $_REQUEST['como-conoce-life'];
    }

$datos['aa-importancia-preservar'] = "";
$datos['aa-gestion-purin-derivados'] = "";
$datos['aa-gestion-purin'] = "";
$datos['aa-consecuencias-salud'] = "";

    if(isset($_REQUEST['aa-importancia-preservar'])){
        $datos['aa-importancia-preservar'] = $_REQUEST['aa-importancia-preservar'];
    }
    if(isset($_REQUEST['aa-gestion-purin-derivados'])){
        $datos['aa-gestion-purin-derivados'] = $_REQUEST['aa-gestion-purin-derivados'];
    }
    if(isset($_REQUEST['aa-gestion-purin'])){
        $datos['aa-gestion-purin'] = $_REQUEST['aa-gestion-purin'];
    }
    if(isset($_REQUEST['aa-consecuencias-salud'])){
        $datos['aa-consecuencias-salud'] = $_REQUEST['aa-consecuencias-salud'];
    }

$datos['pla-valoracion-general'] = "";
$datos['pla-contribucion-zonas-agricolas-mediterraneas'] = "";
$datos['pla-sostenibilidad-desarrollo'] = "";

    if(isset($_REQUEST['pla-valoracion-general'])){
        $datos['pla-valoracion-general'] = $_REQUEST['pla-valoracion-general'];
    }
    if(isset($_REQUEST['pla-contribucion-zonas-agricolas-mediterraneas'])){
        $datos['pla-contribucion-zonas-agricolas-mediterraneas'] = $_REQUEST['pla-contribucion-zonas-agricolas-mediterraneas'];
    }
    if(isset($_REQUEST['pla-sostenibilidad-desarrollo'])){
        $datos['pla-sostenibilidad-desarrollo'] = $_REQUEST['pla-sostenibilidad-desarrollo'];
    }

$datos['rn'] = "";
$datos['rn-web'] = "";
$datos['rn-twiter'] = "";
$datos['rn-email'] = "";
$datos['rn-otros'] = "";

    if(isset($_REQUEST['rn'])){
        $datos['rn'] = $_REQUEST['rn'];
    }
    if(isset($_REQUEST['rn-web'])){
        $datos['rn-web'] = $_REQUEST['rn-web'];
    }
    if(isset($_REQUEST['rn-twiter'])){
        $datos['rn-twiter'] = $_REQUEST['rn-twiter'];
    }
    if(isset($_REQUEST['rn-email'])){
        $datos['rn-email'] = $_REQUEST['rn-email'];
    }
    if(isset($_REQUEST['rn-otros'])){
        $datos['rn-otros'] = $_REQUEST['rn-otros'];
    }

$datos['textarea-observaciones'] = "";

    if(isset($_REQUEST['textarea-observaciones'])){
        $datos['textarea-observaciones'] = $_REQUEST['textarea-observaciones'];
    }





define("DB_USUARIO", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");
define("DB_NOMBRE_BASE_DATOS", "life_arimeda");



$fecha_comillas = $datetime = date("Y-m-d H:i:s", mktime(10, 30, 0, 6, 10, 2015));

function guardar_encuesta($datos){
    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASS, DB_NOMBRE_BASE_DATOS);
    mysqli_set_charset($conexion, 'utf8');
    if ($conexion->connect_error) {
        die("La conexión ha fallado " . $conexion->connect_error);
    }
    //$sql = "INSERT INTO encuesta (nick, referencia, cantidad) VALUES (?, ?, ?)";
    $sql = "INSERT INTO encuesta (id_usuario, fecha, profesion_ganadero, profesion_agricultor, profesion_administracion, profesion_centro_investigacion, profesion_educacion, profesion_tecnico, profesion_tecnologia_equipos, profesion_otros, edad, conoce_life_arimeda, como_conoce_life, aa_importancia_preservar, aa_gestion_purin_derivados, aa_gestion_purin, aa_consecuencias_salud, pla_valoracion_general, pla_contribucion_zonas_agricolas_mediterraneas, pla_sostenibilidad_desarrollo, rn, rn_web, rn_twiter, rn_email, rn_otros, textarea_observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sentencia = $conexion->prepare($sql);



    $sentencia->bind_param('ssssssssssssssssssssssssss', $datos['id_usuario'], $fecha_comillas, $datos['profesion_ganadero'], $datos['rofesion-agricultor'], $datos['profesion-administracion'], $datos['profesion-centro-investigacion'], $datos['profesion-educacion'], $datos['profesion-tecnico'], $datos['profesion-tecnologia-equipos'], $datos['profesion-otros'], $datos['edad'], $datos['conoce-life-arimeda'], $datos['como-conoce-life'], $datos['aa-importancia-preservar'], $datos['aa-gestion-purin-derivados'], $datos['aa-gestion-purin'], $datos['aa-consecuencias-salud'], $datos['pla-valoracion-general'], $datos['pla-contribucion-zonas-agricolas-mediterraneas'], $datos['pla-sostenibilidad-desarrollo'], $datos['rn'], $datos['rn-web'], $datos['rn-twiter'], $datos['rn-email'], $datos['rn-otros'], $datos['textarea-observaciones']);




    $sentencia->execute();

    echo '<pre>' . var_export($sentencia, true) . '</pre>';

    $sentencia->close();
    $conexion->close();
}
guardar_encuesta($datos);

function prueba(){
    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASS, DB_NOMBRE_BASE_DATOS);
    mysqli_set_charset($conexion, 'utf8');
    if ($conexion->connect_error) {
        die("La conexión ha fallado " . $conexion->connect_error);
    }



    $sql = "insert into pp (xx) values (?)";
    $sentencia = $conexion->prepare($sql);




    $pepe = "hola";
    $sentencia->bind_param('s', $pepe);


    $sentencia->execute();

    echo '<pre>' . var_export($sentencia, true) . '</pre>';

    $sentencia->close();
    $conexion->close();
}

prueba();