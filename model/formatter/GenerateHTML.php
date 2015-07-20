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
require 'C:\xampp\htdocs\world\model\validation\FindCSSClass.php';

class generateHTML {
    private static $output;

    //The static function formate result as a table
    static function generateTable($result, $classname, $additionalTd){
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
        if($additionalTd!=0){
            for($i=0;$i<$additionalTd;$i++){
                $output.="<td>".'Icon'."</td>";
            }
        }
        $output.="</tr>"; 
        while($row = $result->fetch_assoc()) {
        $output.="<tr>";
        foreach ($columns as $val) {
        $output.="<td>".$row[$val->name]."</td>";
        }
        if($additionalTd!=0){
            for($i=0;$i<$additionalTd;$i++){
                if($row['Population']<=100000)
                $output.="<td class=town></td>";
                else if(100000<$row['Population']&&$row['Population']<=1000000){
                    $output.="<td class=city></td>";
                }else{
                   $output.="<td class=bigCity></td>";
                }
                
            }
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
    $output="";
    $theContinentClass=new FindCSSClass();
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
        $output.="<div class=countryInfo>";
        while($row = $result->fetch_assoc()) {
            foreach ($columns as $val) {
                if($val->name=='Continent'){
                    $output.="<div class=".$classnames[$val->name].">";
                    //<img src="smiley.gif" alt="Smiley face" height="42" width="42"> 
                    $output.="<img src='../pictures/continents/".$pictureNames[$row[$val->name]]."' >";
                    //$output.='sdadasd';
                }else{
                    $output.="<div class=".$classnames[$val->name].">";
                }
            $output.=$row[$val->name];
            $output.="</div>"; 
            }
        }
        $output.="</div>";
    } else {
    return "0 results";
    }
    return $output;
    }
    
    
    
    
    
}
