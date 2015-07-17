<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectDB
 *
 * @author Ara
 */
class ConnectDB {
   
    private $ip=""; 
    private $user="";
    private $password="";
    private $database="";
    private $con;
    
    function __construct($ip, $user, $password, $database) {
        $this->ip = $ip;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->con = new mysqli($ip, $user, $password);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
    
    

    
    
    
    
    
    
}
