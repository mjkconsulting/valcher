DELIMITER $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_activate` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_activate`(IN in_email VARCHAR(220))
BEGIN
DECLARE l_user_id, l_userid INT;
DECLARE l_email VARCHAR(200);
	SELECT user_id INTO l_userid FROM users WHERE in_email = MD5(email);
	IF l_userid > 0 THEN
		UPDATE users SET status_id = 1 WHERE user_id = l_userid;
		UPDATE users_access SET status = 1 WHERE user_id = l_userid;
	END IF;
	SELECT email INTO l_email FROM users WHERE in_email = MD5(email);
	SELECT IFNULL(l_email, -1) AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_activateVendor` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_activateVendor`(IN in_email VARCHAR(220))
BEGIN
DECLARE l_user_id, l_userid INT;
DECLARE l_email VARCHAR(200);
	SELECT vendor_id INTO l_userid FROM vendors WHERE in_email = MD5(email);
	IF l_userid > 0 THEN
		UPDATE vendors SET status_id = 1 WHERE vendor_id = l_userid;
	END IF;
	SELECT email INTO @email FROM vendors WHERE in_email = MD5(email);
	SELECT IFNULL(l_email, -1) AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_addCreditCard` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_addCreditCard`(
IN in_user_id INT,
IN in_card_type VARCHAR(20),
IN in_card_number VARCHAR(95),
IN in_card_exp VARCHAR(10),
IN in_card_cvv VARCHAR(100),
IN in_card_name VARCHAR(120),
IN in_status_id INT,
IN in_address VARCHAR(200),
IN in_city VARCHAR(120),
IN in_state VARCHAR(10),
IN in_zipcode VARCHAR(12)
)
BEGIN
DECLARE l_aid, l_address_id, l_uid, l_cnt INT;
INSERT INTO addresses (address, city, zipcode, state, country, address_type_id, status_id, created)
VALUES (in_address, in_city, in_zipcode, in_state, 'US', 1, 1, NOW());
SET l_address_id = LAST_INSERT_ID();
INSERT INTO billing (user_id, card_type, card_number, card_exp, card_cvv, card_name, address_id, status_id)
VALUES (in_user_id, in_card_type, in_card_number, in_card_exp, in_card_cvv, in_card_name, l_address_id, 1);
SELECT LAST_INSERT_ID() AS bid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getAllDeals` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getAllDeals`()
BEGIN
	SELECT * FROM deals d LEFT JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a 
	ON v.address_id = a.address_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getAvailableDeals` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getAvailableDeals`(IN in_user_id INT)
BEGIN
	SELECT * FROM deals d 
	INNER JOIN deal_tracking dt
	ON d.deal_id = dt.deal_id
	INNER JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a 
	ON v.address_id = a.address_id
	WHERE dt.user_id = in_user_id AND d.deal_end > NOW();
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getBillingData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getBillingData`(IN in_user_id INT)
BEGIN
SELECT b.id as bid, b.card_type, b.card_number, b.card_exp, b.card_name, b.card_cvv, a.address, a.city, a.state, a.country, a.zipcode, u.email, 
u.fname, u.lname, ua.passwd
FROM billing b
LEFT JOIN addresses a ON b.address_id = a.address_id 
LEFT JOIN users u ON u.user_id = in_user_id
LEFT JOIN users_access ua ON ua.user_id = in_user_id
WHERE b.user_id = in_user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getBillingIDs` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getBillingIDs`(IN in_user_id INT)
BEGIN
SELECT b.id, b.card_type, b.card_number, b.card_exp, b.card_name, b.card_cvv, u.fname, u.lname
FROM billing b
LEFT JOIN users u ON u.user_id = in_user_id
WHERE b.user_id = in_user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getCategories` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getCategories`(
IN in_parent_id INT
)
BEGIN
IF NOT ISNULL(in_parent_id) THEN
	SELECT category_id, name, description FROM categories WHERE parent_id = in_parent_id;
ELSE
	SELECT category_id, name, description FROM categories;
END IF;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDeal` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDeal`(IN in_deal_id INT)
BEGIN
	SELECT d.deal_id, d.deal_category, d.deal_name, d.deal_start, d.deal_end, d.deal_price, d.deal_discount, d.deal_status, d.deal_fine_print, d.deal_content, d.deal_image,
		d.deal_description, d.deal_tipped, d.deal_details, d.deal_code, d.vendor_id, v.category_id, v.email, v.phone, v.cellular, v.name, v.image_url, a.address, a.city, a.state, a.zipcode
	FROM deals d 
	LEFT JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a
	ON v.address_id = a.address_id
	WHERE d.deal_id = in_deal_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealByDate` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealByDate`(
IN in_start DATE,
IN in_end DATE
)
BEGIN
	SELECT * FROM deals d LEFT JOIN vendors v
	ON d.vendor_id = v.vendor_id
	WHERE d.deal_start > in_start AND d.deal_end > in_end;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealCount` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealCount`(IN in_deal_id INT)
BEGIN
DECLARE l_isTipped INT;
	SELECT COUNT(*) AS cnt FROM deal_tracking WHERE deal_id = in_deal_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealDetails` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealDetails`(IN in_deal_id INT)
BEGIN
	SELECT deal_detail_id, deal_att, deal_value, deal_type 
	FROM deal_details
	WHERE deal_id = in_deal_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealLocations` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealLocations`()
BEGIN
	SELECT DISTINCT(a.city) FROM deals d
	LEFT JOIN vendors v ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a ON v.address_id = a.address_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealOfTheDay` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealOfTheDay`(
IN in_date DATE
)
BEGIN
	SELECT * FROM deals d LEFT JOIN vendors v
	ON d.vendor_id = v.vendor_id
	WHERE in_date BETWEEN d.deal_start AND d.deal_end;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealReviews` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealReviews`(IN in_deal_id INT)
BEGIN
	SELECT * FROM deal_reviews WHERE deal_id = in_deal_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealTipped` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealTipped`(IN in_deal_id INT)
BEGIN
DECLARE l_isTipped, l_cnt, l_tipped, l_req INT;
	
	SELECT COUNT(*) INTO l_cnt FROM deal_tracking WHERE deal_id = in_deal_id;
	
	SELECT deal_tipped INTO l_req FROM deals WHERE deal_id = in_deal_id;
	
	SELECT deal_tipped INTO l_tipped FROM deals WHERE deal_id = in_deal_id;
	IF l_cnt >= l_tipped THEN
		SET l_isTipped = 1;
	ELSE 
		SET l_isTipped = 0;
	END IF;
	SELECT CONCAT(l_isTipped,':',l_cnt,':',l_req) AS 'tipped:bought:req';
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDeals` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDeals`(IN in_user_id INT)
BEGIN
	SELECT * FROM deals d 
	INNER JOIN deal_tracking dt
	ON d.deal_id = dt.deal_id
	INNER JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a
	ON v.address_id = a.address_id
	WHERE dt.user_id = in_user_id ORDER BY d.deal_priority ASC;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getDealsByDateRange` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getDealsByDateRange`(
IN in_start DATE,
IN in_end DATE
)
BEGIN
	SELECT * FROM deals d LEFT JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a 
	ON v.address_id = a.address_id
	WHERE d.deal_start BETWEEN in_start AND in_end;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getExpiredDeals` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getExpiredDeals`(IN in_user_id INT)
BEGIN
	SELECT * FROM deals d 
	INNER JOIN deal_tracking dt
	ON d.deal_id = dt.deal_id
	INNER JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a 
	ON v.address_id = a.address_id
	WHERE dt.user_id = in_user_id AND d.deal_end < NOW();
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getFeatureDeal` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getFeatureDeal`()
BEGIN
	SELECT d.deal_id, d.deal_category, d.deal_name, d.deal_start, d.deal_end, d.deal_price, d.deal_discount, d.deal_status, d.deal_details, d.deal_fine_print, d.deal_content, d.deal_image,
		d.deal_description, d.deal_tipped, d.deal_details, d.deal_code, d.vendor_id, d.deal_max, d.deal_priority, v.name, v.image_url, v.url, a.address, a.city, a.state, a.zipcode
	FROM deals d 
	LEFT JOIN vendors v
	ON d.vendor_id = v.vendor_id
	LEFT JOIN addresses a
	ON v.address_id = a.address_id
	WHERE NOW() BETWEEN d.deal_start AND d.deal_end
	ORDER BY d.deal_start DESC, d.deal_priority ASC LIMIT 1;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getHowManyToTip` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getHowManyToTip`(IN in_deal_id INT)
BEGIN
DECLARE l_isTipped, l_cnt, l_tipped INT;
	SELECT COUNT(*) INTO l_cnt FROM deal_tracking WHERE deal_id = in_deal_id;
	SELECT deal_tipped INTO l_tipped FROM deals WHERE deal_id = in_deal_id;
	IF l_cnt >= l_tipped THEN
		SET l_isTipped = 0;
	ELSE
		SET l_isTipped = l_tipped - l_cnt;
	END IF;
	SELECT l_isTipped AS tip;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getPriorities` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getPriorities`()
BEGIN
SELECT priority_id, priority_title, priority_factor, priority_status 
FROM priorities;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getProfileData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getProfileData`(
IN in_user_id INT
)
BEGIN
DECLARE l_uid, l_cnt INT;
SELECT p.user_id, p.gender, p.dob, u.zipcode FROM profile p
LEFT JOIN users u
ON p.user_id = u.user_id
WHERE p.user_id = in_user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getStatuses` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getStatuses`()
BEGIN
SELECT id, status_id, status_name 
FROM statuses;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getUserData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getUserData`(IN in_user_id INT)
BEGIN
SELECT u.user_id AS user_id, u.fname AS fname, u.lname AS lname, u.phone AS phone, u.email AS email, 
u.cellular AS cellular, a.address AS address, a.city AS city, a.zipcode AS zipcode, a.state, a.country AS country, a.created AS created
FROM users u 
LEFT JOIN addresses a
ON u.address_id = a.address_id
WHERE user_id = in_user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getVendorData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getVendorData`(IN in_vendor_id INT)
BEGIN
SELECT v.vendor_id, v.username, v.name, v.contact_name, v.url, v.created, v.email, v.passwd, v.type, v.status_id, v.phone, v.cellular, a.address, a.city, a.state, a.zipcode, a.country
FROM vendors v
LEFT JOIN addresses a ON v.address_id = a.address_id 
WHERE v.vendor_id = in_vendor_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getVendorDeals` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getVendorDeals`(IN in_vendor_id INT)
BEGIN
	SELECT * FROM deals d 
	INNER JOIN deal_tracking dt
	ON d.deal_id = dt.deal_id
	WHERE dt.user_id = in_vendor_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_getVendors` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_getVendors`(IN in_category_id INT)
BEGIN
SELECT user_id, username, fname, lname, phone, email, cellular, address, city, zipcode, state, country, created
FROM vendors
WHERE category_id = in_category_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_insertBillingData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_insertBillingData`(
IN in_user_id INT,
IN in_email VARCHAR(120),
IN in_card_type VARCHAR(20),
IN in_card_number VARCHAR(95),
IN in_card_exp VARCHAR(10),
IN in_card_cvv VARCHAR(100),
IN in_card_name VARCHAR(120),
IN in_adddress_id INT,
IN in_status_id INT,
IN in_address VARCHAR(200),
IN in_city VARCHAR(120),
IN in_state VARCHAR(10),
IN in_zipcode VARCHAR(12)
)
BEGIN
DECLARE l_aid, l_address_id, l_uid, l_cnt INT;
SELECT COUNT(*) INTO l_cnt FROM users WHERE user_id = in_user_id;
IF l_cnt < 1 THEN
	INSERT INTO users (email, zipcode, status_id) VALUES (in_email, in_zipcode, 1);
	SET l_uid = LAST_INSERT_ID();
	INSERT INTO addresses (address, city, zipcode, state, country, address_type_id, status_id, created)
	VALUES (in_address, in_city, in_zipcode, in_state, 'US', 1, 1, NOW());
	SET l_address_id = LAST_INSERT_ID();
	REPLACE INTO billing (user_id, card_type, card_number, card_exp, card_cvv, card_name, address_id, status_id)
	VALUES (l_uid, in_card_type, in_card_number, in_card_exp, in_card_cvv, in_card_name, l_address_id, 1);
ELSE
	UPDATE users set email = in_email, zipcode = in_zipcode WHERE user_id = in_user_id;
	SELECT address_id INTO l_aid FROM users WHERE user_id = in_user_id;
	IF l_aid > 0 THEN
		UPDATE addresses SET address = in_address, city = in_city, state = in_state, country = 'US', zipcode = in_zipcode,
		created = NOW(), status_id = 1 WHERE address_id = l_aid;
		SET l_address_id = l_aid;
	ELSE
		INSERT INTO addresses (address, city, zipcode, state, country, address_type_id, status_id, created)
		VALUES (in_address, in_city, in_zipcode, in_state, 'US', 1, 1, NOW());
		SET l_address_id = LAST_INSERT_ID();
	END IF;
	REPLACE INTO billing (user_id, card_type, card_number, card_exp, card_cvv, card_name, address_id, status_id)
	VALUES (in_user_id, in_card_type, in_card_number, in_card_exp, in_card_cvv, in_card_name, l_address_id, 1);
END IF;
SELECT LAST_INSERT_ID() AS bid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_insertDeal` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_insertDeal`(
IN in_email VARCHAR(200), 
IN in_passwd VARCHAR(10),
IN in_deal_id INT,
IN in_price FLOAT, 
IN in_status INT,
IN in_trans_id VARCHAR(125),
IN in_trans_code INT,
IN in_trans_text VARCHAR(95)
)
BEGIN
DECLARE l_uid INT;
DECLARE l_c, l_cnt INT;
	SELECT user_id INTO l_uid FROM users WHERE email LIKE in_email;
	IF l_uid > 0 THEN
		SELECT COUNT(*) INTO l_c FROM deal_tracking WHERE deal_id = in_deal_id AND user_id = l_uid;
		IF l_c < 1 THEN
			REPLACE INTO deal_tracking (deal_id, date_bought, user_id, price, trans_id)
			VALUES (in_deal_id, NOW(), l_uid, in_price, in_trans_id);
		END IF;
		
		IF NOT ISNULL(in_passwd) THEN
			SELECT COUNT(*) INTO l_cnt FROM users_access WHERE user_id = l_uid;
			IF l_cnt > 0 THEN
				UPDATE users_access SET passwd = MD5(in_passwd), status = 1 WHERE user_id = l_uid;
			ELSE
				INSERT INTO users_access (user_id, passwd, user_type, status) VALUES (l_uid, MD5(in_passwd), 1, 1);
			END IF;
		END IF;
		INSERT INTO transactions (trans_id, deal_id, user_id, amount, date, status, trans_code, trans_text) VALUES (in_trans_id, in_deal_id, l_uid, in_price, NOW(), in_status, in_trans_code, in_trans_text);
	ELSE
		INSERT INTO users (email, user_type, status_id)
		VALUES (in_email, 1, 1);
		SELECT user_id INTO l_uid FROM users WHERE email like in_email; 
		INSERT INTO users_access (user_id, passwd, user_type, status) VALUES (l_uid, MD5(in_passwd), 1, 1);
		
		SELECT COUNT(*) INTO l_c FROM deal_tracking WHERE deal_id = in_deal_id AND user_id = l_uid;
		IF l_c < 1 THEN
			REPLACE INTO deal_tracking (deal_id, date_bought, user_id, price, trans_id)
			VALUES (in_deal_id, NOW(), l_uid, in_price, in_trans_id);
		END IF;
		IF NOT ISNULL(in_passwd) THEN
			UPDATE users_access SET passwd = MD5(in_passwd), status = 1 WHERE user_id = l_uid;
		END IF;
		INSERT INTO transactions (trans_id, deal_id, user_id, amount, date, status, trans_code, trans_text) VALUES (in_trans_id, in_deal_id, l_uid, in_price, NOW(), in_status, in_trans_code, in_trans_text);
	END IF;
	SELECT LAST_INSERT_ID() AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_insertDealAtts` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`%` PROCEDURE `sp_insertDealAtts`(
IN in_deal_id INT(11),
IN in_input TEXT,
IN in_delimiter VARCHAR(10) 
)
BEGIN
 
DECLARE cur_position INT DEFAULT 1;
DECLARE remainder TEXT;
DECLARE values_str VARCHAR(500);
DECLARE cur_string VARCHAR(1000);
DECLARE delimiter_length TINYINT UNSIGNED;
DECLARE request_id INT;
DECLARE att_id VARCHAR(100);
DECLARE pos INT DEFAULT 1;
DECLARE att_value VARCHAR(130);
SET remainder = in_input;
SET delimiter_length = CHAR_LENGTH(in_delimiter);
WHILE CHAR_LENGTH(remainder) > 0 AND cur_position > 0 DO
  SET cur_position = INSTR(remainder, in_delimiter);
  IF cur_position = 0 THEN
  	SET cur_string = remainder;
  ELSE
	SET cur_string = LEFT(remainder, cur_position - 1);
  END IF;
  IF TRIM(cur_string) != '' THEN 
	SET @req_id = in_request_id;
	SET @rem = cur_string;
	SET @att_id = SUBSTRING_INDEX(@rem, ',', 1);	
	SET @value = SUBSTRING_INDEX(@rem, ',', -1);
	SET @qry = 'INSERT INTO deal_details (deal_id, deal_att, deal_value) VALUES (?,?,?)';
        PREPARE stmt FROM @qry;
        EXECUTE stmt USING @req_id, @att_id, @value;
        DEALLOCATE PREPARE stmt;
  END IF;
  SET remainder = SUBSTRING(remainder, cur_position + delimiter_length);
END WHILE;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_login` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_login`(
IN in_email VARCHAR(80),
IN in_passwd VARCHAR(35)
)
BEGIN
DECLARE l_uid, uid INT;
SELECT user_id INTO l_uid FROM accountsView a WHERE (email = in_email AND a.passwd = md5(in_passwd)) AND a.status = 1;
IF l_uid > 0 THEN
	SET uid = l_uid;
ELSE
	SET uid = -1;
END IF;
IF ISNULL(uid) THEN
	SET uid = -1;
END IF;
SELECT uid as user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_loginVendor` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_loginVendor`(
IN in_email VARCHAR(80),
IN in_passwd VARCHAR(35)
)
BEGIN
DECLARE l_uid INT;
SELECT vendor_id INTO l_uid FROM vendors WHERE (email = in_email AND passwd = md5(in_passwd)) AND status_id = 1 LIMIT 1;
SELECT IFNULL(l_uid, -1) AS user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_postDeal` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_postDeal`(
IN in_dealname VARCHAR(120),
IN in_category_id INT,
IN in_start_date DATE,
IN in_start_time TIME,
IN in_end_date DATE,
IN in_end_time TIME,
IN in_price DECIMAL(9,4),
IN in_discount FLOAT(6,3),
IN in_status TINYINT,
IN in_description TEXT,
IN in_vendor_id INT,
IN in_tipped INT,
IN in_details TEXT,
IN in_dealcode VARCHAR(25),
IN in_deal_print TEXT,
IN in_deal_content TEXT,
IN in_deal_max TINYINT,
IN in_deal_priority TINYINT,
IN in_image VARCHAR(220)
)
BEGIN
DECLARE l_cnt, l_deal_id INT;
SELECT COUNT(*) INTO l_cnt FROM deals WHERE deal_name = in_dealname;
IF l_cnt = 0 THEN
	INSERT INTO deals(deal_category, deal_name, deal_start, deal_start_time, deal_end, deal_end_time, deal_price, deal_discount, deal_status, deal_description, vendor_id, deal_tipped, deal_details, deal_code, deal_fine_print, deal_content, deal_max, deal_priority, deal_image)
	VALUES
	(in_category_id, in_dealname, in_start_date, in_start_time, in_end_date, in_end_time, in_price, in_discount, in_status, in_description, in_vendor_id, in_tipped, in_details, in_dealcode, in_deal_print, in_deal_content, in_deal_max, in_deal_priority, in_image);
END IF;
SELECT LAST_INSERT_ID() INTO l_deal_id;
SELECT IFNULL(l_deal_id, -1) AS deal_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_registerPouch` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
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
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_registerShort` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_registerShort`(
IN in_fname VARCHAR(30), 
IN in_lname VARCHAR(30), 
IN in_email VARCHAR(120),
IN in_passwd VARCHAR(85)
)
BEGIN
DECLARE l_address_id, l_user_id, l_ua_id, l_uid INT;
START TRANSACTION;
SELECT user_id INTO l_uid FROM users WHERE email LIKE in_email;
IF l_uid > 0 THEN
	
	SET l_user_id = -2;
ELSE
	INSERT INTO users 
	(fname, lname, email)
	VALUES
	(in_fname, in_lname, in_email);
	SET l_user_id = LAST_INSERT_ID();
END IF;
IF ISNULL(l_user_id) THEN ROLLBACK;
END IF;
IF l_uid THEN 
	UPDATE users_access SET passwd = MD5(in_passwd), status = 1 WHERE user_id = l_user_id;
	SET l_ua_id = l_uid;
ELSE
	INSERT into users_access(user_id, passwd, status, user_type)
	VALUES (l_user_id, MD5(in_passwd), 1, 1);
	SET l_ua_id = LAST_INSERT_ID();
END IF;
IF ISNULL(l_ua_id) THEN ROLLBACK;
END IF;
COMMIT;
SELECT IFNULL(l_user_id, -1) AS user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_registerUser` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_registerUser`(
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
DECLARE l_address_id, l_user_id, l_ua_id, l_uid INT;
START TRANSACTION;
INSERT INTO addresses(address, city, zipcode, state, country, address_type_id, status_id, created)
VALUES (in_address, in_city, in_zipcode, in_state, in_country, in_address_type, 1, NOW());
SET l_address_id = LAST_INSERT_ID();
IF ISNULL(l_address_id) THEN ROLLBACK;
END IF;
SELECT user_id INTO l_uid FROM users WHERE email LIKE in_email;
IF l_uid > 0 THEN
	UPDATE users SET fname = in_fname, lname = in_lname, phone = in_phone, cellular = in_cell, address_id = l_address_id,
	zipcode = in_zipcode, user_type = 1, lng = in_lng, lat = in_lat WHERE user_id = l_uid;
	SET l_user_id = l_uid;
ELSE
	INSERT INTO users 
	(fname, lname, email, phone, cellular, address_id, zipcode, user_type, device_id, lng, lat, status_id)
	VALUES
	(in_fname, in_lname, in_email, in_phone, in_cell, l_address_id, in_zipcode, in_user_type, in_device_id, in_lng, in_lat, 0);
	SET l_user_id = LAST_INSERT_ID();
END IF;
IF ISNULL(l_user_id) THEN ROLLBACK;
END IF;
IF l_uid THEN 
	UPDATE users_access SET passwd = MD5(in_passwd), status = 1 WHERE user_id = l_user_id;
	SET l_ua_id = l_uid;
ELSE
	INSERT into users_access(user_id, passwd, status, user_type)
	VALUES (l_user_id, MD5(in_passwd), 0, 1);
	SET l_ua_id = LAST_INSERT_ID();
END IF;
IF ISNULL(l_ua_id) THEN ROLLBACK;
END IF;
COMMIT;
SELECT IFNULL(l_user_id, -1) AS user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_registerVendor` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_registerVendor`(
IN in_company VARCHAR(35),
IN in_category_id INT,
IN in_name VARCHAR(25), 
IN in_contact_name VARCHAR(30), 
IN in_url VARCHAR(130), 
IN in_email VARCHAR(90),
IN in_type INT, 
IN in_phone VARCHAR(25),
IN in_address VARCHAR(140),
IN in_city VARCHAR(40),
IN in_state VARCHAR(30),
IN in_country VARCHAR(30),
IN in_cell VARCHAR(20),
IN in_zipcode VARCHAR(10),
IN in_passwd VARCHAR(45)
)
BEGIN
DECLARE l_address_id, l_vendor_id, l_ua_id INT;
START TRANSACTION;
INSERT INTO addresses(address, city, zipcode, state, country, address_type_id, status_id, created)
VALUES (in_address, in_city, in_zipcode, in_state, in_country, 1, 1, NOW());
SET l_address_id = LAST_INSERT_ID();
IF ISNULL(l_address_id) THEN ROLLBACK;
END IF;
INSERT INTO vendors 
(username, category_id, name, contact_name, url, created, email, type, status_id, phone, cellular, address_id, passwd)
VALUES
(username, in_category_id, in_company, in_name, in_url, NOW(), in_email, 1, 0, in_phone, in_cell, l_address_id, MD5(in_passwd));
SET l_vendor_id = LAST_INSERT_ID();
IF ISNULL(l_vendor_id) THEN ROLLBACK;
END IF;
COMMIT;
SELECT IFNULL(l_vendor_id, -1) AS vendor_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_resetPassword` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_resetPassword`(
IN in_email VARCHAR(125),
IN in_passwd VARCHAR(100)
)
BEGIN
DECLARE l_uid INT;
DECLARE status INT(11);
SELECT user_id INTO l_uid FROM users WHERE email LIKE in_email;
IF l_uid > 0 THEN
	UPDATE users_access SET passwd = md5(in_passwd) WHERE user_id = l_uid;
	SELECT 1 AS status;
ELSE
	SELECT -1 AS status;
END IF;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_resetUserPassword` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_resetUserPassword`(
IN in_user_id INT(11),
IN in_email VARCHAR(85),
IN in_passwd VARCHAR(40)
)
BEGIN
DECLARE l_cnt INT;
DECLARE status INT(11);
SELECT COUNT(*) INTO l_cnt FROM accounts a WHERE a.email LIKE in_email;
IF l_cnt > 0 THEN
	UPDATE users_access SET ua_passwd = md5(in_passwd) WHERE user_id = in_user_id;
	SELECT 1 AS status;
ELSE
	SELECT -1 AS status;
END IF;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_setProfileData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_setProfileData`(
IN in_user_id INT,
IN in_gender VARCHAR(120),
IN in_dob VARCHAR(20),
IN in_zipcode VARCHAR(12)
)
BEGIN
DECLARE l_uid, l_cnt INT;
SELECT COUNT(*) INTO l_cnt FROM profile WHERE user_id = in_user_id;
IF l_cnt > 0 THEN
	UPDATE profile SET gender = in_gender, dob = in_dob WHERE user_id = in_user_id;
	UPDATE users SET zipcode = in_zipcode WHERE user_id = in_user_id;
	SET l_uid = in_user_id;
ELSE
	INSERT INTO profile (user_id, gender, dob) VALUES (in_user_id, in_gender, in_dob);
	SET l_uid = LAST_INSERT_ID(); 
END IF;
SELECT l_uid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_subscribe` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_subscribe`(IN in_email VARCHAR(120))
BEGIN
DECLARE l_user_id, l_uid, l_cnt, l_id INT;
	SELECT COUNT(*) INTO l_cnt FROM users WHERE email LIKE in_email;
	IF l_cnt < 1 THEN 
		INSERT INTO users (email, user_type, status_id)
		VALUES (in_email, 1, 1);
		SELECT user_id INTO l_uid FROM users WHERE email like in_email; 
		REPLACE INTO users_access (user_id, user_type, status, passwd) VALUES (l_uid, 1, 1, 'valcher');
		SELECT user_id INTO l_id FROM users WHERE email LIKE in_email;
	ELSE
		SELECT user_id INTO l_id FROM users WHERE email LIKE in_email;
	END IF;
	
	SELECT IFNULL(l_id, -1) AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_trackDeal` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_trackDeal`(
IN in_deal_id INT, 
IN in_user_id INT,
IN in_ref_url VARCHAR(300),
IN in_orig_user_id INT, 
IN in_credit INT,
IN in_status TINYINT(2)
)
BEGIN
DECLARE l_uid, l_cnt, l_rows INT;
	SELECT COUNT(1) INTO l_cnt 
	FROM deals d 
	WHERE d.deal_id = in_deal_id;
	IF l_cnt = 0 THEN
		SET l_uid = -1;
	ELSE 
		SELECT COUNT(1) INTO l_cnt FROM users WHERE user_id = in_user_id;
		IF l_cnt > 0 THEN
			SELECT COUNT(1) INTO l_rows FROM deal_sharing WHERE deal_id = in_deal_id AND user_id = in_user_id;
			IF l_rows < 1 THEN
				INSERT INTO deal_sharing (deal_id, user_id, ref_url, orig_user_id, share_date, status)
				VALUES (in_deal_id, in_user_id, in_ref_url, in_orig_user_id, NOW(), in_status);
				SET l_uid = LAST_INSERT_ID();
			END IF;
		END IF;
	END IF;
	
	SELECT l_uid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_updateBillingData` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_updateBillingData`(
IN in_user_id INT,
IN in_fname VARCHAR(100),
IN in_lname VARCHAR(100),
IN in_card_type VARCHAR(20),
IN in_card_number VARCHAR(50),
IN in_card_exp VARCHAR(12),
IN in_card_name VARCHAR(50),
IN in_card_cvv VARCHAR(50),
IN in_address VARCHAR(200),
IN in_city VARCHAR(20),
IN in_state VARCHAR(10),
IN in_zipcode VARCHAR(20),
IN in_passwd VARCHAR(50)
)
BEGIN
DECLARE l_aid INT;
DECLARE l_p VARCHAR(200);
UPDATE billing SET card_type = in_card_type, card_number = in_card_number, card_exp = in_card_exp, card_name = in_card_name, 
card_cvv = in_card_cvv WHERE user_id = in_user_id;
IF in_fname <> '' AND in_lname <> '' THEN
	UPDATE users SET lname = in_lname, fname = in_fname WHERE user_id = in_user_id;
END IF;
SELECT address_id INTO l_aid FROM users WHERE user_id = in_user_id;
UPDATE addresses SET address = in_address, city = in_city, state = in_state, zipcode = in_zipcode WHERE address_id = l_aid;
SELECT passwd INTO l_p FROM users_access WHERE user_id = in_user_id;
IF l_p != MD5(in_passwd) THEN
	UPDATE users_access SET passwd = MD5(in_passwd) WHERE user_id = in_user_id;
END IF;
SELECT in_user_id AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_updateCreditCard` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_updateCreditCard`(
IN in_bid INT,
IN in_card_type VARCHAR(20),
IN in_card_number VARCHAR(95),
IN in_card_exp VARCHAR(10),
IN in_card_cvv VARCHAR(100),
IN in_card_name VARCHAR(120),
IN in_status_id INT,
IN in_address VARCHAR(200),
IN in_city VARCHAR(120),
IN in_state VARCHAR(10),
IN in_zipcode VARCHAR(12)
)
BEGIN
DECLARE l_aid, l_address_id, l_uid, l_cnt INT;
SELECT address_id INTO l_aid FROM billing WHERE id = in_bid;
UPDATE addresses SET address = in_address, city = in_city, zipcode = in_zipcode, state = in_state
WHERE address_id = l_aid;
UPDATE billing SET card_type = in_card_type, card_number = in_card_number, card_exp = in_card_exp, card_cvv = in_card_cvv, card_name = in_card_name
WHERE id = in_bid;
SELECT in_bid AS bid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_updateUser` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_updateUser`(
IN in_user_id INT,
IN in_fname VARCHAR(25), 
IN in_lname VARCHAR(25),
IN in_email VARCHAR(90),
IN in_phone VARCHAR(25),
IN in_cell VARCHAR(20),
IN in_address VARCHAR(140),
IN in_city VARCHAR(40),
IN in_state VARCHAR(30),
IN in_country VARCHAR(30),
IN in_zipcode VARCHAR(10),
IN in_passwd VARCHAR(45)
)
BEGIN
DECLARE l_address_id, l_user_id, l_ua_id INT;
DECLARE l_pass VARCHAR(200);
START TRANSACTION;
SELECT address_id INTO l_address_id FROM users WHERE user_id = in_user_id;
 
UPDATE addresses SET address = in_address, city = in_city, zipcode = in_zipcode, state = in_state, country = in_country 
WHERE address_id = l_address_id;
UPDATE users SET fname = in_fname, lname = in_lname, email = in_email, phone = in_phone, cellular = in_cell
WHERE user_id = in_user_id;
SELECT passwd INTO l_pass FROM users_access WHERE user_id = in_user_id;
IF in_passwd != l_pass THEN
UPDATE users_access SET passwd = MD5(in_passwd) WHERE user_id = in_user_id;
END IF;
COMMIT;
SELECT IFNULL(in_user_id, -1) AS user_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_updateVendor` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_updateVendor`(
IN in_vendor_id INT,
IN in_company VARCHAR(35),
IN in_category_id INT,
IN in_name VARCHAR(25), 
IN in_contact_name VARCHAR(30), 
IN in_url VARCHAR(130), 
IN in_email VARCHAR(90),
IN in_type INT, 
IN in_phone VARCHAR(25),
IN in_address VARCHAR(140),
IN in_city VARCHAR(40),
IN in_state VARCHAR(30),
IN in_country VARCHAR(30),
IN in_cell VARCHAR(20),
IN in_zipcode VARCHAR(10),
IN in_passwd VARCHAR(45)
)
BEGIN
DECLARE l_address_id, l_vendor_id, l_ua_id INT;
DECLARE l_pass VARCHAR(200);
START TRANSACTION;
SELECT address_id INTO l_address_id FROM vendors WHERE vendor_id = in_vendor_id;
 
UPDATE addresses SET address = in_address, city = in_city, zipcode = in_zipcode, state = in_state, country = in_country 
WHERE address_id = l_address_id;
UPDATE vendors SET category_id = in_category_id, name = in_company, contact_name = in_name, url = in_url, email = in_email, phone = in_phone, cellular = in_cell
WHERE vendor_id = in_vendor_id;
SELECT passwd INTO l_pass FROM vendors WHERE vendor_id = in_vendor_id;
IF in_passwd != l_pass THEN
UPDATE vendors SET passwd = MD5(in_passwd) WHERE vendor_id = in_vendor_id;
END IF;
COMMIT;
SELECT IFNULL(in_vendor_id, -1) AS vendor_id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_updateZip` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_updateZip`(IN in_email VARCHAR(150), IN in_zip VARCHAR(13))
BEGIN
DECLARE l_cnt, l_id INT;
	SELECT COUNT(*) INTO l_cnt FROM users WHERE email LIKE in_email;
	IF l_cnt > 0 THEN 
		UPDATE users SET zipcode = in_zip WHERE email LIKE in_email;
	END IF;
	SELECT LAST_INSERT_ID() INTO l_id;
	SELECT IFNULL(l_id, -1) AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS `valcher`.`sp_updateZipByID` $$
/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`oren`@`localhost` PROCEDURE `sp_updateZipByID`(IN in_user_id INT, IN in_zip VARCHAR(13))
BEGIN
DECLARE l_cnt, l_id INT;
	SELECT COUNT(*) INTO l_cnt FROM users WHERE user_id = in_user_id;
	IF l_cnt > 0 THEN 
		UPDATE users SET zipcode = in_zip WHERE user_id = in_user_id;
		SET l_id = in_user_id;
	ELSE
		SET l_id = -1;
	END IF;
	
	SELECT l_id AS id;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

-- -----------------------------------------------------------------------------

DELIMITER ;