<?php
 require $_SERVER['DOCUMENT_ROOT'].'/world/model/db/ConnectDB.php';
 require $_SERVER['DOCUMENT_ROOT'].'/world/model/formatter/GenerateHTML.php';
 require $_SERVER['DOCUMENT_ROOT'].'/world/model/formatter/JSONFormat.php';
 require $_SERVER['DOCUMENT_ROOT'].'/world/controller/ProjectGlobals.php';

//This class is a container of methods which are called from view folders
class Control {
    
//The method returns table of the cities of the $country
static function findCitiesOf($country){
    $cities=new Cities(1);
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getCitiesOfTheCountry($country);
    $output=GenerateHTML::generateTable($result, 'cityClass',$cities);
    return $output;
}

//The method authorize the user
static function authorization($login,$password){
    $pages=array('?','view/home.php');
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $loc=$con->checkLogin($login, $password, $pages);
    if($loc==$pages[1]){
    header("Location: $loc");
    }
}

//Is not used yet
static function findCountriesByPop($lower){
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getCouyntriesByPop($lower);
    $output=GenerateHTML::generateTable($result, 'countriesByPop',null);
    return $output;
} 

//The method returns an associative array which include info about $country
static function CountryInfo($country){
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getCountryInfo($country);
    $output=GenerateHTML::generateCountryInfoHTML($result);
    return $output;
}

//The method returns table of the languages of the $country
static function LanguagesOf($country){
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getLanguages($country);
    $output=GenerateHTML::generateTable($result,'languageClass',null);
    return $output;
}

//The method returns JSON of the list of countries which begin with letter $letter. The length of the list is equal to $limit
static function AutoCompleteCountriesJSON($letter, $limit){
    if($letter!=""){
    $con=new ConnectDB(ProjectGlobals::$IPADDRESS, ProjectGlobals::$USER, ProjectGlobals::$PASSWORD, ProjectGlobals::$DATABASE);
    $result=$con->getCountriesWithLetter($letter, $limit);
    $output=JSONFormat::generateJSONArray($result);
    return $output;
    }
}
   

    
}








