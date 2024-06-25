<?php

namespace App\Controllers;

use Database\Connection;

class UsersController {

    private $connection;

    public function __construct() {
        $this->connection = Connection::getInstance()->get_database_instance();
    }


    /**
     * Muestra una lista de este recurso
     */
    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();
        $results = $stmt->fetchAll();

        require("../resources/views/dashboard.php");

    }

    /**
     * Muestra un formulario para crear un nuevo recurso
     */
    public function create(){
        require("../resources/views/signup.php");
    }

    /**
     * Guarda un nuevo recurso en la db directamente
     */
    public function store($data){
        if (empty($data)) {
            try {
                $stmt = $this->connection->prepare("INSERT INTO users (name, lastname, birth, address, phone, email, password, creation) 
                VALUES(:name, :lastname, :birth, :address, :phone, :email, :password, :creation)");
                $stmt->bindValue(":name", $data["name"]);//1
                $stmt->bindValue(":lastname", $data["lastname"]);//2
                $stmt->bindValue(":birth", $data["birth"]);//3
                $stmt->bindValue(":address", $data["address"]);//4
                $stmt->bindValue(":phone", $data["phone"]);//5
                $stmt->bindValue(":email", $data["email"]);//6
                $stmt->bindValue(":password", $data["password"]);//7
                $stmt->bindValue(":creation", $data["creation"]);//8
                $stmt->execute();
                header("location: dashboard");
            } catch (\Throwable $th) {
                echo "This mail has been used.";
            }
        } else {
            echo "Please fill all spaces";
        }






    }

    /**
     * Muestra un unico recurso especificado
     */
    public function show($data){

        if ($data["email"] === ""){
            echo "please type email and password please.";
        }else{
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email=:email");
            $stmt->execute([":email" => $data["email"]]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($data["password"] === $result["password"]){
                session_start();
                $success = "Your are login 😎";
                                
                $_SESSION["name"] = $result["name"];
                $_SESSION["lastname"] = $result["lastname"];
                $_SESSION["email"] = $result["email"];
                $_SESSION["phone"] = $result["phone"];
                $_SESSION["address"] = $result["address"];
                $_SESSION["birth"] = $result["birth"];
                $_SESSION["creation"] = $result["creation"];
                            
                echo $success;
            } elseif ($data["password"] !== $result["password"]){
                echo "invalid password.";
            }
        }
    }

    /**
     * Muestra el formulario para editar un recurso
     */
    public function edit(){}

    /**
     * Actualiza un recurso especifico en la db.
     */
    public function update(){}

    /**
     * Elimina un recurso especifico de la db.
     */
    public function destroy(){
    }  
}