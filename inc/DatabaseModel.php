<?php

class DatabaseModel
{
    protected $server;
    protected $database;
    protected $username;
    protected $password;
    protected $connection;

    public function __construct($host, $db, $user, $pw = "") 
    {
        $this->server = $host;
        $this->database = $db;
        $this->username = $user;
        $this->password = $pw;
        $this->connect();
    }

    public function connect() 
    {
        try {
            $this->connection = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function select($sql)
    {
        try {
            $query = $this->connection->prepare($sql);
            $query->execute();
            $results = $query->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}



// require 'inc/DatabaseModel.php';

// $db = new DatabaseModel('localhost', 'netmatters', 'root');

// $data = $db->select("SELECT * FROM test");

// echo $data[0][0];

            

            

            
            

?>

