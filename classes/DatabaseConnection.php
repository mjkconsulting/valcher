<?php
$path = str_replace('htdocs','',$_SERVER['DOCUMENT_ROOT']);
require ("$path/local/db_conn.inc");

/**
 * Database connection object
 * @author Oren Shepes - 1/10
 * @package mobilegates
 */

class DatabaseConnection {
	public $dbc;
	private static $instance;
	private static $dsn;
	private static $batch=false;
	private function DatabaseConnection() {
		self::$dsn = array(
		'phptype'  => 'mysqli',
		'username' => DBUNAME,
		'password' => DBPWORD,
		'hostspec' => DBHOST,
		'port'     => DBPORT,
		'database' => DBNAME
		);

		$this->dbc = & MDB2::factory(self::$dsn,
		array('result_buffering' => true)
		);
		if (Pear::isError($this->dbc)) {
			throw new DatabaseException($this->dbc->getMessage());
		}
	}

	static public function setBatch() {
		self::$batch = true;
	}

	static public function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new DatabaseConnection();
		}
		return self::$instance;
	}

	function prepare($query, $parms) {
		$sth = $this->dbc->prepare($query, $parms);
		if (PEAR::isError($sth)) {
			throw new DatabaseException($sth->getMessage() .
			"\n" .
			$query
			);
		}
		return $sth;
	}

	function query($query) {
		$res = $this->dbc->query($query);
		if (PEAR::isError($res)) {
			throw new DatabaseException($res->getMessage() .
			"\n" . $query);
		}
		return $res;
	}
}