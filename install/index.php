<?php

$users = 'CREATE TABLE `TAK15_Penza`.`auto24_users` ( 
`id` INT NOT NULL AUTO_INCREMENT , 
`email` VARCHAR(255) NOT NULL , 
`password` VARCHAR(255) NOT NULL , 
`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`user_group` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';