<?php

namespace App\Classes;

class Db{

    private $_host = "localhost";
    private $_username = "root";
    private $_password = "password";
    private $_db = "test";

    protected $connection;

    public function __construct(){
        if (!isset($this->connection)) {
            $this->connection = new \MySQLi($this->_host, $this->_username, $this->_password, $this->_db);
        }

        return $this->connection;
    }
}