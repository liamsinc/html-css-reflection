<?php

// echo phpinfo();

// class DatabaseModel
// {
//     protected $server;
//     protected $database;
//     protected $username;
//     protected $password;

//     public function __construct($host, $db, $user, $pw = "") {
//         $this->server = $host;
//         $this->database = $db;
//         $this->username = $user;
//         $this->password = $pw;
//     }

//     public function connect() {
//         try {
//             $connection = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
//             $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             echo "Connection succeeded";
//         } catch (PDOException $e) {
//             echo "Connection failed: " . $e->getMessage();
//         }
//     }

// }

// $db = new DatabaseModel('localhost', 'netmatters', 'root');

// $db->connect();


$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    echo "Hello\n";
    $conn = new PDO("mysql:host=$servername;dbname=netmatters", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



?>