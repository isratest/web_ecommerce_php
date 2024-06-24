<?php

namespace Database;

class Connection {

    //Create a private static var to make singleton design.
    private static $instance;
    // here we have a connection with global class pdo with dates of our db.
    private $connection;

    //make a construct.
    private function __construct() {
        $this->make_connection();
    }


    // Make a public static function tu use get instance one time if not its init.
    public static function getInstance() {
        if (!self::$instance instanceof self){
            //here make a call self class (Connection)
            self::$instance = new self();
        }
    }
    // getter of private var connection.
    public function get_database_instance(){
        return $this->connection;
    }

    // Generate conection whit database with all dates.
    private function make_connection(){
        // Auth database 

        $server = "localhost";
        $database = ""; // make a db to fill this.
        $username = "root";
        $password = "";
        
        // Use dates with global class PDO to make any connection to any SQL.
        // this slash its to use GLOBAL class PDO and not make a error.
        $connect = new \PDO("mysql:host=$server;dbname=$database", $username, $password);
        $set_names = $connect->prepare("SET NAMES 'utf8'");
        $set_names->execute();

        // Here save to var of class $connection this connection with class PDO.
        $this->connection = $connect;


    }

    
}