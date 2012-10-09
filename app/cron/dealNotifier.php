<?
/**
 * Deal Notifier cron job
 * @author Oren Shepes - 11/2010
 */

define('DB_USER', 'isharedeal');
define('DB', 'valcher');
define('DB_PASSWD', '1sh@r3d3@l');
define('DB_HOST', 'localhost');

// connect to db
$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);
mysql_select_db(DB) || die('could not select DB');

// sql
$query = 'SELECT * FROM deal_tracking';

while ($row = mysql_fetch_assoc($link)) {
	echo $row['deal_id'] . ":" . $row['user_id'];
}
;