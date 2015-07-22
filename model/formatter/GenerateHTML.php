<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generateHTML
 *
 * @author Ara
 */
require $_SERVER['DOCUMENT_ROOT'].'\world\model\validation\FindCSSClass.php';
require $_SERVER['DOCUMENT_ROOT'].'\world\model\formatter\Cities.php';
class generateHTML {
    private static $output;

    //The static function formate result as a table
    static function generateTable($result, $classname, $obj){
    $output="";    
    if ($result->num_rows > 0) {
        $output.="<table class=".$classname.">";
        $columns=$result->fetch_fields();
        $output.="<tr>";
        foreach ($columns as $val) {
        $output.="<td>".$val->name."</td>";
        //The comment can be open in order to obtain more info about every column
        /*
        $columnCount=count($columns);
        printf($val->table);
        printf("max. Len: %d\n", $val->max_length);
        printf($val->flags);
        printf($val->type);
        */
        }
        if($obj!=null){
        $output.=$obj->addHeaderTd($obj->getTdCount());
        }
        $output.="</tr>";
        while($row = $result->fetch_assoc()) {
        $output.="<tr>";
        foreach ($columns as $val) {
        $output.="<td>".$row[$val->name]."</td>";
        }
        if($obj!=null){
        $obj->setRow($row);
        $output.=$obj->addTd($obj->getTdCount());
        }
        $output.="</tr>"; 
        }
        $output.="</table><br>"; 
    } else {
    return "0 results";
    }
    return $output;
    }
    
    
    static function generateCountryInfoHTML($result, $classnames){
    //$output=array();
    //$theContinentClass=new FindCSSClass();
    $pictureNames=array(
        'Africa'=>'Africa.png',
        'Antarctica'=>'Antarctica.png',
        'Asia'=>'Asia.png',
        'Europe'=>'Europe.jpg',
        'North America'=>'North_America.png',
        'Oceania'=>'Oceania.png',
        'South America'=>'South_America'
    );
    if ($result->num_rows > 0) {
        $columns=$result->fetch_fields();
        //This part should ve replaced in Saqo's html
        while($row = $result->fetch_assoc()) {
            foreach ($columns as $val) {
                $output[$val->name]=$row[$val->name];
                $output['continentPicture']=$pictureNames[$row['Continent']];
            }
        }
    } else {
    return "0 results";
    }
    return $output;
    }
    
    
    
    
    
}
