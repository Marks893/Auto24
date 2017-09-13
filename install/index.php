<?php

$users = "CREATE TABLE `TAK15_Penza`.`users` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(255) NOT NULL , 
    `password` VARCHAR(255) NOT NULL , 
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `user_group` INT NOT NULL DEFAULT '1' , 
    PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;";