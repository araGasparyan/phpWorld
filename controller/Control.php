<?php
//this is just temprorary declaration
 require 'C:\xampp\htdocs\world\model\DB\ConnectDB.php';
   
class Control {
  
    
 
   function test(){
       
   } 
    
    
}


$con=new ConnectDB('109.75.36.10', 'user1', 'ca8e4957a6', 'world');


$result=$con->getCitiesOfTheCountry('Armenia');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"]. " Name: " . $row["Name"]. " CountryCode " . $row["CountryCode"]. " District " . $row["District"]. " Population " . $row["Population"]. "<br>";                                                  
    }
} else {
    echo "0 results";
}

