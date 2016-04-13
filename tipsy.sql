SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `tipsy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `tipsy` ;

-- -----------------------------------------------------
-- Table `tipsy`.`admin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`admin` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(45) NOT NULL,
    `password` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    UNIQUE INDEX `login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`customer` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first` VARCHAR(24) NOT NULL,
    `last` VARCHAR(24) NOT NULL,
    `login` VARCHAR(16) NOT NULL,
    `password` VARCHAR(16) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `customer_credit_id` VARCHAR(16) NOT NULL,
    `creditcard_year` INT NOT NULL,
    `creditcard_month` INT NOT NULL,
    `last_digits` VARCHAR(4) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    UNIQUE INDEX `login_UNIQUE` (`login` ASC),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`store`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`store` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `latitude` INT NOT NULL,
    `longitude` INT NOT NULL,
    PRIMARY KEY (`id`), 
    UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`product` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `store_id` INT NOT NULL,
    `identifier` INT NOT NULL,
    `description` LONGTEXT NOT NULL,
    `photo_url` VARCHAR(128) NOT NULL,
    `price` FLOAT NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    UNIQUE INDEX `identifier_UNIQUE` (`identifier` ASC) )    
    INDEX `fk_order_store` (`store_id` ASC),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    CONSTRAINT `fk_order_store`
        FOREIGN KEY (`store_id`)
        REFERENCES `tipsy`.`store` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`order`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`order` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `customer_id` INT NOT NULL,
    `order_date` DATE NOT NULL,
    `order_time` TIME NOT NULL,
    `total` FLOAT NOT NULL,
    `tips` FLOAT NOT NULL,
    `customer_credit_id` VARCHAR(16) NOT NULL,
    `creditcard_year` INT NOT NULL,
    `creditcard_month` INT NOT NULL,
    `last_digits` VARCHAR(4) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_order_customer` (`customer_id` ASC),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    CONSTRAINT `fk_order_customer`
        FOREIGN KEY (`customer_id`)
        REFERENCES `tipsy`.`customer` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`order_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`order_item` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `order_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `quantity` INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_order_item_order` (`order_id` ASC),
    INDEX `fk_order_item_product` (`product_id` ASC),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    CONSTRAINT `fk_order_item_order`
        FOREIGN KEY (`order_id`)
        REFERENCES `tipsy`.`order` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT `fk_order_item_product`
        FOREIGN KEY (`product_id`)
        REFERENCES `tipsy`.`product` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`driver`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`driver` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first` VARCHAR(24) NOT NULL,
    `last` VARCHAR(24) NOT NULL,
    `login` VARCHAR(16) NOT NULL,
    `password` VARCHAR(16) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `phone` VARCHAR(12) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    UNIQUE INDEX `login_UNIQUE` (`login` ASC),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tipsy`.`address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipsy`.`address` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `street_number` INT NOT NULL,
    `street_name` VARCHAR(24) NOT NULL,
    `city` VARCHAR(16) NOT NULL,
    `province` VARCHAR(16) NOT NULL,
    `country` VARCHAR(16) NOT NULL,
    `postal_code` VARCHAR(6) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    INDEX `fk_address_customer` (`customer_id` ASC),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
    CONSTRAINT `fk_address_customer`
        FOREIGN KEY (`customer_id`)
        REFERENCES `tipsy`.`customer` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
