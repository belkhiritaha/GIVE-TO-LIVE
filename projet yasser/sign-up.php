
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
    <div class="col-lg-2 col-md-4 col-sm-3 col-xs-12">
     




	<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "Please provide a username";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email already taken !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>


<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Sign up.</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='home.php'>login</a> here
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <span class="h6">Full name :</span>
            <input type="text" class="form-control" name="txt_uname" placeholder="Ex: Lm9wd Zghblkr" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <span class="h6">Email :</span>
            <input type="text" class="form-control" name="txt_umail" placeholder="Enter Email" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            <span class="h6">Password :</span>
            	<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>Do you have an account ?<a href="home1.php">Sign In !</a></label>
        </form>
       </div>
</div>

</div>





    <div class="col-lg-10 col-md-8 col-sm-9 col-xs-12">
        <div class="container">



  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
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

      <div class="d-flex justify-content-center">

         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div><a href="#" class="h5 text-primary">Learn more about this >></a></div>
         </div>

           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div><a href="#" class="h5 text-primary">Learn more about this >></a></div>

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
           <div><a href="#" class="h5 text-primary">Learn more about this >></a></div>
         </div>
           <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 offre">
           <h3>Placeholder</h3>
           <p class="h4 bold">Informations:</p><span class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
           <div><a href="#" class="h5 text-primary">Learn more about this >></a></div>
           
         </div>

        
      </div>

     </div>
</div>

<footer>
  <script>
$(document).ready(function(){
    $(".yellow").click(function(){
        $(".containertoz").css("background-color", "yellow");
    });
});

$(document).ready(function(){
    $(".red").click(function(){
        $(".containertoz").css("background-color", "red");
    });
});

$(document).ready(function(){
    $(".blue").click(function(){
        $(".col-lg-2").css("background-color", "blue");
        $(".bg-primary").css("background-color", "yellow!important");
        $('#mynav').removeClass('bg-primary').removeClass('bg-secondary').addClass('bg-warning');
    });
});

$(document).ready(function(){
    $(".gray").click(function(){
        $(".col-lg-2").css("background-color", "#6c757d");
        $('#mynav').removeClass('bg-primary').removeClass('bg-warning').addClass('bg-dark');
    });
});


</script>

<button type="submit" class="red" onclick="function()">red</button>
    <button type="submit" class="yellow" onclick="function()">yellow</button>
    <button type="submit" class="blue" onclick="function()">blue</button>
    <button type="submit" class="gray" onclick="function()">gray</button>



</footer>
  

        
<style type="text/css">
    

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

