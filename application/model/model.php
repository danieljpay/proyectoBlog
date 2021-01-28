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
        $sql = "INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)";

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
        $sql = "SELECT email, first_name FROM user WHERE email = :email AND password = :password";
        
        $query = $this->db->prepare($sql);
        $parameters = array(
            ":email" => $email,
            ":password" => sha1($password)
        );
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getUsuario($email){
        $sql = "SELECT email FROM user WHERE email = :email";
        
        $query = $this->db->prepare($sql);
        $parameters = array(
            ":email" => $email,
        );
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getCollectionEntries($collection, $filter = '{}'){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_CMS.'/api/collections/get/'.$collection,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $filter,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 43a0dc3c3900d5677bab77e58e05ed',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        $json = json_decode($response);
        return $json;
    }
}
