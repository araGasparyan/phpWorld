<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>My first PHP Hello World))</title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <header>
            <div class="hello">
                <h1>Hello world!!!</h1>
            </div>
            <div class="earth">
                <a href="home.php"><img width="100px" src="../pictures/earth.gif"></a>
            </div>
        </header>
        <section>
            <form method="get" action="cities.php">
                <input type="text" placeholder="Enter country name" name="country">
                <input type="submit" name="mySendButton1" value="submit">
            </form>
            
            <form method="get" action="populations.php">
                <input type="text" placeholder="Enter population lower bound" name="lower">
                <input type="submit" name="mySendButton2" value="submit">
            </form>
            
        </section>
        
        <?php
        
        ?>
    </body>
</html>
