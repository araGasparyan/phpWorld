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
    private $con="";
    private $sql="";
    private $result;
    
    function getResult() {
        return $this->result;
    }

    function setResult($result) {
        $this->result = $result;
    }

    function getSql() {
        return $this->sql;
    }

    function setSql($sql) {
        $this->sql = $sql;
    }
 
    public function getCon(){
        return $this->con;
    }
    
    function setCon($con) {
        $this->con = $con;
    }

                
    function __construct($ip, $user, $password, $database) {
        $this->ip = $ip;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->con = new mysqli($ip, $user, $password, $database);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
               
    }
    
    
    function getCouyntriesByPop($lower){
        $this->sql="SELECT `country`.`Name`, `country`.`Population` FROM country WHERE `country`.`Population`>='".$lower."';";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }

    function getCitiesOfTheCountry($countryName){
        $this->sql="SELECT ID, `country`.`Name`, CountryCode, District, `country`.`Population`  FROM city,country WHERE city.CountryCode=country.Code AND `country`.`Name`='".$countryName."';";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
    function checkLogin($login,$password,$pages){
        $this->sql="SELECT * FROM users where login='".$login."' AND password='".$password."';";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        if ($this->result->num_rows > 0){
            return $pages[1];
        }
        else {
            return $pages[0];
        } 
    }
    
    /*
    
	JAVA PART

//$result = $conn->query($sql);
    */
    
    
    
    
    
}
