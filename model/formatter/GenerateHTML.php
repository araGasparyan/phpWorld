<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/world/model/validation/FindCSSClass.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/world/model/formatter/Cities.php';

//The class is a container of methods which generate data (as html, arrays, ascarrays...) for the view pages 
class generateHTML {
    //The variable incapsulates output, which should be returned when methods of this method container are called 
    private static $output;

    //The static method formats result as a table by taking field names of query-result as the first row and so on.
    //The method returns a table if qyery is not empty, othervise it returns string '0 results' 
    //The method obtains 3 arguments, the first is result (ex. mysql query-result), which should be formatted.
    //The second one, is the class, which the table generated by the method should have.
    //The third argument of the method is used when an additional coloumn is needed fot the output-table. If $obj is null nothing happens,
    //othervise, by using interface AdditionalTd in the current folder (by using an object which has interface AdditionalTd) it is possible
    //to generate coloumns for the table (polymorphism)
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
    
    //The method returns an associative array from $result (ex mysql query-result).
    //The associative array is a representation of data in $result, which contains info about a country. 
    static function generateCountryInfoHTML($result){
    //$output=array();
    //$theContinentClass=new FindCSSClass();
    $pictureNames=array(
        'Africa'=>'Africa.png',
        'Antarctica'=>'Antarctica.png',
        'Asia'=>'Asia.png',
        'Europe'=>'Europe.jpg',
        'North America'=>'North_America.png',
        'Oceania'=>'Oceania.png',
        'South America'=>'South_America.png'
    );
    if ($result->num_rows > 0) {
        $columns=$result->fetch_fields();
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
    
    //The method returns <li></li> which have text taken from $result (ex mysql query-result).
    static function generateList($result){
    $output="";    
    if ($result->num_rows > 0) {
        $columns=$result->fetch_fields();
        while($row = $result->fetch_assoc()) {
        $output.="<li>";
        foreach ($columns as $val) {
        $output.="<a href='countryInfo.php?country=".$row[$val->name]."'>".$row[$val->name]."</a>";
        }
        $output.="</li>";
        }
    } else {
    return "0 results";
    }
    return $output;
    }
    
    
    
    
    
}
