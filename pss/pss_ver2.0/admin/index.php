<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="gbk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="jackson li">
    <title>Purchasing Request</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

        .content{
           height: 800px;
           width: 1024px;
           margin: auto;
           position: relative;
           background-color: #ff0000;
           z-index: -10;
        }

        .showbox{
            position: absolute;
            margin-left: 400px;
            margin-top: 200px; 
            height: 200px;
            width: 200px;
            padding-left: 0px;
            z-index: -5;
        }
        .leftbox{
            position: absolute;
            background-color: #ffff00;
            margin-left: 200px;
            margin-top: 200px;
            height: 200px;
            width: 200px;
        }
        .rightbox{
            position: absolute;
            background-color: #ffff00;
            margin-left: 600px;
            margin-top: 200px;
            height: 200px;
            width: 200px;          
        }
        
        .showbox ul{
            list-style:none;
            display:inline;
            float: left;
            border: 2px;
            border-color: #ffffff;
            border-style: solid;
            background-color: #668800;
            height: 200px;
            width: 20000px;  
        }        

        ul li{
            list-style:none;
            display:inline;
            float: left;
            border: 2px;
            border-color: #ffffff;
            border-style: solid;
            background-color: #668800;
            height: 200px;
            width: 200px; 
            font-size: 80px;
            text-align: center;
            
        }
        .vcard{
            display:inline;
            float: left;
            border: 2px;
            border-color: #ffffff;
            border-style: solid;
            background-color: #668800;
            height: 200px;
            width: 200px;    
        }        
    </style>

    
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript">
        $('document').ready(function(){
            
            var num = 1;
            while( num < 200 ){
                $(".showbox li").animate({
                    right:"+=20px"
                });
                num = num + 1;
            }
        });
    
    </script>
    
  </head>
  <body>
      <div class="content">
          <div class="leftbox"></div>          
          <div class="showbox">
              <ul>
                  <?php
                  for ( $i=0; $i<20; $i++ ){
                      echo "<li class='vcard'>".$i."</li>";
                  }
                  ?>
              </ul>
              
          </div>

          <div class="rightbox"></div>
      </div>
  </body>
</html>

