<?php
class DatabaseModel
{
    protected $server;
    protected $database;
    protected $username;
    protected $password;

    public function __construct($host, $db, $user, $pw = "") {
        $this->server = $host;
        $this->database = $db;
        $this->username = $user;
        $this->password = $pw;
    }

    public function connect() {
        try {
            $connection = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection succeeded";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}

$db = new DatabaseModel('localhost/127.0.0.1', 'netmatters', 'root');

$db->connect();


?>