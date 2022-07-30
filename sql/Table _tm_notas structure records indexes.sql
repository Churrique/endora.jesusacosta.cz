use pruebas;
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
INSERT INTO pruebas.`_tm_notas` (nomenclatura_nota,detalle,grupo) VALUES
	 (' NI','No Indicado','A'),
	 (' OC','Otro Código','A'),
	 (' NC','No Curso','A'),
	 (' EQ','Equivalencia','A'),
	 (' AP','Aprobado','A'),
	 (' RP','Reprobado','A'),
	 (' FN','Final','A'),
	 (' RE','Reparación','A'),
	 (' EE','Evaluación Especial','A'),
	 ('000','Cero Cero','1'),
	 ('001','Cero Uno','1'),
	 ('002','Cero Dos','1'),
	 ('003','Cero Tres','1'),
	 ('004','Cero Cuatro','1'),
	 ('005','Cero Cinco','1'),
	 ('006','Cero Seis','1'),
	 ('007','Cero Siete','1'),
	 ('008','Cero Ocho','1'),
	 ('009','Cero Nueve','1'),
	 ('010','Diez','1')
;