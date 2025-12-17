<?php
class Database {

    public $dbh; // ← Сделал публичным, чтобы Comments мог его использовать

    public function __construct() {
        $host = "localhost";
        $dbname = "newsportal"; // сменить на своё имя БД
        $user = "root";
        $pass = "";

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {
            $this->dbh = new PDO($dsn, $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("DB connection error: " . $e->getMessage());
        }
    }

    public function getAll($query) {
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($query) {
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function executeRun($query) {
        $stmt = $this->dbh->prepare($query);
        return $stmt->execute();
    }
}
?>
