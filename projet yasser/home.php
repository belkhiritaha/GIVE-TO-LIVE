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
    <title>Home</title>
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
        <li class="nav-item active">
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
          include 'index_home.php';
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


            echo $user_id;
            echo $userRow['user_name']; 
            echo '<script type="text/javascript">
           console.log("user loggedin");
      </script>';

          include 'loggedin.php';
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

      
       

      
       
            


              <!-- particles.js container --> <div id="particles-js"></div><script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
      <script type="text/javascript" src="particles.js"></script>

      <style type="text/css">
        /* ---- reset ---- */ body{ margin:0;} canvas{ display: block; vertical-align: bottom; } /* ---- particles.js container ---- */ #particles-js{ position:fixed; z-index: -10; width: 100%; height: 100%; background-color: lightblue; background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: 50% 50%; top: 0 } 
      </style>

        
            
      <div class="all" style="background-color: rgba(10, 10, 10, 0.2); width: 100%;">
             <div class="container">



  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" style="z-index: 2;">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>



       
        <script type="text/javascript">
                        $('.carousel').carousel({
              interval: 6000,
              pause: "false"
            });
                        $('.carousel').carousel()
        </script>



      <div class="blabla">  
      <h4>3wtani lbla bla</h4>
      <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
      </div>

      <h1 style="margin-top: 2%;">Lorem Ipsum</h1>

      <div class="orga">

      <div class="d-flex justify-content-center">

         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
            <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=1" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=1" class="h5 text-primary">Learn more about this >></a>';
           }
?>
  
</div>
         </div>

           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div> <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=2" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=2" class="h5 text-primary">Learn more about this >></a>';
           }
?></div>

         </div>

      </div>

      <div class="d-flex justify-content-center">

         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=3" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=3" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>
         </div>

           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
               <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=4" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=4" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>
            
         </div>

      </div>

      <div class="d-flex justify-content-center">

         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=5" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=5" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>
         </div>

           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=6" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=6" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>

         </div>

      </div>

     <div class="d-flex justify-content-center">

         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=7" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=7" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>
         </div>

           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=8" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=8" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>

         </div>

      </div>


      <div class="d-flex justify-content-center">

         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=9" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=9" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>
         </div>
           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div>
              <?php  
           if ($logvar == 0) {
             echo '<a href="more.php?loggedin=false&offre=10" class="h5 text-primary">Learn more about this >></a>';
           }
            elseif ($logvar == 1) {
             echo '<a href="more.php?loggedin=true&offre=10" class="h5 text-primary">Learn more about this >></a>';
           }
?>
           </div>
           
         </div>

        
      </div>

     </div>

</div>
</div>
</div>
</div>

  

        
<style type="text/css">
    

    * {
        margin: 0;
        padding: 0;
    }

     .dflex {
      align-items: center!important;
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

    .offre {
      border: 4px #dee2e6 solid;
      background-color: #f5f5f5;
      margin-top: 10%;
      margin: 1%;
      padding: 1%;
     
    }

     .col-lg-2 {
        height: 100%;
        background-color: #a6ccf5;
        padding: 2vw;
        padding-bottom: 50%;
        margin-bottom: 100%;
    }

    .col-lg-10 {
        height: 100%;
        background-color: white;
        padding: 0;
    }

    .row {
      position: relative;
    }



    .carousel {
    height: 75%;
     }

  .carousel-inner {
    height: 100%;
     }

  .item {
    background-size: cover;
    background-position: 50% 50%;
    width: 100%;
    height: 100%;
     }

  .item img {
    visibility: hidden;
     }


    .p {
        font-size: 8px;
        width: 0%;
    }

    .blabla {
      margin-top: 5%;
      border: 4px #dee2e6 solid;
      background-color: #f5f5f5;
      width: 85%;
      margin: auto;
      padding: 2%;
    }

    .row {
        margin-right: 0;
        display: flex;
        align-items: center;
    }

    .log-container {
      height: 100%;
      padding-bottom: 110%;
    }

    .container {
      padding-right: 0;
      margin: auto;
      width: 100%;
    }

    h2 {
      width: 75%;
    }

    .list-group-item {
      transition: all 300ms;
    }

    .list-group-item:hover {
      background-color: #e4e4e4;
    }

    .nounderline:hover {
        text-decoration: none;
    }
   
    .blabla, .orga {
      text-align: left;
    }
    
</style>
</div>

        
<style type="text/css">

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

  .item {
    background-size: cover;
    background-position: 50% 50%;
    width: 100%;
    height: 100%;
     }

  .item img {
    visibility: hidden;
     }


    .p {
        font-size: 8px;
        width: 0%;
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

    #title {  

            padding-top: 15%;
            font-family: 'Montserrat', sans-serif;
            font-weight: bolder;
            text-transform: uppercase;
            letter-spacing: 6px;
            word-spacing: 2px;
            font-size: 900%;
            color: black;
            animation-name:end;
            animation-duration: 3s;
            text-align: center;
        }
   
    
</style>

</body>
</html>