<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My first PHP Hello World))</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <header>
            <h1>Hello world!!!</h1>
            <a><img width="100px" style="float: right" src="pictures/earth.gif"></a>
        </header>
        <section>
            <form>
                <input type="submit" name="mySendButton" value="submit">
            </form>
            
        </section>
        
        <?php
        require 'C:\xampp\htdocs\world\controller\Control.php';
        echo Control::test();
        ?>
    </body>
</html>
