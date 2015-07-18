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
class generateHTML {
    private static $output;

    //The static function formate result as a table
    static function generateTable($result, $classname){
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
        $output.="</tr>"; 
        while($row = $result->fetch_assoc()) {
        $output.="<tr>";
        foreach ($columns as $val) {
        $output.="<td>".$row[$val->name]."</td>";
        }
        $output.="</tr>"; 
        }
        $output.="</table><br>"; 
    } else {
    return "0 results";
    }
    return $output;
    }
    
    
    
    
    
    
}
