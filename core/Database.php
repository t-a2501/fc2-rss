<?php

namespace Core;

require_once "../config/Config.php";

class Database {

    private $username = null, $password = null, $dsn = null;

    public $database;

    public $errors;

    private static $dbInstance = null;

    private function __construct(){        

        $this->username = DB_USER;
        $this->password = DB_PASSWD;
        $this->dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        array ( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION );

        try{
            $this->database = new \PDO($this->dsn, $this->username, $this->password);
            $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch( \PDOException $ex ) {
            $this->errors = $ex;
            echo "Exception: " . $ex;
        }
    }

    public static function connect(){
        if(!isset(self::$dbInstance)) {
            self::$dbInstance = new self();
        }

        return self::$dbInstance;
    }

    public function getConnection()
    {
        if (is_null($this->database)) {
            $this->connect();
        }
        return $this->database;
    }

    private function __clone() {} // prevent cloning

    private function __wakeup(){} // prevent unserialization
}