<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('profile.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('profile.php');
	}
	else
	{
		$error = "Wrong Details";
	}	
}
?>

    
    
 
    
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading"> log in first</h2><hr />
        
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
