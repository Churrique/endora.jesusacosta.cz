SELECT Usuario_aplicacion.id_tm_usuario, _tm_usuario.usserr,;
  _tm_usuario.fullname, Usuario_aplicacion.id_tm_app,;
  _tm_app.detalle_app, Usuario_modulos.id_userapp,;
  Usuario_submodulos.id_moduleuser, Usuario_modulos.item_menu,;
  Usuario_modulos.orderl, Usuario_submodulos.id_submoduleuser,;
  Usuario_submodulos.item_submenu, Usuario_submodulos.item_url,;
  Usuario_submodulos.sub_order, Usuario_submodulos.id_permisoitem,;
  Usuario_permisos.permission_item, Usuario_permisos.detail_permission;
 FROM ;
     pruebas!_tm_usuario ;
    LEFT OUTER JOIN pruebas!usuario_aplicacion ;
   ON  _tm_usuario.id_tm_usuario = Usuario_aplicacion.id_tm_usuario ;
    LEFT OUTER JOIN pruebas!usuario_modulos ;
   ON  Usuario_aplicacion.id_userapp = Usuario_modulos.id_userapp ;
    LEFT OUTER JOIN pruebas!usuario_submodulos ;
   ON  Usuario_modulos.id_moduleuser = Usuario_submodulos.id_moduleuser ;
    LEFT OUTER JOIN pruebas!usuario_permisos ;
   ON  Usuario_submodulos.id_permisoitem = Usuario_permisos.id_permisoitem ;
    LEFT OUTER JOIN pruebas!_tm_app ;
   ON  Usuario_aplicacion.id_tm_app = _tm_app.id_tm_app

/*
-- *****************************************************************
-- *  PROCEDIMIENTOS
-- *****************************************************************
*/;

USE `pruebas`;
/*
-- Procedimiento para Insertar en DATOS_PERSONALES
*/;
DROP PROCEDURE IF EXISTS `SP_CREATE_DP`;

DELIMITER $$
USE `pruebas`$$
CREATE PROCEDURE `SP_CREATE_DP`(
	IN `p_nom` VARCHAR(30),
	IN `p_ape` VARCHAR(30),
	IN `p_nc` VARCHAR(100),
	IN `p_sex` ENUM('No Indicado','Femenino','Masculino','Prefiero No Contestar'),
	IN `p_fn` DATE,
	OUT `efectivo` INT,
	OUT `ultimoid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Procedimiento Almacenado Para Crear/Insertar Registros En La Tabla DATOS_PERSONALES.'
BEGIN
SET efectivo = 0;
SET ultimoid = 0;
INSERT INTO datos_personales (nombre, apellido, nombrecompleto, sexo, nacimiento) VALUES (p_nom, p_ape, p_nc, p_sex, p_fn);
SELECT ROW_COUNT() INTO efectivo;
SELECT LAST_INSERT_ID() INTO ultimoid;
END$$

DELIMITER ;
/*
-- FIN DE `SP_CREATE_DP`
*/;

/*
-- Procedimiento para Insertar en DATOS_DOCUMENTOS_IDENTIFICACION
*/;
USE `pruebas`;
DROP PROCEDURE IF EXISTS `SP_CREATE_DDI`;

DELIMITER $$
USE `pruebas`$$
CREATE PROCEDURE `SP_CREATE_DDI`(
	IN `p_id_dp` INT,
	IN `p_id_tm_di` INT,
	IN `p_doc` VARCHAR(30),
	OUT `efectivo` INT,
	OUT `ultimoid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Procedimiento Almacenado Para Crear/Insertar Registros En La Tabla DATOS_DOCUMENTOS_IDENTIFICACION.'
BEGIN
SET efectivo = 0;
SET ultimoid = 0;
INSERT INTO datos_documentos_identificacion (iddatospersonales, id_tm_documento_identificacion , numeracion) VALUES (p_id_dp, p_id_tm_di, p_doc);
SELECT ROW_COUNT() INTO efectivo;
SELECT LAST_INSERT_ID() INTO ultimoid;
END$$

DELIMITER ;
/*
-- FIN DE `SP_CREATE_DDI`
*/;

/*
-- Procedimiento para Insertar en _TM_USUARIO (SOLAMENTE INICIA EL USUARIO)
*/;
USE `pruebas`;
DROP PROCEDURE IF EXISTS `SP_CREATE_USERALONG`;

DELIMITER $$
$$
CREATE PROCEDURE `SP_CREATE_USERALONG`(
	IN `p_pass` VARCHAR(16),
	IN `p_keyreco` VARCHAR(16),
	IN `p_user` CHAR(20),
	IN `p_fullname` CHAR(30),
	IN `p_expiration` ENUM('Si','No'),
	IN `p_expire` DATETIME,
	IN `p_session` ENUM('Si','No'),
	IN `p_lmenu` ENUM('Dinámico','Estático'),
	IN `p_deluser` ENUM('Si','No'),
	IN `p_email` VARCHAR(50),
	OUT `efectivo` INT,
	OUT `ultimoid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Rutina Para Crear/Insertar (INICIAR) Registros En La Tabla _TM_USUARIO.'
BEGIN
SET efectivo = 0;
SET ultimoid = 0;
INSERT INTO _tm_usuario (pass ,keyrecover, usserr, fullname, hasexpiration, exxpire, sessionn, loadmenu, deluser, email) 
VALUES (aes_encrypt(p_pass, p_keyreco), p_keyreco, p_user, p_fullname, p_expiration, p_expire, p_session, p_lmenu, p_deluser, p_email);
SELECT ROW_COUNT() INTO efectivo;
SELECT LAST_INSERT_ID() INTO ultimoid;
END$$

DELIMITER ;
/*
-- FIN DE `SP_CREATE_USERALONG`
*/;

/*
-- Procedimiento para Insertar en USUARIO_APLICACION
*/;
USE `pruebas`;
DROP PROCEDURE IF EXISTS `SP_CREATE_UAPLICACE`;

DELIMITER $$
$$
CREATE PROCEDURE `SP_CREATE_UAPLICACE`(
	IN `p_ID_Usuario` INT(12),
	IN `p_ID_App` INT(12),
	OUT `efectivo` INT,
	OUT `ultimoid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Procedimiento Almacenado Para Crear/Insertar Registros En La Tabla USUARIO_APLICACION.'
BEGIN
SET efectivo = 0;
SET ultimoid = 0;
INSERT INTO usuario_aplicacion (id_tm_usuario, id_tm_app) VALUES (p_ID_Usuario, p_ID_App);
SELECT ROW_COUNT() INTO efectivo;
SELECT LAST_INSERT_ID() INTO ultimoid;
END$$

DELIMITER ;
/*
-- FIN DE `SP_CREATE_UAPLICACE`
*/;

/*
-- Procedimiento para Insertar en USUARIO_MODULOS
*/;
USE `pruebas`;
DROP PROCEDURE IF EXISTS `SP_CREATE_UMODULO`;

DELIMITER $$
$$
CREATE PROCEDURE `SP_CREATE_UMODULO`(
	IN `p_ID_App` INT(12),
	IN `p_Item_Menu` VARCHAR(15),
	IN `p_Order_Logico` INT(2),
	OUT `efectivo` INT,
	OUT `ultimoid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Procedimiento Almacenado Para Crear/Insertar Registros En La Tabla USUARIO_MODULOS.'
BEGIN
SET efectivo = 0;
SET ultimoid = 0;
INSERT INTO usuario_modulos (id_userapp, item_menu, orderl) VALUES (p_ID_App, p_Item_Menu, p_Order_Logico);
SELECT ROW_COUNT() INTO efectivo;
SELECT LAST_INSERT_ID() INTO ultimoid;
END$$

DELIMITER ;
/*
-- FIN DE `SP_CREATE_UMODULO`
*/;

/*
-- Procedimiento para Insertar en USUARIO_SUBMODULOS
*/;
USE `pruebas`;
DROP PROCEDURE IF EXISTS `SP_CREATE_USUBMODULO`;

DELIMITER $$
$$
CREATE PROCEDURE `SP_CREATE_USUBMODULO`(
	IN `p_ID_Mod` INT(12),
	IN `p_ID_Per` INT(12),
	IN `p_Order_Logico` INT(2),
	IN `p_SubMenu` VARCHAR(15),
	IN `p_URL` VARCHAR(100),
	OUT `efectivo` INT,
	OUT `ultimoid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Procedimiento Almacenado Para Crear/Insertar Registros En La Tabla USUARIO_SUBMODULOS.'
BEGIN
SET efectivo = 0;
SET ultimoid = 0;
INSERT INTO usuario_submodulos (id_moduleuser, id_permisoitem, sub_order, item_submenu, item_url) VALUES (p_ID_Mod, p_ID_Per, p_Order_Logico, p_SubMenu, p_URL);
SELECT ROW_COUNT() INTO efectivo;
SELECT LAST_INSERT_ID() INTO ultimoid;
END$$

DELIMITER ;
/*
-- FIN DE `SP_CREATE_USUBMODULO`
*/;
/*
-- *****************************************************************
-- *  V I S T A S
-- *****************************************************************
*/;
/*
-- Vista VW_DAPER 
-- Las tablas que relacionamos son 
-- Datos Personales >> Documento de Identificación >> Tabla Maestra de Tipos de Documentos 
*/;
DROP VIEW IF EXISTS vw_datper;

CREATE 
    ALGORITHM = UNDEFINED 
    SQL SECURITY DEFINER
VIEW `pruebas`.`vw_datper` AS
   SELECT 
        `dp`.`iddatospersonales` AS `id_dat`,
        `ddi`.`id_tm_documento_identificacion` AS `id_doc`,
        `tdi`.`documento_identificacion` AS `doc`,
        `ddi`.`numeracion` AS `doc_num`,
        TRIM(`dp`.`nombre`) AS `p_nom`,
        TRIM(`dp`.`apellido`) AS `p_ape`,
        `dp`.`sexo` AS `sexo`,
        DATE_FORMAT(`dp`.`nacimiento`, '%d/%m/%Y') AS `f_nac`,
        TRIM(`dp`.`nombrecompleto`) AS `nom_c`
    FROM
        ((`pruebas`.`datos_personales` `dp`
        LEFT JOIN `pruebas`.`datos_documentos_identificacion` `ddi`
        			ON ((`dp`.`iddatospersonales` = `ddi`.`iddatospersonales`)))
        LEFT JOIN `pruebas`.`_tm_documento_identificacion` `tdi` 
        			ON ((`ddi`.`id_tm_documento_identificacion` = `tdi`.`id_tm_documento_identificacion`)))
   WHERE  `ddi`.`numeracion` IS NULL;
/*
-- Fin de Vista VW_DAPER
*/;

/*
-- Vista VW_CONSULT_M1 
-- Las tablas que relacionamos son 
-- Datos Personales >> Documento de Identificación >> Tabla Maestra de Tipos de Documentos 
*/;
DROP VIEW IF EXISTS vw_consult_m1;

CREATE 
    ALGORITHM = UNDEFINED 
    SQL SECURITY DEFINER
VIEW `pruebas`.`vw_consult_m1` AS
   SELECT 
        `dp`.`iddatospersonales` AS `id_dat`,
        TRIM(`dp`.`nombre`) AS `p_nom`,
        TRIM(`dp`.`apellido`) AS `p_ape`,
        `ddi`.`id_tm_documento_identificacion` AS `id_doc`,
        `tdi`.`documento_identificacion` AS `doc_tipo`,
        `ddi`.`numeracion` AS `doc_num`
    FROM
        ((`pruebas`.`datos_personales` `dp`
        LEFT JOIN `pruebas`.`datos_documentos_identificacion` `ddi`
        			ON ((`dp`.`iddatospersonales` = `ddi`.`iddatospersonales`)))
        LEFT JOIN `pruebas`.`_tm_documento_identificacion` `tdi` 
        			ON ((`ddi`.`id_tm_documento_identificacion` = `tdi`.`id_tm_documento_identificacion`)));
/*
-- Fin de Vista VW_CONSULT_M1
*/;

/*
-- Vista VW_CONSULT_TOTALUSERAPP 
-- Las tablas que relacionamos son 
-- Tabla Maestra de Usuarios >> Módulos de los Usuarios 
*/;
DROP VIEW IF EXISTS vw_consult_totaluserapp;

CREATE 
    ALGORITHM = UNDEFINED 
    SQL SECURITY DEFINER
VIEW `pruebas`.`vw_consult_totaluserapp` AS
	SELECT
	 `tm`.`fullname` AS `nombre`,
	 `tm`.`usserr` AS `usuario`, COUNT(`ua`.`id_tm_usuario`) AS TOTALidUsuario
	FROM
	 (`pruebas`.`usuario_aplicacion` `ua`
	LEFT JOIN `pruebas`.`_tm_usuario` `tm` ON
	 (`ua`.`id_tm_usuario` = `tm`.`id_tm_usuario`))
	GROUP BY `ua`.`id_tm_usuario`;
/*
-- Fin de Vista VW_CONSULT_TOTALUSERAPP
*/;

/*
-- Vista VW_CONSULT_APP_X_USER 
-- Las tablas que relacionamos son 
-- Aplicacion por Usuario >>
-- 	<< Tabla Maestra de Aplicaciones
-- 	<< Tabla Maestra de Usuarios 
*/;
DROP VIEW IF EXISTS vw_consult_app_x_user;

CREATE 
    ALGORITHM = UNDEFINED 
    SQL SECURITY DEFINER
VIEW `pruebas`.`vw_consult_app_x_user` AS
	SELECT
	 `usap`.`id_userapp` AS `idUA`,
	 `usap`.`id_tm_usuario` AS `idUSUARIO`,
	 `tmus`.`fullname` AS `nombre`,
	 `tmus`.`usserr` AS `usuario`,
	 `usap`.`id_tm_app` AS `idAPP`,
	 `tmap`.`detalle_app` AS `modulo`
	FROM
	 (`pruebas`.`usuario_aplicacion` `usap`
	 LEFT JOIN `pruebas`.`_tm_usuario` `tmus` ON
	 `usap`.`id_tm_usuario` = `tmus`.`id_tm_usuario`
	 LEFT JOIN `pruebas`.`_tm_app` `tmap` ON
	 `usap`.`id_tm_app` = `tmap`.`id_tm_app`);
/*
-- Fin de Vista VW_CONSULT_APP_X_USER
*/;

/*
-- Vista VW_CONSULT_USUARIO_MENUH 
-- Las tablas que relacionamos son 
-- Menu por Usuario >>
--  << Tabla Aplicación por Usuario 
-- 	<< Tabla Maestra de Aplicaciones
-- 	<< Tabla Maestra de Usuarios 
*/;
DROP VIEW IF EXISTS vw_consult_usuario_menuh;

CREATE 
    ALGORITHM = UNDEFINED 
    SQL SECURITY DEFINER
VIEW `pruebas`.`vw_consult_usuario_menuh` AS
	SELECT
	  `usapli`.`id_tm_usuario` AS `IdUsuario`,
	  `usua`.`usserr` AS `usuario`,
	  `usua`.`fullname` AS `nombre`,
	  `usapli`.`id_userapp` AS `IdModulo`,
	  `usapp`.`detalle_app` AS `modulo`,
	  `usmod`.`id_moduleuser` AS `IdMenu`,
	  `usmod`.`item_menu` AS `menu`,
	  `usmod`.`orderl` AS `order_logic`
	FROM
	  (`pruebas`.`usuario_modulos` `usmod`
	LEFT JOIN `pruebas`.`usuario_aplicacion` `usapli` ON
	      `usmod`.`id_userapp` = `usapli`.`id_userapp`
	LEFT JOIN `pruebas`.`_tm_app` `usapp` ON
	      `usapli`.`id_tm_app` = `usapp`.`id_tm_app`
	LEFT JOIN `pruebas`.`_tm_usuario` `usua` ON
	      `usapli`.`id_tm_usuario` = `usua`.`id_tm_usuario`);
/*
-- Fin de Vista VW_CONSULT_USUARIO_MENUH 
*/;

/*
-- Vista VW_CONSULT_USUARIO_SUBMENUV
-- Las tablas que relacionamos son
-- Tabla Sub-Menú por Usuario (usuario_submodulos) >>
--  << Tabla Menú por Usuario (usuario_modulos) 
--  << Tabla Aplicación por Usuario (usuario_aplicacion) 
-- 	<< Tabla Maestra de Aplicaciones (_tm_app)
-- 	<< Tabla Maestra de Usuarios (_tm_usuario)
-- 	<< Tabla Maestra de Permisos (usuario_permisos)
*/;
DROP VIEW IF EXISTS vw_consult_usuario_submenuv;

CREATE 
    ALGORITHM = UNDEFINED 
    SQL SECURITY DEFINER
VIEW `pruebas`.`vw_consult_usuario_submenuv` AS
	SELECT
	  `usmod`.`id_userapp` AS `IdModulo`,
	  `usapp`.`id_tm_app` AS `IdApp`,
	  `tmapp`.`detalle_app` AS `app_description`,
	  `usapp`.`id_tm_usuario` AS `IdUsuario`,
	  `tmus`.`usserr` AS `usuario`,
	  `tmus`.`fullname` AS `nombre_completo`,
	  `usubmod`.`id_moduleuser` AS `IdMenu`,
	  `usmod`.`item_menu` AS `menu`,
	  `usubmod`.`id_submoduleuser` AS `IdSubMenu`,
	  `usubmod`.`item_submenu` AS `submenu`,
	  `usubmod`.`sub_order` AS `order_logic`,
	  `usubmod`.`item_url` AS `url`,
	  `usubmod`.`id_permisoitem` AS `IdPermission`,
	  `usper`.`permission_item` AS `permission_abbreviation`,
	  `usper`.`detail_permission` AS `permission`
	FROM
	  (`pruebas`.`usuario_submodulos` `usubmod`
	LEFT JOIN `pruebas`.`usuario_permisos` `usper` ON
	      `usubmod`.`id_permisoitem` = `usper`.`id_permisoitem`
	LEFT JOIN `pruebas`.`usuario_modulos` `usmod` ON
	      `usubmod`.`id_moduleuser` = `usmod`.`id_moduleuser`
	LEFT JOIN `pruebas`.`usuario_aplicacion` `usapp` ON
	      `usmod`.`id_userapp` = `usapp`.`id_userapp`
	LEFT JOIN `pruebas`.`_tm_app` `tmapp` ON
	      `usapp`.`id_tm_app` = `tmapp`.`id_tm_app`
	LEFT JOIN `pruebas`.`_tm_usuario` `tmus` ON
	      `usapp`.`id_tm_usuario` = `tmus`.`id_tm_usuario`);
/*
-- Fin de Vista VW_CONSULT_USUARIO_SUBMENUV
*/;

/*
-- ****************************************
-- * OTROS QUERYS AISLADOS
-- ****************************************
*/;
select
    `usap`.`id_tm_usuario` AS `idUSUARIO`,
    `tmus`.`fullname` AS `nombre`,
    `tmus`.`usserr` AS `usuario`,
    `usap`.`id_tm_app` AS `idAPP`,
    `tmap`.`detalle_app` AS `modulo`
from
    ((`pruebas`.`usuario_aplicacion` `usap`
left join `pruebas`.`_tm_usuario` `tmus` on
    (`usap`.`id_tm_usuario` = `tmus`.`id_tm_usuario`))
left join `pruebas`.`_tm_app` `tmap` on
    (`usap`.`id_tm_app` = `tmap`.`id_tm_app`));