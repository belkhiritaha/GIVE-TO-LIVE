<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
  $login->redirect('more.php');
}

if(isset($_POST['btn-login']))
{
  $uname = strip_tags($_POST['txt_uname_email']);
  $umail = strip_tags($_POST['txt_uname_email']);
  $upass = strip_tags($_POST['txt_password']);
    
  if($login->doLogin($uname,$umail,$upass))
  {
    $login->redirect('more.php');
  }
  else
  {
    $error = "Wrong Details";
  } 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<div class="navbaar">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between" id="mynav">
    <a class="navbar-brand" href="#">Give to live</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Leaderboard</a>
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
    <div class="col-lg-2 col-md-4 col-sm-3 col-xs-12 slider">
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
          .themes {
            position: absolute;
            bottom: 0;
          }
        </style>
        

    
    
 
    
<div class="signin-form">

  <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Please log in first</h2><hr />
        
        <div id="error">
        <?php
      if(isset($error))
      {
        ?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                </div>
                <?php
      }
    ?>
        </div>

       
        <div class="form-group">
        <label for="exampleInputEmail1">Full Name</label>
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" name="txt_password" placeholder="Password" />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-primary">
                  <i class="fas fa-sign-in-alt"></i> Log In
            </button>
        </div>  
        <br />
            <label>Don't have an account yet? <a href="sign-up.php">Sign Up!</a></label>
      </form>

    </div>
    
</div>

          <div class="themes">
          <script>
$(document).ready(function(){
    $(".yellow").click(function(){
        $(".col-lg-2").css("background-color", "#ffe8a2");
        $('#mynav').removeClass('bg-primary').removeClass('bg-dark').removeClass('bg-danger').addClass('bg-warning');
    });
});

$(document).ready(function(){
    $(".red").click(function(){
        $(".col-lg-2").css("background-color", "#ec737f");
        $('#mynav').removeClass('bg-primary').removeClass('bg-warning').removeClass('bg-dark').addClass('bg-danger');
    });
});

$(document).ready(function(){
    $(".blue").click(function(){
        $(".col-lg-2").css("background-color", "#a6ccf5");
        $('#mynav').addClass('bg-primary').removeClass('bg-dark').removeClass('bg-danger').removeClass('bg-warning');
    });
});

$(document).ready(function(){
    $(".gray").click(function(){
        $(".col-lg-2").css("background-color", "#6c757d");
        $('#mynav').removeClass('bg-primary').removeClass('bg-danger').removeClass('bg-warning').addClass('bg-dark');
    });
});


</script>

<button type="submit" class="red" onclick="function()"></button>
    <button type="submit" class="yellow" onclick="function()"></button>
    <button type="submit" class="blue" onclick="function()"></button>
    <button type="submit" class="gray" onclick="function()"></button>
    </div>
      </div>
    </div>
    <div class="col-lg-10 col-md-8 col-sm-9 col-xs-12">
        <div class="container">



        </div>

    </div>

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

    .offre {
      border: 1px #dee2e6 solid;
      background-color: #f5f5f5;
      margin-left: 4%;
      margin-top: 4%;
      margin-right: 0%;
    }

     .col-lg-2 {
        height: 100%;
        background-color: #a6ccf5;
        padding: 2vw;
        padding-bottom: 50%;
    }

    .col-lg-10 {
        height: 100%;
        background-color: white;
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
      padding-right: 0;
      margin: auto;
      width: 100%;
    }

    h2 {
      width: 75%;
    }
   
    
</style>

</body>
</html>