CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idioma` varchar(20) NOT NULL,
  `region` varchar(60) NOT NULL,
  `profesion_ganadero` varchar(20) NOT NULL,
  `profesion_agricultor` varchar(20) NOT NULL,
  `profesion_administracion` varchar(20) NOT NULL,
  `profesion_centro_investigacion` varchar(20) NOT NULL,
  `profesion_educacion` varchar(20) NOT NULL,
  `profesion_tecnico` varchar(20) NOT NULL,
  `profesion_tecnologia_equipos` varchar(20) NOT NULL,
  `profesion_otros` varchar(100) NOT NULL,
  `edad` varchar(20) NOT NULL,
  `conoce_life_arimeda` varchar(20) NOT NULL,
  `como_conoce_life` varchar(100) NOT NULL,
  `aa_importancia_preservar` varchar(20) NOT NULL,
  `aa_gestion_purin_derivados` varchar(20) NOT NULL,
  `aa_gestion_purin` varchar(20) NOT NULL,
  `aa_consecuencias_salud` varchar(20) NOT NULL,
  `pla_valoracion_general` varchar(20) NOT NULL,
  `pla_contribucion_zonas_agricolas_mediterraneas` varchar(20) NOT NULL,
  `pla_sostenibilidad_desarrollo` varchar(20) NOT NULL,
  `rn` varchar(20) NOT NULL,
  `rn_web` varchar(20) NOT NULL,
  `rn_twiter` varchar(20) NOT NULL,
  `rn_email` varchar(20) NOT NULL,
  `rn_otros` varchar(100) NOT NULL,
  `textarea_observaciones` longtext NOT NULL


) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `encuesta` ADD PRIMARY KEY (`id`);
ALTER TABLE `encuesta` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;