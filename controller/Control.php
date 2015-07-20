<?php
//this is just temprorary declaration
 require 'C:\xampp\htdocs\world\model\DB\ConnectDB.php';
 require 'C:\xampp\htdocs\world\model\formatter\GenerateHTML.php';
   
class Control {
  
    
 
static function findCitiesOf($country){
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getCitiesOfTheCountry($country);
    $output=GenerateHTML::generateTable($result, 'cityClass',1);
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
    $output=GenerateHTML::generateTable($result, 'countriesByPop',0);
    return $output;
} 

static function CountryInfo($country){
    $classes=array(
        'Continent'=>'continent',
        'Region'=>'region',
        'SurfaceArea'=>'surfaceArea',
        'IndepYear'=>'indepYear',
        'capital'=>'capital',
        'HeadOfState'=>'headOfState',
        'GovernmentForm'=>'governmentForm',
        'LocalName'=>'localName',
        'LifeExpectancy'=>'lifeExpectancy',
        'Population'=>'population'
              );
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getCountryInfo($country);
     //$output=GenerateHTML::generateTable($result, 'CountriesByPop');
    $output=GenerateHTML::generateCountryInfoHTML($result,$classes);
    return $output;
}
   
    
}








