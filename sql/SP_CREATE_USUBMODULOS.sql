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
