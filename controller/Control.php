<?php
//this is just temprorary declaration
 require 'C:\xampp\htdocs\world\model\DB\ConnectDB.php';
 require 'C:\xampp\htdocs\world\model\formatter\GenerateHTML.php';
   
class Control {
  
    
 
static function findCitiesOf($country){
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getCitiesOfTheCountry($country);
    $output=GenerateHTML::generateTable($result, 'myclass');
    return $output;
} 
    
static function test($login,$password){
    $pages=array('?','view/home.php');
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $loc=$con->checkLogin($_POST["userName"], $_POST["password"], $pages);
    if($loc==$pages[1]){
    header("Location: $loc");
    }
}

static function findCountriesByPop($lower){
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getCouyntriesByPop($lower);
    $output=GenerateHTML::generateTable($result, 'myclass');
    return $output;
} 


   
    
}








