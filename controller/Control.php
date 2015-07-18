<?php
//this is just temprorary declaration
 require 'C:\xampp\htdocs\world\model\DB\ConnectDB.php';
 require 'C:\xampp\htdocs\world\model\formatter\GenerateHTML.php';
   
class Control {
  
    
 
static function test(){
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getCitiesOfTheCountry('Zimbabwe');
    $output=GenerateHTML::generateTable($result, 'myclass');
    return $output;
   } 
    
    
}








