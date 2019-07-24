<?php
/**
 * Created by PhpStorm.
 * User: José Manuel Cruz Sánchez
 * Date: 24/06/2019
 * Time: 17:41
 */

function que_idioma_encuesta_mostramos($argumentos){

    if( $argumentos['idioma'] === 'castellano' ){
        echo encuesta_castellano();
    }
    else if( $argumentos['idioma'] === 'ingles' ){
        echo encuesta_ingles();
    }
    else if( $argumentos['idioma'] === 'italiano' ){
        echo encuesta_italiano();
    }
}
add_shortcode('short_encuesta', 'que_idioma_encuesta_mostramos');

function html_mensaje_pregunta_quiere_hacer_encuesta($argumentos){
    global $wpdb;
    $id_usuario = get_current_user_id();
    $ha_rellenado_encuesta = $wpdb->get_results("select * from encuesta where id_usuario like $id_usuario");

    if( ! $ha_rellenado_encuesta ){
        if( $argumentos['idioma'] === 'castellano' ){
            echo '<div id="mensaje-solicitud-encuesta">
                    <p>¿Quieres colaborar con el proyecto? Puedes hacerlo rellenando una breve encuesta.</p>
                    <p>Sólo te llevará un par de minutos. ¡Gracias!</p>
                    <button><a href="/plataforma/encuesta">Rellenar encuesta</a></button>
                  </div>';
        }
        else if( $argumentos['idioma'] === 'ingles' ){
            echo '<div id="mensaje-solicitud-encuesta">
                    <p>Would you like to collaborate with the project? We would be grateful if you could fill out this short survey.</p>
                    <p>It will only take a couple of minutes. Thank you!</p>
                    <button><a href="/en/platform/survey">Fill out survey</a></button>
                  </div>';
        }
        else if( $argumentos['idioma'] === 'italiano' ){
            echo '<div id="mensaje-solicitud-encuesta">
                    <p>Vuoi collaborare con il progetto? Puoi farlo compilando un breve sondaggio.</p>
                    <p>Ti ci vorranno solo un paio di minuti. Grazie!</p>
                    <button><a href="/it/piattaforma/sondaggio">Rellenar encuesta</a></button>
                  </div>';
        }

    }
}
add_shortcode('short_mensaje_quiere_hacer_encuesta', 'html_mensaje_pregunta_quiere_hacer_encuesta');

function encuesta_castellano(){
    $ruta_guardar_bbdd = plugin_dir_url('encuesta-life-arimeda.php') . 'encuesta-life-arimeda/includes/guardar-encuesta-bbdd.php';
    return '<div id="contenedor-general">  
                <form id="formulario-encuesta" action="'.$ruta_guardar_bbdd.'" method="post">
                    <input type="hidden" name="idioma" value="castellano">
                    <input type="hidden" name="region" value="aragón">
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
                            <td colspan="3"><input type="text" name="profesion-otros" maxlength="100"></td>
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
                            <td><input type="text" name="como-conoce-life" maxlength="100"></td>
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
                            <td colspan="3"><input type="text" name="rn-otros" maxlength="100"></td>
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

function encuesta_ingles(){
    $ruta_guardar_bbdd = plugin_dir_url('encuesta-life-arimeda.php') . 'encuesta-life-arimeda/includes/guardar-encuesta-bbdd.php';
    return '<div id="contenedor-general">  
                <form id="formulario-encuesta" action="'.$ruta_guardar_bbdd.'" method="post">
                    <input type="hidden" name="idioma" value="ingles">
                    <p id="titulo-encuesta">Please, fill out this short survey.</p>
            
                    <p class="azul">Are you:</p>
                    <table id="tabla-profesion-encuestado">
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-ganadero">Livestock farmer</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-agricultor">Land farmer</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-administracion">Administration</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-centro-investigacion">Research Centre</label></td>
                        </tr>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-educacion">Education</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-tecnico">Technician</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-tecnologia-equipos">Technology and equipment supplier</label></td>
                            <td></td>
                        </tr>
                        <tr class="fila-espacio-vacio">
                            
                        </tr>
                        <tr class="otros-aclaraciones-1">
                            <td><p class="texto-grisaceo">Other</p></td>
                            <td colspan="3"><input type="text" name="profesion-otros" maxlength="100"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
            
            
                    <p class="azul">Your age is included in the following range:</p>
                    <table>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="25-35">25-35 years</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="36-45">36-45 years</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="46-55">46-55 years</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="mas-56">&gt; 56</label></td>
                        </tr>
                    </table>
            
                    <p class="azul">Are you familiar with the LIFE Programme for European cofinancing of projects in the field of the environment?</p>
                    <table>
                        <tr class="otros-aclaraciones-2">
                            <td><label class="texto-grisaceo"><input type="radio" name="conoce-life-arimeda" value="si">Yes</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="conoce-life-arimeda" value="no">No</label></td>
                            <td><label class="texto-grisaceo">How?</label></td>
                            <td><input type="text" name="como-conoce-life" maxlength="100"></td>
                        </tr>
                    </table>
            
                    <p class="texto-grisaceo">Rate from 0 to 10 (0 the lowest score, 10 the highest) the following questions:</p>
            
                    <p class="texto-grisaceo-oscurito">PERCEPTION ON ENVIRONMENTAL ASPECTS</p>
                    <table class="frases-puntucion">
                        <tr>
                            <td><label class="azul">1. Indicate how important you consider environment preservation</label></td>
                            <td><input type="number" min="0" max="10" name="aa-importancia-preservar"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">2. Indicate how important you consider the impact of slurry management on the environment: ammonia emissions, particulate matter, greenhouse gases, nitrates in water, heavy metals, etc.</label></td>
                            <td><input type="number" min="0" max="10" name="aa-gestion-purin-derivados"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">3. Indicate how important you consider the problem of slurry management in your region</label></td>
                            <td><input type="number" min="0" max="10" name="aa-gestion-purin"></td>
                        </tr>
                        
                        
                        
                        <tr class="region">
                            <td><label class="azul">Which region it is?</label></td>
                            <td><input type="text" name="region"></td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td><label class="azul">4. Indicate how important you consider health consequences of the environmental impact of slurry management</label></td>
                            <td><input type="number" min="0" max="10" name="aa-consecuencias-salud"></td>
                        </tr>
                    </table>        
            
                    <p class="texto-grisaceo-oscurito">LIFE ARIMEDA PROJECT</p>
                    <table class="frases-puntucion">
                        <tr>
                            <td><label class="azul">5. How do you value the LIFE ARIMEDA project in general?</label></td>
                            <td><input type="number" min="0" max="10" name="pla-valoracion-general"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">6. To what extent do you think that the LIFE ARIMEDA project can contribute to environmental improvement in Mediterranean agricultural areas?</label></td>
                            <td><input type="number" min="0" max="10" name="pla-contribucion-zonas-agricolas-mediterraneas"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">7. To what extent do you think that the LIFE ARIMEDA project can contribute to the improvement of sustainability and to the technical and economic development of the farming sector</label></td>
                            <td><input type="number" min="0" max="10" name="pla-sostenibilidad-desarrollo"></td>
                        </tr>
                    </table>       
                    
                    <br>
            
                    <p class="azul">Are you interested in receiving information about the development of the project?</p>
                    <table>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="radio" name="rn" value="si">Yes</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="rn" value="no">No</label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="azul">How?</p></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-web">Website</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-twiter">Twitter</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-email">Newsletters (email)</label></td>
                        </tr>
                        <tr class="fila-espacio-vacio">
                            
                        </tr>
                        <tr class="otros-aclaraciones-3">
                            <td><p class="texto-grisaceo">Others</p></td>
                            <td colspan="3"><input type="text" name="rn-otros" maxlength="100"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>        
            
                    <p class="azul">Comments and suggestions:</p>
                    <textarea name="textarea-observaciones"></textarea>
                    <div id="seccion-enviar">
                        <p class="azul">THANK YOU VERY MUCH FOR YOUR HELP</p>
                        <input type="submit" value="SEND">
                    </div>
                    
                </form>
            </div>';
}

function encuesta_italiano(){
    $ruta_guardar_bbdd = plugin_dir_url('encuesta-life-arimeda.php') . 'encuesta-life-arimeda/includes/guardar-encuesta-bbdd.php';
    return '<div id="contenedor-general">  
                <form id="formulario-encuesta" action="'.$ruta_guardar_bbdd.'" method="post">
                    <input type="hidden" name="idioma" value="italiano">
                    <p id="titulo-encuesta">Rispondi a questo breve sondaggio.</p>
            
                    <p class="azul">Lei è:</p>
                    <table id="tabla-profesion-encuestado">
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-ganadero">Allevatore</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-agricultor">Agricolotore</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-administracion">Area Amministrativa</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-centro-investigacion">Centro di Ricerca</label></td>
                        </tr>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-educacion">Istruzione</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-tecnico">Tecnico</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="profesion-tecnologia-equipos">Fornitore di Servizi e attrezzature</label></td>
                            <td></td>
                        </tr>
                        <tr class="fila-espacio-vacio">
                            
                        </tr>
                        <tr class="otros-aclaraciones-1">
                            <td><p class="texto-grisaceo">Altro</p></td>
                            <td colspan="3"><input type="text" name="profesion-otros" maxlength="100"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
            
            
                    <p class="azul">La sua età è compresa nel seguente intervallo:</p>
                    <table>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="25-35">25-35 anni</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="36-45">36-45 anni</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="46-55">46-55 anni</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="edad" value="mas-56">&gt; 56 anni</label></td>
                        </tr>
                    </table>
            
                    <p class="azul">É a conoscenza del programma LIFE per il cofinanziamento europeo di progetti in ambito ambientale?</p>
                    <table>
                        <tr class="otros-aclaraciones-2">
                            <td><label class="texto-grisaceo"><input type="radio" name="conoce-life-arimeda" value="si">Si</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="conoce-life-arimeda" value="no">No</label></td>
                            <td><label class="texto-grisaceo">Come?</label></td>
                            <td><input type="text" name="como-conoce-life" maxlength="100"></td>
                        </tr>
                    </table>
            
                    <p class="texto-grisaceo">Attribuisca un punteggio da 0 a 10 (0 il peggiore, 10 il migliore) alle seguenti domande:</p>
            
                    <p class="texto-grisaceo-oscurito">PERCEZIONE DEGLI ASPETTI AMBIENTALI</p>
                    <table class="frases-puntucion">
                        <tr>
                            <td><label class="azul">1. Indichi quanto considera importante la tutela ambientale</label></td>
                            <td><input type="number" min="0" max="10" name="aa-importancia-preservar"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">2. Indichi quanto considera importante l’impatto della gestione degli effluenti sull’ambiente: emissioni ammoniacali, particolato, gas effetto serra, nitrati nelle acque, metalli pesanti, etc</label></td>
                            <td><input type="number" min="0" max="10" name="aa-gestion-purin-derivados"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">3. Indichi quanto considera importante il problema della gestione degli effluenti nella sua regione</label></td>
                            <td><input type="number" min="0" max="10" name="aa-gestion-purin"></td>
                        </tr>
                        
                        
                        
                        
                        <tr class="region">
                            <td><label class="azul">Qual’è la sua regione?</label></td>
                            <td><input type="text" name="region"></td>
                        </tr>
                        
                        
                        
                        
                        <tr>
                            <td><label class="azul">4. Indichi quanto considera importante le conseguenze dell’impatto ambientale della gestione degli effluenti sulla salute umana</label></td>
                            <td><input type="number" min="0" max="10" name="aa-consecuencias-salud"></td>
                        </tr>
                    </table>        
            
                    <p class="texto-grisaceo-oscurito">IL PROGETTO LIFE ARIMEDA</p>
                    <table class="frases-puntucion">
                        <tr>
                            <td><label class="azul">5. Come valuta il progetto LIFE ARIMEDA in generale?</label></td>
                            <td><input type="number" min="0" max="10" name="pla-valoracion-general"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">6. In che misura pensa che il progetto LIFE ARIMEDA possa contribuire al miglioramento ambientale nelle aree agricole del Mediterraneo?</label></td>
                            <td><input type="number" min="0" max="10" name="pla-contribucion-zonas-agricolas-mediterraneas"></td>
                        </tr>
                        <tr>
                            <td><label class="azul">7. In che misura pensa che il progetto LIFE ARIMEDA possa contribuire al miglioramento della sostenibilità e allo sviluppo tecnico ed economico del settore agricolo</label></td>
                            <td><input type="number" min="0" max="10" name="pla-sostenibilidad-desarrollo"></td>
                        </tr>
                    </table>       
                    
                    <br>
            
                    <p class="azul">É interessato a ricevere informazioni in merito ai progressi del progetto?</p>
                    <table>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="radio" name="rn" value="si">Si</label></td>
                            <td><label class="texto-grisaceo"><input type="radio" name="rn" value="no">No</label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="azul">Come?</p></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-web">Website</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-twiter">Twiter</label></td>
                            <td><label class="texto-grisaceo"><input type="checkbox" name="rn-email">Newsletters (email)</label></td>
                        </tr>
                        <tr class="fila-espacio-vacio">
                            
                        </tr>
                        <tr class="otros-aclaraciones-3">
                            <td><p class="texto-grisaceo">Altro</p></td>
                            <td colspan="3"><input type="text" name="rn-otros" maxlength="100"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>        
            
                    <p class="azul">Commenti e suggerimenti:</p>
                    <textarea name="textarea-observaciones"></textarea>
                    <div id="seccion-enviar">
                        <p class="azul">Grazie per il suo aiuto!</p>
                        <input type="submit" value="INVIARE">
                    </div>
                    
                </form>
            </div>';
}