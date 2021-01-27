<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function registro($name, $lastname, $email, $password){
        $sql = "INSERT INTO users (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)";

        $query = $this->db->prepare($sql);
        $parameters = array(
            ':email' => $email, 
            ':first_name' => $name, 
            ':last_name' => $lastname, 
            ':password' => sha1($password)
        );

        return $query->execute($parameters);
    }

    public function login($email, $password){
        $sql = "SELECT email, first_name FROM users WHERE email = :email AND password = :password";
        
        $query = $this->db->prepare($sql);
        $parameters = array(
            ":email" => $email,
            ":password" => sha1($password)
        );
        $query->execute($parameters);

        return $query->fetchAll();
    }
}
