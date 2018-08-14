<?php 



  $logvar = 0;

if(isset($_GET['loggedin']) && $_GET['loggedin']=="true")
  {
    $logvar = 1;
  }
  echo("<script>console.log('".$logvar."');</script>");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style1.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  




</head>
<body>

<div class="navbaar" style="position: fixed; top: 0; right: 0; left: 0; z-index: 10;">

  <nav id="pleasenav" class="navbar navbar-expand-lg navbar-dark justify-content-between" id="mynav">
    <a class="navbar-brand" href="#">Give to live</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="leaderboard.php">Leaderboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Organizers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

</div>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 slider" style="position: fixed; top: 5%; left: 0; z-index: 9; padding-top: 8%;">
      <div class="log-container">

        <style type="text/css">


          @keyframes slide{
            0% {
              transform: translateX(-1000px);
            }

            100% {
              transform: translateX(0px);
            }
          }

          @keyframes slidenav{
            0% {
              transform: translateY(-1000px);
            }

            100% {
              transform: translateX(0px);
            }
          }

          @keyframes opac {
            0% {
              opacity: 0;
            }
            20% {
              opacity: 0;
            }

            100% {
              opacity: 1;
            }
          }

          .col-lg-10 {
            animation: opac 900ms;
          }
          
          .navbaar {
            animation: slidenav 300ms;
          }


          .slider {
            animation: slide 300ms;
          }

          .log-container {
            position: relative;
          }

        
          
        </style>
        <?php 
        if ($logvar == 0) {
          include 'index_profile.php';
          echo '<script type="text/javascript">
           console.log("user not loggedin");
      </script>';
        }
        elseif ($logvar == 1) {

          require_once("session.php");
  
          require_once("class.user.php");
          $auth_user = new USER();
          
          
          $user_id = $_SESSION['user_session'];
          
          $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
          $stmt->execute(array(":user_id"=>$user_id));
          
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        $servername = "localhost";
        $username = "root";
        $password = "";


          
            echo '<script type="text/javascript">
           console.log("user loggedin");
      </script>';

         
         echo ' <div class="log-container">

          <h3>Profile:</h3>
          
          <label class="h6">welcome : '.$userRow['user_name'].'</label>

          <hr/>

              <div>
      <img src="avatar.png" class="img-thumbnail">
    </div>
    
        <hr />  
         <!-- <label class="h5">welcome - '.$userRow['user_email'].'</label> -->
      <ul class="list-group">
      <a href="logout.php?logout=true" class="nounderline"><li class="list-group-item"><span class="glyphicon glyphicon-log-out"></span><i class="fas fa-sign-out-alt"></i>Log Out</li></a>
    </ul>

  </div>';
        }
         ?>
        
          <div class="themes" style="text-align: left;">
          
          <h6>Themes:</h6>

          <script type="text/javascript" src="themes.js"></script>
         
    <div class="buttons" style="text-align: left;">
         

          <button type="submit" class="red" onclick="red()"></button>
          <button type="submit" class="yellow" onclick="yellow()"></button>
          <button type="submit" class="blue" onclick="blue()"></button>



    </div>
    </div>
      </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12" style="margin-left: 16.67%;">

      
       <?php

       if ($logvar == 1 && isset($_GET['user'])) {
          $new_id = intval($_GET['user']);
          echo '<script>console.log("other user, id :'.$new_id.'")</script>';
       }
        elseif ($logvar == 1 ) {
          echo '<script>console.log("My profile")</script>';
       }
       elseif ($logvar == 0 && isset($_GET['user'])) {
          $new_id = intval($_GET['user']);
          echo '<script>console.log("other user, id :'.$new_id.'")</script>';
          include 'try.php';
       }
        elseif ($logvar == 0 ) {
          echo '<script>console.log("please log in first")</script>';
        }
        



         ?>

      
       
            


              <!-- particles.js container --> <div id="particles-js"></div><script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
      <script type="text/javascript" src="particles.js"></script>

      <style type="text/css">
        /* ---- reset ---- */ body{ margin:0;} canvas{ display: block; vertical-align: bottom; } /* ---- particles.js container ---- */ #particles-js{ position:fixed; z-index: -10; width: 100%; height: 100%; background-color: lightblue; background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: 50% 50%; top: 0 } 
      </style>

        
            
      <div class="all" style="background-color: rgba(10, 10, 10, 0.2); width: 100%;">

         











     </div>

</div>
</div>
</div>
</div>

  

        
<style type="text/css">
    
    .license {
      display: none;
      font-size: 50%;
      margin-bottom: 3%;
    }


    #separate {
      border-top: 3px solid #dee2e6;
    }
    tr {
     background-color: #cbc97e87;
    }
    tr:hover {
      background-color: #a4a26687;
    }

    tr.podium {
      background-color: #ffe494c7;
    }

    .podium:hover {
      cursor: pointer;
      background-color: #d3bc79c7;
    }

    td {
      font-weight: bolder;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .navbar-brand {
      font-family: 'Montserrat', sans-serif;
      letter-spacing: 3px;
      font-weight: bolder;
    }
  
    h1 {
      padding-top: 10%;
    }
  
     .col-lg-2 {
        height: 100%;
        background-color: #a6ccf5;
        padding: 2vw;
    }

    .col-lg-10 {
        height: 100%;
        background-color: transparent;
        padding: 0;
    }

    .row {
         position: relative;
        margin-right: 0;
        display: flex;
        align-items: center;
    }

     .red {
      border-radius: 50%;
      width: 20px;
      height: 20px;
      background-color: red;
      border: 1px #dee2e6 solid;
    }

    .yellow {
      border-radius: 50%;
      width: 20px;
      height: 20px;
      background-color: yellow;
      border: 1px #dee2e6 solid;
    }

    .blue {
      border-radius: 50%;
      width: 20px;
      height: 20px;
      background-color: blue;
      border: 1px #dee2e6 solid;
    }

    .gray {
      border-radius: 50%;
      width: 20px;
      height: 20px;
      background-color: gray;
      border: 1px #dee2e6 solid;
    }

    .log-container {
      height: 100%;
      padding-bottom: 110%;
    }


  
    
</style>
</div>

        

</body>
</html>

