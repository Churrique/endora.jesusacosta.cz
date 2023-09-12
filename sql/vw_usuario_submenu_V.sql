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
  `pruebas`.`usuario_submodulos` `usubmod`
LEFT JOIN `pruebas`.`usuario_permisos` `usper` ON
      `usubmod`.`id_permisoitem` = `usper`.`id_permisoitem`
LEFT JOIN `pruebas`.`usuario_modulos` `usmod` ON
      `usubmod`.`id_moduleuser` = `usmod`.`id_moduleuser`
LEFT JOIN `pruebas`.`usuario_aplicacion` `usapp` ON
      `usmod`.`id_userapp` = `usapp`.`id_userapp`
LEFT JOIN `pruebas`.`_tm_app` `tmapp` ON
      `usapp`.`id_tm_app` = `tmapp`.`id_tm_app`
LEFT JOIN `pruebas`.`_tm_usuario` `tmus` ON
      `usapp`.`id_tm_usuario` = `tmus`.`id_tm_usuario`