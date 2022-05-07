Use `pruebas`;
CREATE TABLE `_tm_notas` (
	`id_tm_nota` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id. Nota',
	`nomenclatura_nota` VARCHAR(3) NOT NULL COMMENT 'Abreviación' COLLATE 'utf8_general_ci',
	`detalle` VARCHAR(20) NOT NULL COMMENT 'Descripción' COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id_tm_nota`) USING BTREE
)
COMMENT='Maestro para Nomenclatura Especial de Notas Reprobatorias y Aprobatorias.'
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0
;
INSERT INTO pruebas.`_tm_notas` (nomenclatura_nota,detalle) VALUES
	 ('NI','No Indicado'),
	 ('OC','Otro Código'),
	 ('00','Cero Cero'),
	 ('01','Cero Uno'),
	 ('02','Cero Dos'),
	 ('03','Cero Tres'),
	 ('04','Cero Cuatro'),
	 ('05','Cero Cinco'),
	 ('06','Cero Seis'),
	 ('07','Cero Siete'),
	 ('08','Cero Ocho'),
	 ('09','Cero Nueve'),
	 ('10','Diez'),
	 ('NC','No Curso'),
	 ('EQ','Equivalencia'),
	 ('AP','Aprobado'),
	 ('RP','Reprobado'),
	 ('FN','Final'),
	 ('RE','Reparación'),
	 ('EE','Evaluación Especial');