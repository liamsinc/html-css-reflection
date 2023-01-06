<?php

class DatabaseModel
{
    protected $server;
    protected $database;
    protected $username;
    protected $password;
    protected $connection;
    private const INSERT_SQL = "INSERT INTO enquiries (name, company, email, phone, subject, message, marketing) VALUES (?, ?, ?, ?, ?, ?, ?);";

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

    function insert($values) 
    {
        try {
            $query = $this->connection->prepare($this::INSERT_SQL);
            $query->bindParam(1, $values[0], PDO::PARAM_STR);
            $query->bindParam(2, $values[1], PDO::PARAM_STR);
            $query->bindParam(3, $values[2], PDO::PARAM_STR);
            $query->bindParam(4, $values[3], PDO::PARAM_STR);
            $query->bindParam(5, $values[4], PDO::PARAM_STR);
            $query->bindParam(6, $values[5], PDO::PARAM_STR);
            $query->bindParam(7, $values[6], PDO::PARAM_STR);
            $query->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
?>

