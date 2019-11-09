<?php
/**
 * PDO driver for php
 * Much Secure
 */

class db
{
    public function connect(){
        try {
            $dsn="mysql:host=".getenv('DB_HOST').";dbname=".getenv('DB_NAME').";charset=utf8";
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            $dbconnection = new PDO($dsn, getenv('DB_USERNAME'),getenv('DB_PASSWORD'), $options);
            $GLOBALS['db'] = $dbconnection;
            return $dbconnection;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

}