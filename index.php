<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>Calm breeze login screen</title>
    <link rel="stylesheet" href="css/LoginFormstyle.css">
    </head>
    <body>
        <?php
        if(!(empty($_POST['userName'])||empty($_POST['password']))){
        require 'C:\xampp\htdocs\world\controller\Control.php';
        Control::test($_POST["userName"], $_POST["password"]);
        }
          ?>
    <div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
                <form class="form" method="post" action="?">
                    <input type="text" placeholder="Name" name="userName">
                    <input type="password" placeholder="password" name="password">
                    <button type="submit" id="login-button">Login</button>
		</form>
	</div>
    </div>
        <?php
          
        ?>
      
    </body>
</html>
