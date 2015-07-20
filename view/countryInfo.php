<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />
        <title>Welcome to <?php echo $_GET['country'] ?></title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <header>
            <div class="hello">
                <h1><?php echo $_GET['country'] ?></h1>
            </div>
            <div class="earth">
                <a href="home.php"><img width="100px" src="../pictures/earth.gif"></a>
            </div>
        </header>
        <?php
        require 'C:\xampp\htdocs\world\controller\Control.php';
        echo Control::CountryInfo($_GET['country']);
        echo Control::findCitiesOf($_GET['country']);
   
        ?>
    </body>
</html>
