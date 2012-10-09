SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `gemz` ;
CREATE SCHEMA IF NOT EXISTS `gemz` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`address_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`address_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`address_type` (
  `at_address_type_id` INT NOT NULL AUTO_INCREMENT ,
  `at_address_type` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`at_address_type_id`) )
ENGINE = InnoDB
COMMENT = 'defines different addresses types';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`addresses` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`addresses` (
  `a_address_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `a_address` VARCHAR(85) NOT NULL ,
  `a_city` VARCHAR(45) NOT NULL ,
  `a_zipcode` VARCHAR(15) NOT NULL ,
  `a_state` VARCHAR(15) NULL ,
  `a_country` VARCHAR(45) NOT NULL ,
  `a_address_type_id` INT NULL ,
  `a_status_id` VARCHAR(45) NULL ,
  `a_created` DATETIME NULL ,
  PRIMARY KEY (`a_address_id`) ,
  CONSTRAINT `fk_addresses_address_type`
    FOREIGN KEY (`a_address_type_id` )
    REFERENCES `gemz`.`address_type` (`at_address_type_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_addresses_address_type` ON `gemz`.`addresses` (`a_address_type_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`users` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`users` (
  `u_user_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `u_username` VARCHAR(25) NOT NULL ,
  `u_fname` VARCHAR(15) NOT NULL ,
  `u_lname` VARCHAR(15) NOT NULL ,
  `u_email` VARCHAR(55) NOT NULL ,
  `u_phone` VARCHAR(15) NULL ,
  `u_cellular` VARCHAR(15) NOT NULL ,
  `u_address_id` INT(11) NOT NULL ,
  `u_zipcode` VARCHAR(15) NOT NULL ,
  `u_user_type` TINYINT NOT NULL ,
  `u_device_id` INT(11) NULL ,
  `u_lng` DECIMAL(9,6) NULL ,
  `u_lat` DECIMAL(9,6) NULL ,
  `u_product_set_id` TINYINT NULL ,
  `u_status_id` TINYINT NOT NULL ,
  PRIMARY KEY (`u_user_id`) ,
  CONSTRAINT `fk_users_addresses`
    FOREIGN KEY (`u_address_id` )
    REFERENCES `gemz`.`addresses` (`a_address_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_users_addresses` ON `gemz`.`users` (`u_address_id` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `u_username_UNIQUE` ON `gemz`.`users` (`u_username` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `u_email_UNIQUE` ON `gemz`.`users` (`u_email` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`content_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`content_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`content_type` (
  `ct_content_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ct_type` VARCHAR(45) NOT NULL ,
  `ct_status_id` TINYINT NULL ,
  PRIMARY KEY (`ct_content_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`authors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`authors` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`authors` (
  `a_author_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `a_author_name` VARCHAR(45) NOT NULL ,
  `a_author_site` VARCHAR(145) NULL ,
  `a_author_status` TINYINT NULL ,
  PRIMARY KEY (`a_author_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`gemz` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz` (
  `g_gem_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `g_title` VARCHAR(85) NOT NULL ,
  `g_description` TEXT NOT NULL ,
  `g_focus_icon` VARCHAR(145) NOT NULL ,
  `g_disable_icon` VARCHAR(145) NOT NULL ,
  `g_price` FLOAT NOT NULL ,
  `g_priority` INT(11) NOT NULL ,
  `g_created` DATETIME NOT NULL ,
  `g_status_id` TINYINT NULL ,
  `g_content_id` INT(11) NOT NULL ,
  `g_category_id` INT(11) NOT NULL ,
  `g_author_id` INT(11) NULL ,
  `g_purchase_url` VARCHAR(200) NULL ,
  `g_service_url` VARCHAR(200) NULL ,
  PRIMARY KEY (`g_gem_id`, `g_content_id`) ,
  CONSTRAINT `fk_gemz_content_type`
    FOREIGN KEY (`g_content_id` )
    REFERENCES `gemz`.`content_type` (`ct_content_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gemz_authors`
    FOREIGN KEY (`g_author_id` )
    REFERENCES `gemz`.`authors` (`a_author_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Gemz table';

SHOW WARNINGS;
CREATE INDEX `fk_gemz_content_type` ON `gemz`.`gemz` (`g_content_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_authors` ON `gemz`.`gemz` (`g_author_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`logins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`logins` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`logins` (
  `l_login_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `l_user_id` INT(11) NOT NULL ,
  `l_date` DATE NOT NULL ,
  `l_time` TIME NULL ,
  `l_ip` VARCHAR(45) NOT NULL ,
  `l_device_id` INT(11) NULL ,
  `l_user_agent` VARCHAR(45) NULL ,
  PRIMARY KEY (`l_login_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`users_pouches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`users_pouches` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`users_pouches` (
  `up_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `up_user_id` INT(11) NOT NULL ,
  `up_pouch_set_id` INT(11) NOT NULL ,
  PRIMARY KEY (`up_id`) ,
  CONSTRAINT `fk_users_pouches_users`
    FOREIGN KEY (`up_user_id` )
    REFERENCES `gemz`.`users` (`u_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Link table to map pouch sets';

SHOW WARNINGS;
CREATE INDEX `fk_users_pouches_users` ON `gemz`.`users_pouches` (`up_user_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_messeges`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`gemz_messeges` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_messeges` (
  `gm_message_id` INT NOT NULL AUTO_INCREMENT ,
  `gm_type` TINYINT NOT NULL ,
  `gm_gem_id` INT(11) NOT NULL ,
  `gm_user_id` INT(11) NOT NULL ,
  `gm_timestamp` TIMESTAMP NOT NULL ,
  `gm_status` TINYINT NOT NULL ,
  `gm_title` VARCHAR(128) NULL ,
  `gm_subject` VARCHAR(135) NULL ,
  `gm_body` VARCHAR(200) NULL ,
  PRIMARY KEY (`gm_message_id`) ,
  CONSTRAINT `fk_gemz_messeges_gemz`
    FOREIGN KEY (`gm_gem_id` )
    REFERENCES `gemz`.`gemz` (`g_gem_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_messeges_gemz` ON `gemz`.`gemz_messeges` (`gm_gem_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`devices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`devices` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`devices` (
  `d_device_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `d_device_type` TINYINT NOT NULL ,
  `d_device_name` VARCHAR(45) NOT NULL ,
  `d_device_status_id` TINYINT NOT NULL ,
  `d_device_icon` VARCHAR(85) NULL ,
  PRIMARY KEY (`d_device_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`vendors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`vendors` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`vendors` (
  `v_vendor_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `v_vendor_name` VARCHAR(145) NULL ,
  `v_vendor_contact_name` VARCHAR(145) NULL ,
  `v_vendor_url` VARCHAR(145) NULL ,
  `v_vendor_gem_id` INT(11) NULL ,
  `v_vendor_created` DATETIME NOT NULL ,
  `v_vendor_email` VARCHAR(145) NOT NULL ,
  `v_vendor_type` TINYINT NOT NULL ,
  `v_vendor_status` TINYINT NOT NULL ,
  PRIMARY KEY (`v_vendor_id`) ,
  CONSTRAINT `fk_vendors_gemz`
    FOREIGN KEY (`v_vendor_gem_id` )
    REFERENCES `gemz`.`gemz` (`g_gem_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_vendors_gemz` ON `gemz`.`vendors` (`v_vendor_gem_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_devices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`gemz_devices` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_devices` (
  `gd_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `gd_gem_id` INT(11) NOT NULL ,
  `gd_device_id` INT(11) NOT NULL ,
  `gd_status_id` TINYINT NOT NULL ,
  PRIMARY KEY (`gd_id`) ,
  CONSTRAINT `fk_gemz_devices_gemz`
    FOREIGN KEY (`gd_gem_id` )
    REFERENCES `gemz`.`gemz` (`g_gem_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gemz_devices_devices`
    FOREIGN KEY (`gd_device_id` )
    REFERENCES `gemz`.`devices` (`d_device_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_devices_gemz` ON `gemz`.`gemz_devices` (`gd_gem_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_devices_devices` ON `gemz`.`gemz_devices` (`gd_device_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`pouches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`pouches` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`pouches` (
  `p_pouch_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `p_name` VARCHAR(80) NOT NULL ,
  `p_user_id` INT(11) NOT NULL ,
  `p_status_id` VARCHAR(45) NULL ,
  `p_created` DATETIME NOT NULL ,
  `p_updated` DATETIME NULL ,
  `p_priority` TINYINT NOT NULL ,
  `p_parent_id` INT(11) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`p_pouch_id`) ,
  CONSTRAINT `fk_pouches_users`
    FOREIGN KEY (`p_user_id` )
    REFERENCES `gemz`.`users` (`u_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_pouches_users` ON `gemz`.`pouches` (`p_user_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`pouch_gemz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`pouch_gemz` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`pouch_gemz` (
  `pg_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pg_pouch_id` INT(11) NOT NULL ,
  `pg_gem_id` VARCHAR(45) NULL ,
  `pg_user_id` INT NOT NULL ,
  `pg_date` DATETIME NOT NULL ,
  `pg_priority` INT NULL ,
  `pg_status_id` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`pg_id`) ,
  CONSTRAINT `fk_pouch_gemz_pouches`
    FOREIGN KEY (`pg_pouch_id` )
    REFERENCES `gemz`.`pouches` (`p_pouch_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pouch_gemz_users`
    FOREIGN KEY (`pg_user_id` )
    REFERENCES `gemz`.`users` (`u_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_pouch_gemz_pouches` ON `gemz`.`pouch_gemz` (`pg_pouch_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_pouch_gemz_users` ON `gemz`.`pouch_gemz` (`pg_user_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`products` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`products` (
  `p_product_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `p_product_type` TINYINT NOT NULL ,
  `p_product_name` VARCHAR(85) NOT NULL ,
  `p_product_price` FLOAT NOT NULL ,
  `p_status_id` TINYINT NOT NULL ,
  PRIMARY KEY (`p_product_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`products_devices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`products_devices` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`products_devices` (
  `pd_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pd_product_id` INT(11) NOT NULL ,
  `pd_device_id` INT(11) NOT NULL ,
  PRIMARY KEY (`pd_id`) ,
  CONSTRAINT `fk_products_devices_products`
    FOREIGN KEY (`pd_product_id` )
    REFERENCES `gemz`.`products` (`p_product_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_products_devices_products` ON `gemz`.`products_devices` (`pd_product_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`affiliates`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`affiliates` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`affiliates` (
  `a_affiliated_id` INT NOT NULL AUTO_INCREMENT ,
  `a_name` VARCHAR(145) NOT NULL ,
  `a_contact_name` VARCHAR(145) NULL ,
  `a_website` VARCHAR(200) NOT NULL ,
  `a_company` VARCHAR(85) NOT NULL ,
  `a_pouch_set_id` INT(11) NULL ,
  PRIMARY KEY (`a_affiliated_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`users_access`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`users_access` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`users_access` (
  `ua_id` INT NOT NULL AUTO_INCREMENT ,
  `ua_user_id` INT(11) NOT NULL ,
  `ua_passwd` VARCHAR(45) NOT NULL ,
  `ua_status` TINYINT NOT NULL ,
  `ua_user_type` TINYINT NULL ,
  `ua_api_key` VARCHAR(45) NULL ,
  PRIMARY KEY (`ua_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`priorities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`priorities` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`priorities` (
  `p_priority_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `p_priority_title` VARCHAR(65) NOT NULL ,
  `p_priority_factor` FLOAT NOT NULL ,
  `p_priority_status` VARCHAR(45) NULL ,
  PRIMARY KEY (`p_priority_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_priorities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`gemz_priorities` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_priorities` (
  `gp_id` INT NOT NULL AUTO_INCREMENT ,
  `gp_user_id` INT NOT NULL ,
  `gp_gem_id` INT(11) NOT NULL ,
  `gp_priority` INT(11) NOT NULL ,
  PRIMARY KEY (`gp_id`, `gp_gem_id`) ,
  CONSTRAINT `fk_gemz_priorities_priorities`
    FOREIGN KEY (`gp_priority` )
    REFERENCES `gemz`.`priorities` (`p_priority_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gemz_priorities_gemz`
    FOREIGN KEY (`gp_gem_id` )
    REFERENCES `gemz`.`gemz` (`g_gem_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_priorities_priorities` ON `gemz`.`gemz_priorities` (`gp_priority` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_priorities_gemz` ON `gemz`.`gemz_priorities` (`gp_gem_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`statuses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`statuses` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`statuses` (
  `s_id` TINYINT NOT NULL AUTO_INCREMENT ,
  `s_status_id` TINYINT NOT NULL ,
  `s_status_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`s_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`zips`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`zips` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`zips` (
  `zip` VARCHAR(5) NOT NULL DEFAULT '0' ,
  `state` CHAR(2) NOT NULL DEFAULT '' ,
  `city` VARCHAR(28) NOT NULL DEFAULT '' ,
  `county` VARCHAR(32) NOT NULL DEFAULT '' ,
  `msa` VARCHAR(60) NOT NULL DEFAULT '' ,
  `lat` FLOAT NOT NULL DEFAULT '0.0000' ,
  `lon` FLOAT NOT NULL DEFAULT '0.0000' ,
  `population` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`zip`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`city` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`city` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` CHAR(35) NOT NULL DEFAULT '' ,
  `CountryCode` CHAR(3) NOT NULL DEFAULT '' ,
  `District` CHAR(20) NOT NULL DEFAULT '' ,
  `Population` INT(11) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`ID`) )
ENGINE = MyISAM
AUTO_INCREMENT = 4080
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`country_language`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`country_language` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`country_language` (
  `CountryCode` CHAR(3) NOT NULL DEFAULT '' ,
  `Language` CHAR(30) NOT NULL DEFAULT '' ,
  `IsOfficial` ENUM('T','F') NOT NULL DEFAULT 'F' ,
  `Percentage` FLOAT NOT NULL DEFAULT '0.0' ,
  PRIMARY KEY (`CountryCode`, `Language`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`country` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`country` (
  `Code` CHAR(3) NOT NULL DEFAULT '' ,
  `Name` CHAR(52) NOT NULL DEFAULT '' ,
  `Continent` ENUM('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL DEFAULT 'Asia' ,
  `Region` CHAR(26) NOT NULL DEFAULT '' ,
  `SurfaceArea` FLOAT NOT NULL DEFAULT '0.00' ,
  `IndepYear` SMALLINT(6) NULL DEFAULT NULL ,
  `Population` INT(11) NOT NULL DEFAULT '0' ,
  `LifeExpectancy` FLOAT NULL DEFAULT NULL ,
  `GNP` FLOAT NULL DEFAULT NULL ,
  `GNPOld` FLOAT NULL DEFAULT NULL ,
  `LocalName` CHAR(45) NOT NULL DEFAULT '' ,
  `GovernmentForm` CHAR(45) NOT NULL DEFAULT '' ,
  `HeadOfState` CHAR(60) NULL DEFAULT NULL ,
  `Capital` INT(11) NULL DEFAULT NULL ,
  `Code2` CHAR(2) NOT NULL DEFAULT '' ,
  PRIMARY KEY (`Code`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`gemz_categories` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_categories` (
  `gc_category_id` INT NOT NULL AUTO_INCREMENT ,
  `gc_category_name` VARCHAR(45) NOT NULL ,
  `gc_category_parent` INT(11) NOT NULL ,
  `gc_status_id` TINYINT NOT NULL ,
  PRIMARY KEY (`gc_category_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`user_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`user_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`user_type` (
  `u_user_type` INT NOT NULL AUTO_INCREMENT ,
  `u_type_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`u_user_type`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`api`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`api` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`api` (
  `a_api_id` INT NOT NULL AUTO_INCREMENT ,
  `a_api_name` VARCHAR(45) NOT NULL ,
  `a_created` DATE NOT NULL ,
  `a_updated` DATE NOT NULL ,
  `a_status_id` TINYINT NOT NULL ,
  PRIMARY KEY (`a_api_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`api_access`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`api_access` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`api_access` (
  `au_id` INT NOT NULL AUTO_INCREMENT ,
  `au_api_id` INT NOT NULL ,
  `au_api_user_id` INT NOT NULL ,
  `au_access_timestamp` DATETIME NOT NULL ,
  PRIMARY KEY (`au_id`) ,
  CONSTRAINT `fk_api_usage_api`
    FOREIGN KEY (`au_api_id` )
    REFERENCES `gemz`.`api` (`a_api_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_api_usage_api` ON `gemz`.`api_access` (`au_api_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`user_credentials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gemz`.`user_credentials` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `gemz`.`user_credentials` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `site` ENUM('facebook','twitter','myspace','google','gmail','mail','digg','stumbleupon') NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `passwd` VARCHAR(45) NOT NULL ,
  `url` VARCHAR(245) NOT NULL ,
  `status_id` TINYINT NOT NULL DEFAULT 1 ,
  `host` VARCHAR(145) NULL ,
  `port` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Placeholder table for view `gemz`.`accountsView`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gemz`.`accountsView` (`ua_user_id` INT, `ua_passwd` INT, `ua_status` INT, `u_fname` INT, `u_lname` INT, `u_email` INT, `u_username` INT);
SHOW WARNINGS;

-- -----------------------------------------------------
-- Placeholder table for view `gemz`.`gemzView`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gemz`.`gemzView` (`gem_id` INT, `title` INT, `description` INT, `focus_icon` INT, `disable_icon` INT, `price` INT, `pri` INT, `created` INT, `status_id` INT, `content` INT, `category` INT, `author` INT, `purchase_url` INT, `service_url` INT);
SHOW WARNINGS;

-- -----------------------------------------------------
-- Placeholder table for view `gemz`.`usersView`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gemz`.`usersView` (`id` INT);
SHOW WARNINGS;

DELIMITER $$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_registerApiCall` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `gemz`.`sp_registerApiCall` (
IN in_api_key VARCHAR(55), 
IN in_api_id INT, 
IN in_user_id INT
)

BEGIN

-- insert in API usage table
INSERT INTO api_usage(au_user_id, au_api_key,  au_api_id, au_access_timestamp)
VALUES (in_user_id, in_api_key, in_api_id, NOW());

SELECT IFNULL(LAST_INSERT_ID(), -1) AS status;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_registerPouch` $$
SHOW WARNINGS$$
USE gemz$$

CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_registerPouch`(
IN in_name VARCHAR(80),
IN in_user_id INT,
IN in_parent_id INT,
IN in_priority INT,
IN in_status_id INT
)
BEGIN

DECLARE l_name VARCHAR(80);
DECLARE l_pouch_id, l_count INT;

SELECT COUNT(*) INTO l_count FROM pouches WHERE p_name LIKE in_name;

IF l_count < 1 THEN
	INSERT INTO pouches (p_name, p_user_id, p_status_id, p_created, p_updated, p_priority, p_parent_id)
	VALUES (in_name, in_user_id, in_status_id, NOW(), NOW(), in_priority, in_parent_id);
	SET l_pouch_id = LAST_INSERT_ID();
END IF;

SELECT IFNULL(l_pouch_id, -1) AS pouch_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_login` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `gemz`.`sp_login` (
IN in_email VARCHAR(80),
IN in_passwd VARCHAR(35)
)

BEGIN
-- Which service do we want to use
SELECT ua_user_id INTO @uid FROM accountsView a WHERE (a.u_email = in_email AND a.ua_passwd = md5(in_passwd)) AND a.ua_status = 1;
SELECT IFNULL(@uid, -1) AS user_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_resetPassword` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `gemz`.`sp_resetPassword` (
IN in_user_id INT(11),
IN in_email VARCHAR(85),
IN in_passwd VARCHAR(40)
)

BEGIN

-- Declare
DECLARE status INT(11);
SELECT COUNT(*) INTO @cnt FROM accounts a WHERE a.u_email LIKE in_email;
IF @cnt > 0 THEN
	UPDATE users_access SET ua_passwd = md5(in_passwd) WHERE ua_user_id = in_user_id;
	SELECT 1 AS status;
ELSE
	SELECT -1 AS status;
END IF;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getPouches` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `gemz`.`sp_getPouches` ( 
IN in_user_id INT,
IN in_status TINYINT(2)
)

BEGIN

IF ISNULL(in_status)  AND ISNULL(in_user_id) THEN
	SELECT p_pouch_id, p_name, p_status_id, p_created, p_updated, p_priority, p_parent_id 
	FROM pouches;
ELSEIF ISNULL(in_status) THEN
	SELECT p_pouch_id, p_name, p_status_id, p_created, p_updated, p_priority, p_parent_id 
	FROM pouches
	WHERE p_user_id = in_user_id;
ELSE 
	SELECT p_pouch_id, p_name, p_status_id, p_created, p_updated, p_priority, p_parent_id 
	FROM pouches
	WHERE p_user_id = in_user_id AND p_status_id = in_status;
END IF;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_registerUser` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE  `gemz`.`sp_registerUser`(
IN in_username VARCHAR(25), 
IN in_fname VARCHAR(30), 
IN in_lname VARCHAR(30), 
IN in_email VARCHAR(80),
IN in_phone VARCHAR(20), 
IN in_address VARCHAR(140),
IN in_address_type TINYINT(4),
IN in_city VARCHAR(40),
IN in_state VARCHAR(30),
IN in_country VARCHAR(30),
IN in_cell VARCHAR(20),
IN in_zipcode VARCHAR(10),
IN in_passwd VARCHAR(45),
IN in_user_type TINYINT(4),
IN in_device_id INTEGER,
IN in_lng DECIMAL(9,6),
IN in_lat DECIMAL(9,6)
)
BEGIN

DECLARE l_address_id, l_user_id, l_ua_id INT;

START TRANSACTION;

INSERT INTO addresses(a_address, a_city, a_zipcode, a_state, a_country, a_address_type_id, a_status_id, a_created)
VALUES (in_address, in_city, in_zipcode, in_state, in_country, in_address_type, 1, NOW());
SET l_address_id = LAST_INSERT_ID();

IF ISNULL(l_address_id) THEN ROLLBACK;
END IF;

INSERT INTO users 
(u_username, u_fname, u_lname, u_email, u_phone, u_cellular, u_address_id, u_zipcode, u_user_type, u_device_id, u_lng, u_lat, u_status_id)
VALUES
(in_username, in_fname, in_lname, in_email, in_phone, in_cell, l_address_id, in_zipcode, in_user_type, in_device_id, in_lng, in_lat, 0);
SET l_user_id = LAST_INSERT_ID();

IF ISNULL(l_user_id) THEN ROLLBACK;
END IF;

INSERT into users_access
(ua_user_id, ua_passwd, ua_status, ua_user_type)
VALUES
(l_user_id, md5(in_passwd), 0, 1);
SET l_ua_id = LAST_INSERT_ID();
IF ISNULL(l_ua_id) THEN ROLLBACK;
END IF;

COMMIT;

SELECT IFNULL(l_user_id, -1) AS user_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getGemzAddressType` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `gemz`.`sp_getGemzAddressType`()

BEGIN

SELECT at_address_type_id, at_address_type 
FROM address_type;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getGemzCategories` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `sp_getGemzCategories`(IN in_parent_id INT)
BEGIN

SELECT gc_category_id, gc_category_name, gc_category_parent, gc_status_id FROM gemz_categories WHERE gc_category_parent = in_parent_id;
END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getGemzContentType` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `sp_getGemzContentType`()
BEGIN

SELECT ct_content_id, ct_type, ct_status_id 
FROM content_type;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getPriorities` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `sp_getPriorities`()
BEGIN

SELECT p_priority_id, p_priority_title, p_priority_factor, p_priority_status 
FROM priorities;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getStatuses` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `sp_getStatuses`()
BEGIN

SELECT s_id, s_status_id, s_status_name 
FROM statuses;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getPouchGemz` $$
SHOW WARNINGS$$
USE gemz$$

CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getPouchGemz`(IN in_pouch_id INT, IN in_user_id INT)
BEGIN

SELECT 	gem_id, title, description, focus_icon, disable_icon, price, pri, created, status_id, content, category, author, 
purchase_url, service_url
FROM gemzView gemz 
WHERE gem_id IN (SELECT pg_gem_id FROM pouch_gemz WHERE pg_pouch_id = in_pouch_id AND pg_user_id = in_user_id);

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_registerNewGem` $$
SHOW WARNINGS$$
USE gemz$$

CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_registerNewGem`(
IN in_title VARCHAR(45),
IN in_description VARCHAR(145),
IN in_focus_icon VARCHAR(200),
IN in_disable_icon VARCHAR(200),
IN in_price FLOAT(6,3),
IN in_priority INT,
IN in_content_id INT,
IN in_category_id INT,
IN in_author_id INT,
IN in_purchase_url VARCHAR(255),
IN in_service_url VARCHAR(255),
IN in_status_id INT,
IN in_parent_id INT
)
BEGIN
-- Declare
DECLARE l_gem_id INT;

START TRANSACTION;

-- check that the same gem does not exist
SELECT COUNT(*) INTO @cnt FROM gemz WHERE g_title = in_title;
IF @cnt > 0 THEN
	ROLLBACK;
	SELECT -1 AS gem_id;
END IF;

-- set gem data
INSERT INTO gemz 
(g_title, g_description, g_focus_icon, g_disable_icon, g_price, g_priority, g_created, g_status_id, g_content_id, g_category_id, g_author_id, g_purchase_url, g_service_url)
VALUES
(in_title, in_description, in_focus_icon, in_disable_icon, in_price, in_priority, NOW(), 1, in_content_id, in_category_id, in_author_id, in_purchase_url, in_service_url);

SET l_gem_id = LAST_INSERT_ID();

IF l_gem_id < 1 THEN ROLLBACK;
END IF;

COMMIT;

SELECT IFNULL(l_gem_id, -1) AS gem_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_registerGemz` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `sp_registerGemz`(
IN in_user_id INT,
IN in_pouch_id INT,
IN in_gemz TEXT,
IN in_delim VARCHAR(2)
)
BEGIN


DECLARE cur_position INT DEFAULT 1;
DECLARE remainder TEXT;
DECLARE values_str VARCHAR(500);
DECLARE cur_string VARCHAR(1000);
DECLARE delimiter_length TINYINT UNSIGNED;
DECLARE pos INT DEFAULT 1;

START TRANSACTION;


SET remainder = in_gemz;
SET @created = NOW();
SET delimiter_length = CHAR_LENGTH(in_delim);
WHILE CHAR_LENGTH(remainder) > 0 AND cur_position > 0 DO
  SET cur_position = INSTR(remainder, in_delim);
  IF cur_position = 0 THEN
  	SET cur_string = remainder;
  ELSE
	SET cur_string = LEFT(remainder, cur_position - 1);
  END IF;
  IF TRIM(cur_string) != '' THEN 
	SET @user_id = in_user_id;
	SET @rem = cur_string;
	SET @user_id = in_user_id;
	SET @status_id = 1;
	SET @created = NOW();
	SET @pouch_id = in_pouch_id;
	SET @gem_id = SUBSTRING_INDEX(@rem, ':', 1);
	SET @pr = SUBSTRING_INDEX(@rem, ':', -1);
	SET @qry_gemset = 'INSERT INTO pouch_gemz(pg_pouch_id, pg_gem_id, pg_user_id, pg_date, pg_priority, pg_status_id) VALUES (?,?,?,?,?,?)';
        PREPARE stmt FROM @qry_gemset;
        EXECUTE stmt USING @pouch_id, @gem_id, @user_id, @created, @pr, @status_id;
        DEALLOCATE PREPARE stmt;
  END IF;
  SET remainder = SUBSTRING(remainder, cur_position + delimiter_length);
END WHILE;

COMMIT;

SELECT IFNULL(LAST_INSERT_ID(), -1) AS gem_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`registerPouch` $$
SHOW WARNINGS$$
USE gemz$$
CREATE PROCEDURE `gemz`.`registerPouch` ()
BEGIN

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getGemz` $$
SHOW WARNINGS$$
USE gemz$$

CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getGemz`(
IN in_category_id VARCHAR(80),
IN in_author_id VARCHAR(80)
)
BEGIN
IF in_category_id LIKE 'all' AND in_author_id LIKE 'all' THEN
	SELECT gem_id, title, description, focus_icon, disable_icon, price, pri, created, status_id, content, category, author, 
purchase_url, service_url
	FROM gemzView;
ELSEIF in_category_id LIKE 'all' AND in_author_id NOT LIKE 'all' THEN
	SELECT gem_id, title, description, focus_icon, disable_icon, price, pri, created, status_id, content, category, author, 
purchase_url, service_url
	FROM gemzView
	WHERE author LIKE in_author_id;
ELSEIF in_author_id LIKE 'all' AND in_category_id NOT LIKE 'all' THEN
	 SELECT gem_id, title, description, focus_icon, disable_icon, price, pri, created, status_id, content, category, author, 
purchase_url, service_url
	FROM gemzView
	WHERE category LIKE in_category_id;
ELSEIF in_category_id NOT LIKE 'all' AND in_author_id NOT LIKE 'all' THEN
	SELECT gem_id, title, description, focus_icon, disable_icon, price, pri, created, status_id, content, category, author, 
purchase_url, service_url
	FROM gemzView
	WHERE category LIKE in_category_id AND author LIKE in_author_id; 
END IF;
END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getUserData` $$
SHOW WARNINGS$$
USE gemz$$

CREATE PROCEDURE `sp_getUserData`(IN in_user_id INT)

BEGIN

SELECT user_id, username, fname, lname, phone, email, cellular, address, city, zipcode, state, country, created
FROM usersView info
WHERE user_id = in_user_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_getUserCredentials` $$
SHOW WARNINGS$$
USE gemz$$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `gemz`.`sp_getUserCredentials`( 
IN in_site VARCHAR(100),
IN in_user_id INT
)
BEGIN

SELECT id, site, username, passwd, status_id, url, host, port
FROM user_credentials 
WHERE site LIKE in_site AND user_id = in_user_id;

END$$
SHOW WARNINGS$$
USE gemz$$
DROP procedure IF EXISTS `gemz`.`sp_insertUserCredentials` $$
SHOW WARNINGS$$
USE gemz$$

CREATE DEFINER=`oren`@`localhost` PROCEDURE `gemz`.`sp_insertUserCredentials`( 
IN in_site VARCHAR(100),
IN in_username VARCHAR(100),
IN in_passwd VARCHAR(100),
IN in_url VARCHAR(200),
IN in_user_id INT,
IN in_host VARCHAR(145),
IN in_port VARCHAR(5)
)
BEGIN

INSERT INTO user_credentials(user_id, site, username, passwd, status_id, url, host, port)
VALUES (in_user_id, in_site, in_username, in_passwd, 1, in_url, in_host, in_port);
SELECT LAST_INSERT_ID() as id;
END$$
SHOW WARNINGS$$

DELIMITER ;

-- -----------------------------------------------------
-- View `gemz`.`accountsView`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `gemz`.`accountsView` ;
SHOW WARNINGS;
DROP TABLE IF EXISTS `gemz`.`accountsView`;
SHOW WARNINGS;
USE gemz;
CREATE  OR REPLACE VIEW `gemz`.`accountsView` AS
SELECT ua.ua_user_id, ua.ua_passwd, ua.ua_status,  u.u_fname, u.u_lname, u.u_email, u.u_username FROM users_access ua
LEFT JOIN users u 
ON ua.ua_user_id = u.u_user_id;
;
SHOW WARNINGS;

-- -----------------------------------------------------
-- View `gemz`.`gemzView`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `gemz`.`gemzView` ;
SHOW WARNINGS;
DROP TABLE IF EXISTS `gemz`.`gemzView`;
SHOW WARNINGS;
USE gemz;
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `gemzView` AS
SELECT 	g.g_gem_id AS gem_id,
 	g.g_title AS title, 
	g.g_description AS description, 
	g.g_focus_icon AS focus_icon, 
	g.g_disable_icon AS disable_icon, 
	g.g_price AS price,
	g.g_priority AS pri, 
	g.g_created AS created, 
	g.g_status_id AS status_id, 
	ct.ct_type AS content,
	gc.gc_category_name AS category, 
	a.a_author_name AS author, 
	g.g_purchase_url AS purchase_url, 
	g.g_service_url AS service_url
FROM gemz g 
INNER JOIN gemz_categories gc ON(g.g_category_id = gc.gc_category_id)
INNER JOIN content_type ct ON(g.g_content_id = ct.ct_content_id)
INNER JOIN authors a ON(g.g_author_id = a.a_author_id);
;
SHOW WARNINGS;

-- -----------------------------------------------------
-- View `gemz`.`usersView`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `gemz`.`usersView` ;
SHOW WARNINGS;
DROP TABLE IF EXISTS `gemz`.`usersView`;
SHOW WARNINGS;
USE gemz;
DROP VIEW IF EXISTS `gemz`.`usersView`;
CREATE  OR REPLACE VIEW `gemz`.`usersView` AS
SELECT u.u_user_id AS user_id, u.u_username AS username, u.u_fname AS fname, u.u_lname AS lname, u.u_email AS email,
 u.u_phone AS phone, u.u_cellular AS cellular, a.a_address AS address, a.a_city AS city, a.a_state AS state, 
a.a_country AS country, a.a_zipcode AS zipcode, a.a_created AS created
FROM users u LEFT JOIN addresses a 
ON u.u_address_id = a.a_address_id 
WHERE a.a_address_type_id = 1;
;
SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `gemz`.`address_type`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`address_type` (`at_address_type_id`, `at_address_type`) values (1, 'residential');
insert into `gemz`.`address_type` (`at_address_type_id`, `at_address_type`) values (2, 'commercial');
insert into `gemz`.`address_type` (`at_address_type_id`, `at_address_type`) values (3, 'shipping');
insert into `gemz`.`address_type` (`at_address_type_id`, `at_address_type`) values (4, 'billing');
insert into `gemz`.`address_type` (`at_address_type_id`, `at_address_type`) values (5, 'work');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`addresses`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`addresses` (`a_address_id`, `a_address`, `a_city`, `a_zipcode`, `a_state`, `a_country`, `a_address_type_id`, `a_status_id`, `a_created`) values (1, '33 main st', 'Santa Monica', '90401', 'CA', 'US', 1, '1', '2010-01-01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`users`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`users` (`u_user_id`, `u_username`, `u_fname`, `u_lname`, `u_email`, `u_phone`, `u_cellular`, `u_address_id`, `u_zipcode`, `u_user_type`, `u_device_id`, `u_lng`, `u_lat`, `u_product_set_id`, `u_status_id`) values (1, 'oren', 'oren', 'shep', 'oren@mobilegates.com', '818-899-3493', '818-900-3433', 1, '90401', '1', 2, 30.203000, -10.343343, '2', '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`content_type`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`content_type` (`ct_content_id`, `ct_type`, `ct_status_id`) values (1, 'text', '1');
insert into `gemz`.`content_type` (`ct_content_id`, `ct_type`, `ct_status_id`) values (2, 'audio', '1');
insert into `gemz`.`content_type` (`ct_content_id`, `ct_type`, `ct_status_id`) values (3, 'video', '1');
insert into `gemz`.`content_type` (`ct_content_id`, `ct_type`, `ct_status_id`) values (4, 'image', '1');
insert into `gemz`.`content_type` (`ct_content_id`, `ct_type`, `ct_status_id`) values (5, 'binary', '1');
insert into `gemz`.`content_type` (`ct_content_id`, `ct_type`, `ct_status_id`) values (6, 'gzip', '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`authors`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`authors` (`a_author_id`, `a_author_name`, `a_author_site`, `a_author_status`) values (1, 'oren', 'www.mobilegates.com', '0');
insert into `gemz`.`authors` (`a_author_id`, `a_author_name`, `a_author_site`, `a_author_status`) values (2, 'jim', 'www.mobilegates.com', '0');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`gemz`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`gemz` (`g_gem_id`, `g_title`, `g_description`, `g_focus_icon`, `g_disable_icon`, `g_price`, `g_priority`, `g_created`, `g_status_id`, `g_content_id`, `g_category_id`, `g_author_id`, `g_purchase_url`, `g_service_url`) values (1, 'RadioTime Gem', 'Wrapper Gem for RadioTime', '/gemz/images/radiotime_on.png', '/gemz/images/radiotime_off.png', 1, 3, '2010-01-09', '1', 1, 2, 1, '', '/gemz/radiotime/');
insert into `gemz`.`gemz` (`g_gem_id`, `g_title`, `g_description`, `g_focus_icon`, `g_disable_icon`, `g_price`, `g_priority`, `g_created`, `g_status_id`, `g_content_id`, `g_category_id`, `g_author_id`, `g_purchase_url`, `g_service_url`) values (2, 'Traffic Gem', 'Shows traffic along a route', '/gemz/images/traffic_on.png', '/gemz/images/traffic_off.png', 1.98999999999999999, 4, '2010-01-15', '1', 1, 2, 1, '/gemz/buy/traffic', '/gemz/traffic/');
insert into `gemz`.`gemz` (`g_gem_id`, `g_title`, `g_description`, `g_focus_icon`, `g_disable_icon`, `g_price`, `g_priority`, `g_created`, `g_status_id`, `g_content_id`, `g_category_id`, `g_author_id`, `g_purchase_url`, `g_service_url`) values (3, 'Fuel Gem', 'Finds the cheapest gas station in a proximity', '/gemz/images/fuel_on.png', '/gemz/images/fuel_off.png', 1, 2, '2010-01-01', '1', 2, 1, 1, '/gemz/buy/fuel', '/gemz/fuel');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`devices`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`devices` (`d_device_id`, `d_device_type`, `d_device_name`, `d_device_status_id`, `d_device_icon`) values (NULL, '2', 'BlackBerry', '1', '');
insert into `gemz`.`devices` (`d_device_id`, `d_device_type`, `d_device_name`, `d_device_status_id`, `d_device_icon`) values (NULL, '2', 'iPhone', '1', '');
insert into `gemz`.`devices` (`d_device_id`, `d_device_type`, `d_device_name`, `d_device_status_id`, `d_device_icon`) values (NULL, '2', 'G1', '1', NULL);
insert into `gemz`.`devices` (`d_device_id`, `d_device_type`, `d_device_name`, `d_device_status_id`, `d_device_icon`) values (NULL, '2', 'HTC', '1', NULL);
insert into `gemz`.`devices` (`d_device_id`, `d_device_type`, `d_device_name`, `d_device_status_id`, `d_device_icon`) values (NULL, '2', 'Droid', '1', '');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`pouches`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`pouches` (`p_pouch_id`, `p_name`, `p_user_id`, `p_status_id`, `p_created`, `p_updated`, `p_priority`, `p_parent_id`) values (1, 'Social pouch', 1, '1', '2010-01-02', '2010-02-01', '1', 0);
insert into `gemz`.`pouches` (`p_pouch_id`, `p_name`, `p_user_id`, `p_status_id`, `p_created`, `p_updated`, `p_priority`, `p_parent_id`) values (2, 'Location', 1, '1', '2010-01-02', '2010-01-02', '4', 0);
insert into `gemz`.`pouches` (`p_pouch_id`, `p_name`, `p_user_id`, `p_status_id`, `p_created`, `p_updated`, `p_priority`, `p_parent_id`) values (3, 'Family', 1, '1', '2010-01-02', '2010-01-02', '2', 0);

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`pouch_gemz`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`pouch_gemz` (`pg_id`, `pg_pouch_id`, `pg_gem_id`, `pg_user_id`, `pg_date`, `pg_priority`, `pg_status_id`) values (1, 1, '1', 1, '2010-01-01', 4, '1');
insert into `gemz`.`pouch_gemz` (`pg_id`, `pg_pouch_id`, `pg_gem_id`, `pg_user_id`, `pg_date`, `pg_priority`, `pg_status_id`) values (2, 1, '2', 1, '2010-01-01', 2, '1');
insert into `gemz`.`pouch_gemz` (`pg_id`, `pg_pouch_id`, `pg_gem_id`, `pg_user_id`, `pg_date`, `pg_priority`, `pg_status_id`) values (3, 1, '3', 1, '2010-01-01', 5, '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`users_access`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`users_access` (`ua_id`, `ua_user_id`, `ua_passwd`, `ua_status`, `ua_user_type`, `ua_api_key`) values (1, 1, 'c5601b8663fbf749a08162175a96b180', '1', '1', '');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`priorities`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`priorities` (`p_priority_id`, `p_priority_title`, `p_priority_factor`, `p_priority_status`) values (1, 'location', 40, '1');
insert into `gemz`.`priorities` (`p_priority_id`, `p_priority_title`, `p_priority_factor`, `p_priority_status`) values (2, 'history', 30, '1');
insert into `gemz`.`priorities` (`p_priority_id`, `p_priority_title`, `p_priority_factor`, `p_priority_status`) values (3, 'family', 50, '1');
insert into `gemz`.`priorities` (`p_priority_id`, `p_priority_title`, `p_priority_factor`, `p_priority_status`) values (4, 'friends', 40, '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`statuses`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`statuses` (`s_id`, `s_status_id`, `s_status_name`) values (NULL, '0', 'not validated');
insert into `gemz`.`statuses` (`s_id`, `s_status_id`, `s_status_name`) values (NULL, '1', 'validated');
insert into `gemz`.`statuses` (`s_id`, `s_status_id`, `s_status_name`) values (NULL, '2', 'suspended');
insert into `gemz`.`statuses` (`s_id`, `s_status_id`, `s_status_name`) values (NULL, '3', 'deleted');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`gemz_categories`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`gemz_categories` (`gc_category_id`, `gc_category_name`, `gc_category_parent`, `gc_status_id`) values (1, 'location', 0, '1');
insert into `gemz`.`gemz_categories` (`gc_category_id`, `gc_category_name`, `gc_category_parent`, `gc_status_id`) values (2, 'social', 0, '1');
insert into `gemz`.`gemz_categories` (`gc_category_id`, `gc_category_name`, `gc_category_parent`, `gc_status_id`) values (3, 'games', 0, '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`user_type`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`user_type` (`u_user_type`, `u_type_name`) values (1, 'consumer');
insert into `gemz`.`user_type` (`u_user_type`, `u_type_name`) values (2, 'vendor');
insert into `gemz`.`user_type` (`u_user_type`, `u_type_name`) values (3, 'affiliate');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`api`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`api` (`a_api_id`, `a_api_name`, `a_created`, `a_updated`, `a_status_id`) values (1, 'gemz', '2010-01-10', '2010-01-10', '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gemz`.`user_credentials`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `gemz`;
insert into `gemz`.`user_credentials` (`id`, `user_id`, `site`, `username`, `passwd`, `url`, `status_id`, `host`, `port`) values (1, 1, 'gmail', 'oshepes@gmail.com', 'tKG3g7OBlIM=', 'mail.google.com', '1', 'imap.gmail.com', '993');
insert into `gemz`.`user_credentials` (`id`, `user_id`, `site`, `username`, `passwd`, `url`, `status_id`, `host`, `port`) values (2, 1, 'facebook', 'oshepes@gmail.com', 'YDmPTLgi7CA=', 'login.facebook.com', '1', 'facebook.com', NULL);
insert into `gemz`.`user_credentials` (`id`, `user_id`, `site`, `username`, `passwd`, `url`, `status_id`, `host`, `port`) values (3, 1, 'twitter', 'orenshep', 'tKG3g7OBlIM=', 'twitter.com', '1', 'twitter.com', NULL);
insert into `gemz`.`user_credentials` (`id`, `user_id`, `site`, `username`, `passwd`, `url`, `status_id`, `host`, `port`) values (4, 1, 'mail', 'oshepes@gmail.com', 'tKG3g7OBlIM=', 'pop.gmail.com', '1', 'pop.gmail.com', '995');

COMMIT;
