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
  `pruebas`.`usuario_modulos` `usmod`
LEFT JOIN `pruebas`.`usuario_aplicacion` `usapli` ON
      `usmod`.`id_userapp` = `usapli`.`id_userapp`
LEFT JOIN `pruebas`.`_tm_app` `usapp` ON
      `usapli`.`id_tm_app` = `usapp`.`id_tm_app`
LEFT JOIN `pruebas`.`_tm_usuario` `usua` ON
      `usapli`.`id_tm_usuario` = `usua`.`id_tm_usuario`