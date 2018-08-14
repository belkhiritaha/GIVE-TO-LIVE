<?php
if (isset($_GET['user'])) {
    $new_id = intval($_GET['user']);
    session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    for ($i=1; $i < 20 ; $i++) { 
            if ($new_id == $i) {
            $login->redirect("profile.php?loggedin=true&user=".$i);
        }
    }
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);
        
     if($login->doLogin($uname,$umail,$upass))
    {
        for ($i=1; $i < 20 ; $i++) { 
            if ($new_id == $i) {
            $login->redirect("profile.php?loggedin=true&user=".$i);
            }
         }
    }
       else
    {
        $error = "Wrong Details";
    }  
    
}
elseif (empty($_GET)) {
    $error = "Wrong Details";
     } 

}


else {
    session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('profile.php?loggedin=true');
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);
        
    if($login->doLogin($uname,$umail,$upass))
    {
        $login->redirect('profile.php?loggedin=true');
    }
    else
    {
        $error = "Wrong Details";
    }   
}
}

?>

    
    
 
    
<div class="signin-form">

    <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h3 class="form-signin-heading">Login</h3><hr />
        
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
              <script>
function myFunction() {
    location.reload();
}
</script> 
            <button type="submit" name="btn-login" class="btn btn-primary" onclick="myFunction()">
                    <i class="fas fa-sign-in-alt"></i> Log In
            </button>
          
        </div>  
        <br />
            <label>Don't have an account yet? <a href="sign-up.php">Sign Up!</a></label>
      </form>

    </div>
    
</div>
