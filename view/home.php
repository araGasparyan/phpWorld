<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();

  if(empty($_SESSION['userName'])){
      header("Location: ../index.php");
      echo $_SERVER['userName'];
  }
?>
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
            <p class="geoText">
                Geography (from Greek γεωγραφία, geographia) is a field of science dedicated to the study of the lands, the features, the inhabitants, and the phenomena of Earth.
                A literal translation would be "to describe or picture or write about the earth".
                The first person to use the word "geography" was Eratosthenes (276–194 BC).
                Four historical traditions in geographical research are spatial analysis of the natural and the human phenomena (geography as the study of distribution),
                area studies (places and regions), study of the human-land relationship, and research in the Earth sciences.
                Nonetheless, modern geography is an all-encompassing discipline that foremost seeks to understand the Earth and all of its human and natural complexities—not merely where objects are, but how they have changed and come to be.
                Geography has been called "the world discipline" and "the bridge between the human and the physical science". 
                Geography is divided into two main branches: human geography and physical geography.
            </p>
            <p class="geoText">
                 Traditionally, geographers have been viewed the same way as cartographers and people who study place names and numbers.
                Although many geographers are trained in toponymy and cartology, this is not their main preoccupation.
                Geographers study the spatial and the temporal distribution of phenomena, processes, and features as well as the interaction of humans and their environment.
                Because space and place affect a variety of topics, such as economics, health, climate, plants and animals; geography is highly interdisciplinary.
                The interdisciplinary nature of the geographical approach depends on an attentiveness to the relationship between physical and human phenomena and its spatial patterns.
                ...mere names of places...are not geography...know by heart a whole gazetteer full of them would not, in itself, constitute anyone a geographer. Geography has higher aims than this:
                it seeks to classify phenomena (alike of the natural and of the political world, in so far as it treats of the latter), to compare, to generalize, to ascend from effects to causes, and, in doing so, to trace out the laws of nature and to mark their influences upon man.
                This is 'a description of the world'—that is Geography. In a word Geography is a Science—a thing not of mere names but of argument and reason,
                of cause and effect.
            </p>
            
            
            <form class="countryInfoField" method="get" action="countryInfo.php">
                <div class="">
                    <input type="text" id="searchField" autocomplete="off" placeholder="Enter country name" name="country" oninput="getNamesAJAX1()">               
                    <input type="submit" value="submit">
                </div>
                <ul id="names">
                </ul>
            </form>
            
            <div id="qwe">
               
            </div>
            
            <?php
        
            ?>
           
        </section>
         <br>
         <br>
         <br>
         <br>
        <div id="clock">
            <img src="../pictures/clock.jpg">
            <canvas id="myCanvas2" width="212" height="212"></canvas>
            <canvas id="myCanvas3" width="212" height="212"></canvas>
            <canvas id="myCanvas4" width="212" height="212"></canvas>
        </div>
        <script src="../js/jquery-1.11.2.min.js"></script>
        <script src="../js/newjavascript.js"></script>
        <script>

        $(document).ready(function(){
       
        });


        var liSelected;
        function choose(arg){
        $("#searchField").val(arg.innerHTML);
        $('li').removeClass('selected');
        $("#names").html("");
        }
        
        function fon(arg){
        $('li').removeClass('selected');
        $(arg).addClass('selected');
        liSelected = $('li').eq($( "li" ).index(arg));
        }
        
        function unfon(arg){
        $('li').removeClass('selected');
        liSelected = $('li').eq(-1);
        }
            
        function getNamesAJAX1()  {
        $("#names").html("");
       
        $.getJSON("countryListJSON.php?q="+$("#searchField").val(), function(data) {
        for(i = 0; i < data.length; i++) {
        $("#names").append("<li onclick='choose(this)' onmouseover='fon(this)' onmouseout='unfon(this)'>"+data[i]+"</li>");
        }
        });
         if($("#searchField").val()==0){
             $("#names").html("");
        }
    
        $('.countryInfoField').keydown(function(e){
            
            if(e.which === 40){
                if(liSelected){
                    liSelected.removeClass('selected');
                    next = liSelected.next();
                        if(next.length > 0){
                            liSelected = next.addClass('selected');
                        }else{
                            liSelected = $('li').eq(0).addClass('selected');
                        }
                }else{
                    liSelected = $('li').eq(0).addClass('selected');
                }
                 $("#searchField").val(liSelected.text());
            }else if(e.which === 38){
                if(liSelected){
                    liSelected.removeClass('selected');
                    next = liSelected.prev();
                        if(next.length > 0){
                            liSelected = next.addClass('selected');
                        }else{
                            liSelected = $('li').last().addClass('selected');
                        }
                }else{
                    liSelected = $('li').last().addClass('selected');
                }
                $("#searchField").val(liSelected.text());
            }
        });
        }
       


        </script>
        
    </body>
</html>
