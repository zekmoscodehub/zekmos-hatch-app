<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
              <link rel="shortcut icon" href="img/chick.png">

 <meta property="zekmosfarms.org" content="Zekmos hatchapp" /> <!-- website name -->

 <meta property=""   
        content="Zekmos Hatchapp is well crafted APP, Built by a well experienced and Developer to take away the tireless effort by individuals, Firms and Institutions in Hatching endevours to bridge the gap of record keeping and creating Reminders to know the state of eggs in the incubators keeping accounts and record is very vital in the hatching business and therefore this app comes to serve this greate purpose." /> <!-- description shown in the actual shared post -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zekmos Hatching Services Application</title>
    
    </head>
      <style>
          body{
               background-image: url('img/incubator.jpg');
                background-size: cover;
            background-repeat: no-repeat;
           background-color: green;
/*           display: flex;*/
           justify-content: center;
           background-attachment: fixed;
          }
        .container{
           
            text-align: center;
            justify-content: center;
        }
        h1{
            text-align: center;
            color: red;
            font-size: 10vmin;
        }
        .main{
            text-align:center;
            font-size: 8vmin;
        }
        .btn{
            background: green;
            text-decoration: none;
            border:none;
            border-radius: 15px;
            padding: 5px;
            margin: 10px;
            text-align: center;
            align-items: center;
            justify-content: center;
           display: inline-flex;
            
        }
        .btn:hover{
            background-color: gray;
            color:#fff;
        }
        .btn:active{
            background-color: blue;
            color: pink;
        }
        
        .btn{
            margin: 15px;
             /*max-width: 100px;*/
        }
        .btn-area{
            margin-top: 60px;
        }
          .logo{
        max-width: 30vmin;
        text-align: center;
        margin: 10px auto;
        border-radius: 50%;
        border:1px solid coral;
        cursor: pointer;
    }
    .logo:hover{
        border: 1px solid blue;
        
    }
    </style>
    <body>
        <h1>Welcome to Zekmos Hatch App</h1>
        <div calss="container">
            <!--<img src="img/incubator.jpg" alt="alt"/>-->
        </div>
          <div class="search-form container">
       <div class="logo1">
        <a class="link" href="zekmosfarms.org"><img src="img/logo.png" class="logo" /></a>
    </div>
        <div class="main">
            <div class="btn-area"> <a href="hatchapp.php" class="btn"> Home Page</a>
                <a href="order.php" class="btn order" > Make Order</a>
            <a type="button" href="search.php" class="btn">View Clients </a>
            <a href="view-orders.php" class="btn"> View Orders</a></div>
 
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
