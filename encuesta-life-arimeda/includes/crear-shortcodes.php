<?php
/**
 * Created by PhpStorm.
 * User: José Manuel Cruz Sánchez
 * Date: 24/06/2019
 * Time: 17:41
 */

function html_encuesta_life_arimeda(){
    $ruta_guardar_bbdd = plugin_dir_url('encuesta-life-arimeda.php') . 'encuesta-life-arimeda/includes/guardar-encuesta-bbdd.php';
    return '<div id="contenedor-general">  
                <form id="formulario-encuesta" action="'.$ruta_guardar_bbdd.'" method="post">
                    <p id="titulo-encuesta">Le rogamos conteste a esta breve encuesta.</p>
            
                    <p class="azul">Es usted:</p>
                    <table id="tabla-profesion-encuestado">
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-ganadero">Ganadero</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-agricultor">Agricultor</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-administracion">Administración</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-centro-investigacion">Centro de investigación</label></td>
                        </tr>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-educacion">Educación</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-tecnico">Técnico</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-tecnologia-equipos">Tecnología y equipos</label></td>
                            <td></td>
                        </tr>
                        <tr class="fila-espacio-vacio">
                            
                        </tr>
                        <tr class="otros-aclaraciones-1">
                            <td><p class="texto-grisaceo">Otros</p></td>
                            <td colspan="3"><input type="text" name="profesion-otros"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
            
            
                    <p class="azul">Su edad está comprendida en el siguiente rango:</p>
                    <table>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="25-35">25-35 años</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="36-45">36-45 años</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="46-55">46-55 años</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="mas-56">más de 56</label></td>
                        </tr>
                    </table>
            
                    <p class="azul">¿Conoce el Programa LIFE de cofinanciación europea de proyectos en materia de medio ambiente?</p>
                    <table>
                        <tr class="otros-aclaraciones-2">
                            <td><label class="texto-grisaceo"><input type="radio" name="conoce-life-arimeda" value="si">Si</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="conoce-life-arimeda" value="no">No</label></td>
                            <td><label class="texto-grisaceo">¿Cómo?</label></td>
                            <td><input type="text" name="como-conoce-life"></td>
                        </tr>
                    </table>
            
                    <p class="texto-grisaceo">Valore del 0 al 10 (0 la puntuación más baja, 10 la más alta) las siguientes cuestiones:</p>
            
                    <p class="texto-grisaceo-oscurito">PERCEPCIÓN SOBRE ASPECTOS AMBIENTALES</p>
                    <table class="frases-puntucion">
                        <tr>
                            <td><label class="azul">1. Cómo valora la importancia de preservar el medio ambiente</label></td>
                            <td><input type="number" min="0" max="10" name="aa-importancia-preservar"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">2. Cómo valora la importancia del impacto en el medio ambiente de la gestión del purín: emisiones de amoniaco, materia particulada, gases de efecto invernadero, nitratos en el agua, metales pesados, etc.</label></td>
                            <td><input type="number" min="0" max="10" name="aa-gestion-purin-derivados"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">3. Qué importancia considera que tiene la problemática de la gestión de purines en Aragón</label></td>
                            <td><input type="number" min="0" max="10" name="aa-gestion-purin"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">4. Cómo valora las consecuencias para la salud del impacto medioambiental de la gestión de purines</label></td>
                            <td><input type="number" min="0" max="10" name="aa-consecuencias-salud"></td>
                        </tr>
                    </table>        
            
                    <p class="texto-grisaceo-oscurito">PROYECTO LIFE ARIMEDA</p>
                    <table class="frases-puntucion">
                        <tr>
                            <td><label class="azul">5. Cómo valora en general el proyecto LIFE ARIMEDA</label></td>
                            <td><input type="number" min="0" max="10" name="pla-valoracion-general"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">6. En qué medida cree que el proyecto LIFE ARIMEDA puede contribuir a la mejora ambiental en las zonas agrícolas mediterráneas</label></td>
                            <td><input type="number" min="0" max="10" name="pla-contribucion-zonas-agricolas-mediterraneas"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">7. En qué medida cree que el proyecto LIFE ARIMEDA puede contribuir a la mejora de la sostenibilidad y al desarrollo técnico y económico del sector agroganadero</label></td>
                            <td><input type="number" min="0" max="10" name="pla-sostenibilidad-desarrollo"></td>
                        </tr>
                    </table>       
                    
                    <br>
            
                    <p class="azul">¿Está interesado en recibir información sobre el desarrollo del proyecto?</p>
                    <table>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="radio" name="rn" value="si">Si</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="rn" value="no">No</label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="azul">¿Por qué medios?</p></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-web">Página web</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-twiter">Twiter</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-email">Newsletters (email)</label></td>
                        </tr>
                        <tr class="fila-espacio-vacio">
                            
                        </tr>
                        <tr class="otros-aclaraciones-3">
                            <td><p class="texto-grisaceo">Otros</p></td>
                            <td colspan="3"><input type="text" name="rn-otros"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>        
            
                    <p class="azul">Observaciones y sugerencias:</p>
                    <textarea name="textarea-observaciones"></textarea>
                    <div id="seccion-enviar">
                        <p class="azul">MUCHAS GRACIAS POR SU COLABORACIÓN</p>
                        <input type="submit" value="ENVIAR">
                    </div>
                    
                </form>
            </div>';
}
add_shortcode('short_encuesta', 'html_encuesta_life_arimeda');

function html_mensaje_pregunta_quiere_hacer_encuesta(){
    //require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

    //echo plugin_dir_url('encuesta-life-arimeda.php');

    global $wpdb;
    global $current_user;

    $id_usuario = get_current_user_id();

    $res = $wpdb->get_results("select * from encuesta where id_usuario like $id_usuario");

    if(!$res){
        echo '<div id="mensaje-solicitud-encuesta">
			<p>¿Quieres colaborar con el proyecto? Puedes hacerlo rellenando una breve encuesta.</p>
			<p>Sólo te llevará un par de minutos. ¡Gracias!</p>
			<button><a href="/plataforma/encuesta">Rellenar encuesta</a></button>
		  </div>';
    }
}
add_shortcode('short_mensaje_quiere_hacer_encuesta', 'html_mensaje_pregunta_quiere_hacer_encuesta');