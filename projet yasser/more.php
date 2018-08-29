
<?php 
$offre = intval($_GET['offre']);
            

  
  echo("<script>console.log('offre: ".$offre."');</script>");

  $logvar = 0;

if(isset($_GET['loggedin']) && $_GET['loggedin']=="true")
  {
    $logvar = 1;
  }





?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style1.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
     
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>




</head>
<body>

<div class="navbaar" style="position: fixed; top: 0; right: 0; left: 0; z-index: 10;">

  <nav id="pleasenav" class="navbar navbar-expand-lg navbar-dark justify-content-between" id="mynav">
    <a class="navbar-brand active" href="#">Give to live</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
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
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 slider" style="position: fixed; top: 5%; left: 0; z-index: 9; padding-top: 8%; height: 100%; overflow: hidden;">
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
          include 'index_more.php';
          echo '<script type="text/javascript">
           console.log("user not loggedin");
      </script>';
        }
        elseif ($logvar == 1) {

          require_once("session_more.php");
  
          require_once("class.user.php");
          $auth_user = new USER();
          
          
          $user_id = $_SESSION['user_session'];
          
          $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
          $stmt->execute(array(":user_id"=>$user_id));
          
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        $servername = "localhost";
        $username = "root";
        $password = "";


            echo $user_id;
            echo $userRow['user_name']; 
            echo '<script type="text/javascript">
           console.log("user loggedin");
      </script>';

          include 'loggedin_more.php';
        
              $db = "dblogin";
                  $charset = 'utf8mb4';
                  $host = "localhost";
                  $user = "root";
                  $pass = "";

                  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                  $opt = [
                      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                      PDO::ATTR_EMULATE_PREPARES   => false,
                  ];
                  $pdo = new PDO($dsn, $user, $pass, $opt);
                  if ($offre == 1) {
                    $stmt2 = $pdo->prepare('SELECT o1 FROM offre WHERE ID = :user_id');
                  }
                   elseif ($offre == 2) {
                    $stmt2 = $pdo->prepare('SELECT o2 FROM offre WHERE ID = :user_id');
                  }
                    elseif ($offre == 3) {
                    $stmt2 = $pdo->prepare('SELECT o3 FROM offre WHERE ID = :user_id');
                  }
                  elseif ($offre == 4) {
                    $stmt2 = $pdo->prepare('SELECT o4 FROM offre WHERE ID = :user_id');
                  }
                  elseif ($offre == 5) {
                    $stmt2 = $pdo->prepare('SELECT o5 FROM offre WHERE ID = :user_id');

                  }
                  $stmt2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                  $stmt2->execute();

                  $o=$stmt2->fetch(PDO::FETCH_ASSOC);
                  foreach ($o as $key => $value) {
                   if ($value == 0) {
                      function add(){
                  global $user_id;
                  global $offre;
                  $db = "dblogin";
                  $charset = 'utf8mb4';
                  $host = "localhost";
                  $user = "root";
                  $pass = "";

                  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                  $opt = [
                      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                      PDO::ATTR_EMULATE_PREPARES   => false,
                  ];
                  $pdo = new PDO($dsn, $user, $pass, $opt);
                  $stmt = $pdo->prepare('UPDATE users SET user_points = user_points + 1 WHERE user_id = :user_id');
                  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                  $stmt->execute();

                  if ($offre == 1) {
                    $stmt3 = $pdo->prepare('UPDATE offre SET o1 = 1 WHERE ID = :user_id');
                    $stmt3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $stmt3->execute();
                    echo "<style>.container-hdra{display:none;}</style>";
                  }
                  elseif ($offre == 2) {
                    $stmt3 = $pdo->prepare('UPDATE offre SET o2 = 1 WHERE ID = :user_id');
                    $stmt3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $stmt3->execute();
                    echo "<style>.container-hdra{display:none;}</style>";
                  }
                  elseif ($offre == 3) {
                    $stmt3 = $pdo->prepare('UPDATE offre SET o3 = 1 WHERE ID = :user_id');
                    $stmt3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $stmt3->execute();
                    echo "<style>.container-hdra{display:none;}</style>";
                  }
                  elseif ($offre == 4) {
                    $stmt3 = $pdo->prepare('UPDATE offre SET o4 = 1 WHERE ID = :user_id');
                    $stmt3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $stmt3->execute();
                    echo "<style>.container-hdra{display:none;}</style>";
                  }
                  elseif ($offre == 5) {
                    $stmt3 = $pdo->prepare('UPDATE offre SET o5 = 1 WHERE ID = :user_id');
                    $stmt3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $stmt3->execute();
                    echo "<style>.container-hdra{display:none;}</style>";
                  }


          }
                   }
                   elseif ($value == 1) {
                    echo "do ur thing";

                    function add() {
                      echo "<style>.container-hdra{display:none;}</style>";
                    }
                   }
                  }
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
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin-left: 16.67%; margin-top: 10%;">
             <!-- particles.js container --> <div id="particles-js"></div><script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
      <script type="text/javascript" src="particles.js"></script>

      <style type="text/css">
        /* ---- reset ---- */ body{ margin:0;} canvas{ display: block; vertical-align: bottom; } /* ---- particles.js container ---- */ #particles-js{ position:fixed; z-index: -10; width: 100%; height: 100%; background-color: lightblue; background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: 50% 50%; top: 0 } 
      </style>
      <?php
      if(isset($_GET['add'])){
          if ($value == 0) {
             echo "<h1>Registrated successfully !</h1>";
                     echo "<br/>";
                     echo "<p>You have signed up to join: Lorem Ipsum</p>";
                     echo "<br/>";
                     echo "<p>The organizers have been notified and will contact you shortly</p>";
                     echo "<p>Thank you for your commitement</p>";
                     echo "<a href='home.php'>Click here to go <b>Home</b></a>";
                    add();
          } elseif ($value==1) {
            echo "<h1>You have already registered (rip english)</h1>";
          }
                    }
              ?>
       <div class="container-hdra">


        
        <h1>Lorem Ipsum</h1>

        <img src="http://via.placeholder.com/350x150" class="img-thumbnail affiche" style="width: 95%; margin-left: 2.5%;">


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

         <div id="plf" class="bg-warning" style="display: none;"><p>Please log in first</p></div>

         <div id="already" class="bg-warning" style="display: none;"><p>You have already registered</p></div>
      



         <script type="text/javascript">
           function logfirst(){
            document.getElementById('plf').style.display = "block";
           }

           function already(){
            document.getElementById('already').style.display = "block";
           }

           
         </script>

        <?php  


           
      if ($logvar == 0) {
        echo '<button class="btn btn-primary part" id="myAnimation" onclick="logfirst()">Je participe !</button>';
      }

      elseif ($value == 1) {
         echo '<button class="btn btn-outline-primary part" id="myAnimation" onclick="already()">Je participe !</button>';
      }

      elseif ($logvar == 1) {
        echo "<a href='more.php?loggedin=true&offre=".$offre."&add'>Je participe !</a>";
        $nbr = $userRow['user_points'];  


  }
  ?>


       

  

        </div>



        
<style type="text/css">

         .part {
      width: 30%;
      padding: 1%;
      animation: start 2s;
      margin-bottom: 10%;
      margin-top: 3%;
      transition: all 300ms;
    } 

    .part:hover {
      transform: translateY(10px);
      box-shadow: 0px -7px 0px -1px #00438bad;
    }
    

    .container-hdra {
      text-align: center;
    }
  

    #plf, #already {
      width: 30%;
      padding: 1%;
      margin: auto;
      border: 2px #f0da98 solid;
      animation: start 2s;

    }
   
    .affiche {
      width: 90%;
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

    * {
        margin: 0;
        padding: 0;
    }

    @media (max-width: 575.98px) {
      .d-flex {
        display: block !important;
      }
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

    

     .col-lg-2 {
        height: 100%;
        background-color: #a6ccf5;
        padding: 2vw;
        padding-bottom: 50%;
    }

    .col-lg-10 {
        height: 100%;
        background-color: transparent;
        padding: 0;

    }



    .carousel {
    height: 75%;
     }

  .carousel-inner {
    height: 100%;
     }

  


    .p {
        font-size: 8px;
        width: 0%;
    }

    .blabla {
        width: 90%;
        margin: auto;
    }

    .row {
        margin-right: 0;
    }

    .log-container {
      height: 100%;
      padding-bottom: 110%;
    }

    .container {
      padding: 0;
      margin: auto;
      width: 100%;
    }

    h2 {
      width: 75%;
      margin: auto;
    }

   
    
</style>

</body>
</html>

  

 