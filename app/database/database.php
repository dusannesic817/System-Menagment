<?php

require_once 'dbConn.php';


$sql="CREATE TABLE IF NOT EXISTS `trainers`(
    `trainer_id` INT UNSIGNED AUTO_INCREMENT,
    `fist_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `email` VARCHAR(255),
    `phone_number` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`trainer_id`)
    
)ENGINE = InnoDB;";

$sql="CREATE TABLE IF NOT EXISTS `trainings`(
    `training_id` INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255),
    `sesions` INT,
    `price` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
    
)ENGINE = InnoDB;";

$sql ="CREATE TABLE IF NOT EXISTS `members` (
    `member_id` INT PRIMARY KEY AUTO_INCREMENT,
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `number` VARCHAR(255),
    `address` VARCHAR(255),
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `photo_path` VARCHAR(255),
    `training_id` INT UNSIGNED,
    `trainer_id` INT UNSIGNED NULL,
    `access_card_pdf_path` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    
    FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`),
    FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`trainer_id`),
   
    
) ENGINE = InnoDB;";

$sql = "CREATE TABLE IF NOT EXISTS `admin`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) UNIQUE,
    `password` VARCHAR(255),
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;";


$sql='CREATE TABLE`date` (
    date_id INT AUTO_INCREMENT PRIMARY KEY,
    created_date DATE,
    expired_date DATE
)ENGINE = InnoDB;
';

$sql='ALTER TABLE members
ADD COLUMN date_id INT,
ADD FOREIGN KEY (date_id) REFERENCES date(date_id);
';

if($dbconnection->getConnection()->multi_query($sql)){
    echo 'Tables created successfully';
}else{
    header('location:index.php');
}