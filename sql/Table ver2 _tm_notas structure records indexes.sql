CREATE TABLE `_tm_notas` (
`id_tm_nota` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Nota', 
`nomenclatura` varchar(3) COLLATE latin1_general_cs NOT NULL COMMENT 'Abreviación', 
`detalle` varchar(20) COLLATE latin1_general_cs NOT NULL DEFAULT '--------------------' COMMENT 'Descripción', 
`grupo` varchar(2) COLLATE latin1_general_cs DEFAULT '0' COMMENT 'Grupo', 
PRIMARY KEY (`id_tm_nota`) USING BTREE
) 
ENGINE = InnoDB 
AUTO_INCREMENT = 21 
DEFAULT CHARSET = latin1 
COLLATE = latin1_general_cs
ROW_FORMAT = DYNAMIC
COMMENT = 'Maestro para Nomenclatura Especial de Notas Reprobatorias y Aprobatorias.'
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
