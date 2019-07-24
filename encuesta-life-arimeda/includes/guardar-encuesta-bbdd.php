<?php
/**
 * Created by PhpStorm.
 * User: José Manuel Cruz Sánchez
 * Date: 17/06/2019
 * Time: 17:06
 */

require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

global $wpdb;
global $current_user;

$id_usuario = get_current_user_id();
$ha_rellenado_encuesta = $wpdb->get_results("select * from encuesta where id_usuario like $id_usuario");

if( $ha_rellenado_encuesta ){
    wp_redirect(home_url());
    die;
}

$tabla_encuesta = 'encuesta';
$datos = crear_array_desde_formulario_encuesta();
$resultado = $wpdb->insert($tabla_encuesta, $datos);

wp_redirect(home_url());

function crear_array_desde_formulario_encuesta(){
    $datos['id_usuario'] = get_current_user_id();
    $datos['fecha'] = (new DateTime('now'))->format('Y-m-d H:i:s');

    $datos['idioma'] = '';
    $datos['region'] = '';
    if(isset($_REQUEST['idioma'])){
        $datos['idioma'] = $_REQUEST['idioma'];
    }
    if(isset($_REQUEST['region'])){
        $datos['region'] = $_REQUEST['region'];
    }


    $datos['profesion_ganadero'] = '';
    $datos['profesion_agricultor'] = '';
    $datos['profesion_administracion'] = "";
    $datos['profesion_centro_investigacion'] = "";
    $datos['profesion_educacion'] = "";
    $datos['profesion_tecnico'] = "";
    $datos['profesion_tecnologia_equipos'] = "";
    $datos['profesion_otros'] = "";

    if(isset($_REQUEST['profesion-ganadero'])){
        $datos['profesion_ganadero'] = 'x';
    }
    if(isset($_REQUEST['profesion-agricultor'])){
        $datos['profesion_agricultor'] = 'x';
    }
    if(isset($_REQUEST['profesion-administracion'])){
        $datos['profesion_administracion'] = 'x';
    }
    if(isset($_REQUEST['profesion-centro-investigacion'])){
        $datos['profesion_centro_investigacion'] = 'x';
    }
    if(isset($_REQUEST['profesion-educacion'])){
        $datos['profesion_educacion'] = 'x';
    }
    if(isset($_REQUEST['profesion-tecnico'])){
        $datos['profesion_tecnico'] = 'x';
    }
    if(isset($_REQUEST['profesion-tecnologia-equipos'])){
        $datos['profesion_tecnologia_equipos'] = 'x';
    }
    if(isset($_REQUEST['profesion-otros'])){
        $datos['profesion_otros'] = $_REQUEST['profesion-otros'];
    }

    $datos['edad'] = "";

    if(isset($_REQUEST['edad'])){
        $datos['edad'] = $_REQUEST['edad'];
    }

    $datos['conoce_life_arimeda'] = "";
    $datos['como_conoce_life'] = "";

    if(isset($_REQUEST['conoce-life-arimeda'])){
        $datos['conoce_life_arimeda'] = $_REQUEST['conoce-life-arimeda'];
    }
    if(isset($_REQUEST['como-conoce-life'])){
        $datos['como_conoce_life'] = $_REQUEST['como-conoce-life'];
    }

    $datos['aa_importancia_preservar'] = "";
    $datos['aa_gestion_purin_derivados'] = "";
    $datos['aa_gestion_purin'] = "";
    $datos['aa_consecuencias_salud'] = "";

    if(isset($_REQUEST['aa-importancia-preservar'])){
        $datos['aa_importancia_preservar'] = $_REQUEST['aa-importancia-preservar'];
    }
    if(isset($_REQUEST['aa-gestion-purin-derivados'])){
        $datos['aa_gestion_purin_derivados'] = $_REQUEST['aa-gestion-purin-derivados'];
    }
    if(isset($_REQUEST['aa-gestion-purin'])){
        $datos['aa_gestion_purin'] = $_REQUEST['aa-gestion-purin'];
    }
    if(isset($_REQUEST['aa-consecuencias-salud'])){
        $datos['aa_consecuencias_salud'] = $_REQUEST['aa-consecuencias-salud'];
    }

    $datos['pla_valoracion_general'] = "";
    $datos['pla_contribucion_zonas_agricolas_mediterraneas'] = "";
    $datos['pla_sostenibilidad_desarrollo'] = "";

    if(isset($_REQUEST['pla-valoracion-general'])){
        $datos['pla_valoracion_general'] = $_REQUEST['pla-valoracion-general'];
    }
    if(isset($_REQUEST['pla-contribucion-zonas-agricolas-mediterraneas'])){
        $datos['pla_contribucion_zonas_agricolas_mediterraneas'] = $_REQUEST['pla-contribucion-zonas-agricolas-mediterraneas'];
    }
    if(isset($_REQUEST['pla-sostenibilidad-desarrollo'])){
        $datos['pla_sostenibilidad_desarrollo'] = $_REQUEST['pla-sostenibilidad-desarrollo'];
    }

    $datos['rn'] = "";
    $datos['rn_web'] = "";
    $datos['rn_twiter'] = "";
    $datos['rn_email'] = "";
    $datos['rn_otros'] = "falla";

    if(isset($_REQUEST['rn'])){
        $datos['rn'] = $_REQUEST['rn'];
    }
    if(isset($_REQUEST['rn-web'])){
        $datos['rn_web'] = 'x';
    }
    if(isset($_REQUEST['rn-twiter'])){
        $datos['rn_twiter'] = 'x';
    }
    if(isset($_REQUEST['rn-email'])){
        $datos['rn_email'] = 'x';
    }
    if(isset($_REQUEST['rn-otros'])){
        $datos['rn_otros'] = $_REQUEST['rn-otros'];
    }

    $datos['textarea_observaciones'] = "";

    if(isset($_REQUEST['textarea-observaciones'])){
        $datos['textarea_observaciones'] = $_REQUEST['textarea-observaciones'];
    }

    return $datos;
}

