<?php
//this is just temprorary declaration
 require $_SERVER['DOCUMENT_ROOT'].'/world/model/db/ConnectDB.php';
 require $_SERVER['DOCUMENT_ROOT'].'/world/model/formatter/GenerateHTML.php';
 require $_SERVER['DOCUMENT_ROOT'].'/world/controller/ProjectGlobals.php';

 
//This class contols 
class Control {
static function findCitiesOf($country){
    $cities=new Cities(1);
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getCitiesOfTheCountry($country);
    //echo '<>'
    $output=GenerateHTML::generateTable($result, 'cityClass',$cities);
    return $output;
}
    
static function test($login,$password){
    $pages=array('?','view/home.php');
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $loc=$con->checkLogin($_POST["userName"], $_POST["password"], $pages);
    if($loc==$pages[1]){
    header("Location: $loc");
    }
}

static function findCountriesByPop($lower){
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
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
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getCountryInfo($country);
     //$output=GenerateHTML::generateTable($result, 'CountriesByPop');
    $output=GenerateHTML::generateCountryInfoHTML($result,$classes);
    return $output;
}

static function LanguagesOf($country){
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getLanguages($country);
     //$output=GenerateHTML::generateTable($result, 'CountriesByPop');
    $output=GenerateHTML::generateTable($result, 'languageClass',null);
    return $output;
}
   
    
}








