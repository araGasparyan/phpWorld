<?php
//this is just temprorary declaration
 require $_SERVER['DOCUMENT_ROOT'].'\world\model\DB\ConnectDB.php';
 require $_SERVER['DOCUMENT_ROOT'].'\world\model\formatter\GenerateHTML.php';
 
//This class contols 
class Control {
static function findCitiesOf($country){
    $cities=new Cities(1);
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getCitiesOfTheCountry($country);
    $output=GenerateHTML::generateTable($result, 'cityClass',$cities);
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
    $output=GenerateHTML::generateTable($result, 'countriesByPop',null);
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

static function LanguagesOf($country){
    $con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');
    $result=$con->getLanguages($country);
     //$output=GenerateHTML::generateTable($result, 'CountriesByPop');
    $output=GenerateHTML::generateTable($result, 'languageClass',null);
    return $output;
}
   
    
}








