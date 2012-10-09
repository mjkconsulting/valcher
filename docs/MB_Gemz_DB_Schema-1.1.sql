SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

#DROP SCHEMA IF EXISTS `gemz` ;
CREATE SCHEMA IF NOT EXISTS `gemz` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`content_type`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`content_type` (
  `ct_content_id` INT NOT NULL ,
  `ct_type` VARCHAR(45) NOT NULL ,
  `ct_status_id` TINYINT NULL ,
  PRIMARY KEY (`ct_content_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz` (
  `g_gem_id` INT NOT NULL ,
  `g_title` VARCHAR(85) NOT NULL ,
  `g_description` MEDIUMTEXT NOT NULL ,
  `g_focus_icon` VARCHAR(145) NOT NULL ,
  `g_disable_icon` VARCHAR(145) NOT NULL ,
  `g_price` DECIMAL NOT NULL ,
  `g_priority_id` INT(11) NOT NULL ,
  `g_created` DATETIME NOT NULL ,
  `g_status_id` TINYINT NULL ,
  `g_content_id` INT NOT NULL ,
  `g_category_id` INT(11) NOT NULL ,
  `g_author_id` TINYINT NULL ,
  `g_purchase_url` VARCHAR(200) NULL ,
  `g_service_url` VARCHAR(200) NULL ,
  PRIMARY KEY (`g_price`, `g_gem_id`, `g_content_id`) ,
  CONSTRAINT `fk_gemz_content_type`
    FOREIGN KEY (`g_content_id` )
    REFERENCES `gemz`.`content_type` (`ct_content_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Gemz table';

SHOW WARNINGS;
CREATE INDEX `fk_gemz_content_type` ON `gemz`.`gemz` (`g_content_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_users` (
  `gu_id` BIGINT NOT NULL ,
  `gu_user_id` BIGINT NOT NULL ,
  `gu_gem_id` BIGINT NOT NULL ,
  PRIMARY KEY (`gu_id`) ,
  CONSTRAINT `fk_gemz_users_gemz`
    FOREIGN KEY (`gu_gem_id` )
    REFERENCES `gemz`.`gemz` (`g_gem_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Link table to map gemz sets';

SHOW WARNINGS;
CREATE INDEX `fk_gemz_users_gemz` ON `gemz`.`gemz_users` (`gu_gem_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`users_access`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`users_access` (
  `ua_id` INT NOT NULL ,
  `ua_user_id` BIGINT NOT NULL ,
  `ua_passwd` VARCHAR(15) NOT NULL ,
  `ua_status` ENUM('A', 'D', 'S', 'U') NOT NULL ,
  `ua_user_type` TINYINT NULL ,
  PRIMARY KEY (`ua_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`pouch`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`pouch` (
  `p_pouch_set_id` INT NOT NULL ,
  `p_user_id` BIGINT NOT NULL ,
  `p_gem_set_id` INT(11) NOT NULL ,
  `p_status_id` VARCHAR(45) NULL ,
  `p_created` DATETIME NOT NULL ,
  `p_updated` DATETIME NULL ,
  PRIMARY KEY (`p_pouch_set_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`users` (
  `u_user_id` INT NOT NULL ,
  `u_username` VARCHAR(25) NOT NULL ,
  `u_fname` VARCHAR(15) NOT NULL ,
  `u_lname` VARCHAR(15) NOT NULL ,
  `u_email` VARCHAR(105) NOT NULL ,
  `u_phone` VARCHAR(15) NULL ,
  `u_cellular` VARCHAR(15) NOT NULL ,
  `u_address_id` INT(11) NOT NULL ,
  `u_zipcode` VARCHAR(15) NULL ,
  `u_user_type` TINYINT NULL ,
  `u_device_id` TINYINT NULL ,
  `u_lng` DOUBLE NULL ,
  `u_lat` DOUBLE NULL ,
  `u_status_id` TINYINT NULL ,
  `u_pouch_set_id` INT(11) NOT NULL ,
  `u_created` DATETIME NOT NULL DEFAULT NOW() ,
  `u_date_modified` DATETIME NULL ,
  PRIMARY KEY (`u_user_id`, `u_username`) ,
  CONSTRAINT `fk_users_gemz_users`
    FOREIGN KEY (`u_user_id` )
    REFERENCES `gemz`.`gemz_users` (`gu_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_users_access`
    FOREIGN KEY (`u_user_id` )
    REFERENCES `gemz`.`users_access` (`ua_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_pouch`
    FOREIGN KEY (`u_pouch_set_id` )
    REFERENCES `gemz`.`pouch` (`p_pouch_set_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `u_username_UNIQUE` ON `gemz`.`users` (`u_username` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_users_gemz_users` ON `gemz`.`users` (`u_user_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_users_users_access` ON `gemz`.`users` (`u_user_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_users_pouch` ON `gemz`.`users` (`u_pouch_set_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`logins`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`logins` (
  `l_login_id` INT NOT NULL ,
  `l_username` VARCHAR(85) NULL ,
  `l_date` DATE NOT NULL ,
  `l_time` TIME NULL ,
  `l_ip` VARCHAR(45) NOT NULL ,
  `l_device_id` VARCHAR(45) NULL ,
  PRIMARY KEY (`l_login_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_messeges`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_messeges` (
  `gm_message_id` INT NOT NULL ,
  `gm_type` TINYINT NOT NULL ,
  `gm_gem_id` BIGINT NOT NULL ,
  `gm_user_id` BIGINT NOT NULL ,
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
-- Table `gemz`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`products` (
  `p_product_id` INT NOT NULL ,
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
CREATE  TABLE IF NOT EXISTS `gemz`.`products_devices` (
  `pd_id` INT NOT NULL ,
  `pd_product_id` TINYINT NOT NULL ,
  `pd_device_id` TINYINT NOT NULL ,
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
-- Table `gemz`.`devices`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`devices` (
  `d_device_id` INT NOT NULL ,
  `d_device_type` TINYINT NOT NULL ,
  `d_device_name` VARCHAR(45) NOT NULL ,
  `d_device_status_id` TINYINT NOT NULL ,
  `d_device_icon` VARCHAR(85) NOT NULL ,
  PRIMARY KEY (`d_device_id`) ,
  CONSTRAINT `fk_devices_products_devices`
    FOREIGN KEY (`d_device_id` )
    REFERENCES `gemz`.`products_devices` (`pd_device_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_devices_products_devices` ON `gemz`.`devices` (`d_device_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`vendors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`vendors` (
  `v_vendor_id` INT NOT NULL ,
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
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_devices` (
  `gd_id` INT NOT NULL ,
  `gd_gem_id` TINYINT NOT NULL ,
  `gd_device_id` TINYINT NOT NULL ,
  `gd_status_id` TINYINT NOT NULL ,
  PRIMARY KEY (`gd_id`, `gd_gem_id`, `gd_device_id`) ,
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
-- Table `gemz`.`gem_set`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`gem_set` (
  `gs_set_id` INT NOT NULL ,
  `gs_gemset_id` INT(11) NOT NULL ,
  `gs_gem_id` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`gs_set_id`, `gs_gem_id`) ,
  CONSTRAINT `fk_gem_set_users`
    FOREIGN KEY (`gs_gemset_id` )
    REFERENCES `gemz`.`users` (`u_pouch_set_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_gem_set_users` ON `gemz`.`gem_set` (`gs_gemset_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`affiliates`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`affiliates` (
  `a_affiliated_id` INT NOT NULL ,
  `a_name` VARCHAR(145) NOT NULL ,
  `a_contact_name` VARCHAR(145) NULL ,
  `a_website` VARCHAR(200) NOT NULL ,
  `a_company` VARCHAR(85) NOT NULL ,
  `a_gem_id` INT(11) NULL ,
  PRIMARY KEY (`a_affiliated_id`) ,
  CONSTRAINT `fk_affiliates_gem_set`
    FOREIGN KEY (`a_gem_id` )
    REFERENCES `gemz`.`gem_set` (`gs_gem_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_affiliates_gem_set` ON `gemz`.`affiliates` (`a_gem_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`priorities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`priorities` (
  `p_priority_id` INT NOT NULL ,
  `p_priority_title` VARCHAR(65) NOT NULL ,
  `p_priority_factor` FLOAT NOT NULL ,
  `p_priority_status` VARCHAR(45) NULL ,
  PRIMARY KEY (`p_priority_id`) ,
  CONSTRAINT `fk_priorities_gemz`
    FOREIGN KEY (`p_priority_id` )
    REFERENCES `gemz`.`gemz` (`g_priority_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_priorities_gemz` ON `gemz`.`priorities` (`p_priority_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`gemz_priorities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`gemz_priorities` (
  `gp_id` INT NOT NULL ,
  `gp_user_id` BIGINT NOT NULL ,
  `gp_gem_id` INT(11) NOT NULL ,
  `gp_priority_id` TINYINT NOT NULL ,
  PRIMARY KEY (`gp_id`, `gp_gem_id`) ,
  CONSTRAINT `fk_gemz_priorities_priorities`
    FOREIGN KEY (`gp_priority_id` )
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
CREATE INDEX `fk_gemz_priorities_priorities` ON `gemz`.`gemz_priorities` (`gp_priority_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_gemz_priorities_gemz` ON `gemz`.`gemz_priorities` (`gp_gem_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`addresses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`addresses` (
  `a_address_id` INT NOT NULL ,
  `a_user_id` INT(11) NOT NULL ,
  `a_address_type` TINYINT NOT NULL ,
  `a_address` VARCHAR(145) NOT NULL ,
  `a_city` VARCHAR(45) NOT NULL ,
  `a_state` VARCHAR(45) NOT NULL ,
  `a_zip` VARCHAR(15) NOT NULL ,
  `a_country` VARCHAR(25) NOT NULL ,
  `a_status` TINYINT NULL ,
  PRIMARY KEY (`a_address_id`) ,
  CONSTRAINT `fk_addresses_users_address`
    FOREIGN KEY (`a_address_id` )
    REFERENCES `gemz`.`users` (`u_address_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_addresses_users_user`
    FOREIGN KEY (`a_user_id` )
    REFERENCES `gemz`.`users` (`u_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_addresses_users_address` ON `gemz`.`addresses` (`a_address_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_addresses_users_user` ON `gemz`.`addresses` (`a_user_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`api_tracking`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`api_tracking` (
  `api_call_id` BIGINT NOT NULL ,
  `api_service_id` INT(11) NOT NULL ,
  `api_timestamp` TIMESTAMP NOT NULL ,
  `api_ipaddress` VARCHAR(45) NULL ,
  `api_agent` VARCHAR(75) NULL ,
  PRIMARY KEY (`api_call_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `gemz`.`api_services`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gemz`.`api_services` (
  `as_service_id` INT NOT NULL ,
  `as_service_name` VARCHAR(45) NOT NULL ,
  `as_status_id` TINYINT NOT NULL ,
  `as_author` VARCHAR(45) NULL ,
  `as_created` DATETIME NOT NULL ,
  `as_updated` DATETIME NULL ,
  PRIMARY KEY (`as_service_id`) ,
  CONSTRAINT `fk_api_services_api_tracking1`
    FOREIGN KEY (`as_service_id` )
    REFERENCES `gemz`.`api_tracking` (`api_service_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_api_services_api_tracking1` ON `gemz`.`api_services` (`as_service_id` ASC) ;

SHOW WARNINGS;

;
SHOW WARNINGS;
CREATE USER api_user IDENTIFIED BY 'g3mz@p!';

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
