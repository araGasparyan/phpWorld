<?php

//The objects of the class are used for connecting to the mysql database, and for queris
class ConnectDB {
    //The following variables incapsulates connection parametrs to a database
    private $ip=""; 
    private $user="";
    private $password="";
    private $database="";
    private $con="";
    //The variables incapsulates queris and results of the database
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
        mysqli_query($this->con,"SET NAMES 'utf8'");
        mysqli_query($this->con,"SET CHARACTER SET utf8");
        mysqli_query($this->con,"SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
               
    }
    
    //The method returns mysql query-result of the countries which have greather population than $lower
    function getCouyntriesByPop($lower){
        $this->sql="SELECT `country`.`Name`, `country`.`Population` FROM country WHERE `country`.`Population`>='".$lower."';";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
     //The method returns mysql query-result of the languages of the $country
    function getLanguages($country){
        $this->sql="Select `Language`, `IsOfficial`, `Percentage` FROM countrylanguage, country WHERE countrylanguage.CountryCode=country.Code AND `country`.`Name`='".$country."' order by `Percentage` DESC;";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }

    //The method returns mysql query-result of the cities of the $country
    function getCitiesOfTheCountry($country){
        $this->sql="SELECT `city`.`Name`, District, `city`.`Population`  FROM city,country WHERE city.CountryCode=country.Code AND `country`.`Name`='".$country."' order by `city`.`Name`;";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
    //The method checks login and password of the user
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
    
    //The method returns mysql query-result of the attributes of the $country
    function getCountryInfo($countryName){
        $this->sql="SELECT `Continent`, `Region`, `SurfaceArea`, `IndepYear`, `country`.`Population`, `LifeExpectancy`, `LocalName`, `GovernmentForm`, `HeadOfState`, city.`Name` AS capital"
                   . "  FROM `world`.`country`, world.`city` "
                   . " WHERE city.`CountryCode`=`country`.`Code` AND city.`ID` = `country`.`Capital` AND `country`.`Name` = '".$countryName."';";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
    //The method returns json - which is an object of first (by alphavite) $limit countries which begin with letter $letter 
    function getCountriesWithLetter($letter, $limit){
        $this->sql="SELECT `country`.`Name` FROM country WHERE `country`.`Name` LIKE('".$letter."%') ORDER BY `country`.`Name` LIMIT ".$limit.";";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
    //The method returns json - which is an object of first (by alphavite) $limit regions which begin with letter $letter 
    function getRegionsWithLetter($letter, $limit){
        $this->sql="SELECT `country`.`Region` FROM country WHERE `country`.`Region` LIKE('".$letter."%') GROUP BY `country`.`Region` ORDER BY `country`.`Region` LIMIT ".$limit.";";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
    //The method returns json - which is an object of first (by alphavite) $limit goverment forms which begin with letter $letter 
    function getGovFormsWithLetter($letter, $limit){
        $this->sql="SELECT `country`.`GovernmentForm` FROM country WHERE `country`.`GovernmentForm` LIKE('".$letter."%') GROUP BY `country`.`GovernmentForm` ORDER BY `country`.`GovernmentForm` LIMIT ".$limit.";";
        $this->result=$this->con->query($this->sql);
        $this->con->close();
        return $this->result;
    }
    
  
}
