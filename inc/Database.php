<?php

class database {
    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;

    function __construct() {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->baseName = 'newsportal';
        $this->connect();
    }
    function __destruct() {
        $this->disconnect();
    }
    
}