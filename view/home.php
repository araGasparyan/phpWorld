<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />
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
            
            <form method="get" action="populations.php">
                <input type="text" placeholder="Enter population lower bound" name="lower">
                <input type="submit" name="mySendButton2" value="submit">
            </form>
            
            <form method="get" action="countryInfo.php">
                <input type="text" placeholder="Enter country name" name="country">
                <input type="submit" name="mySendButton3" value="submit">
            </form>
        </section>
         
        <div id="clock">
            <img src="../pictures/clock.jpg">
            <canvas id="myCanvas2" width="212" height="212"></canvas>
            <canvas id="myCanvas3" width="212" height="212"></canvas>
            <canvas id="myCanvas4" width="212" height="212"></canvas>
        </div>
        <script src="../js/newjavascript.js"></script>
        
        <?php
        
        ?>
    </body>
</html>
