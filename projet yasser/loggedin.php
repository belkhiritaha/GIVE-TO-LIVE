<?php

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


   // echo $user_id;
   // echo $userRow['user_name']; 





?>
 <div>
      <?php
      $img_path ="uploads/". $user_id . ".jpg". "?rand=". rand(); ?> 
      <img src="<?php echo $img_path ?>" class="img-thumbnail" onerror="this.onerror=null; this.src='avatar.png'">
    </div>
    <br/>
    <div>Hi <?php echo $userRow['user_name']; ?></div>
    <?php 
    if ($userRow['user_points'] == 0) {
    	echo "<div style='font-size: 80%;'>You currently have <b>0</b> points :c</div>";
    	echo "<br/>";
    	echo "<div style='font-size: 80%;'>Get more points by participating at events!</div>";
    }
    else {
    	echo "<div style='font-size: 80%;'>You currently have <b>".$userRow['user_points']."</b> points!</div>";
    }
     ?> 
    
        <hr />
         <!-- <label class="h5">welcome - <?php print($userRow['user_email']); ?></label> -->
      <ul class="list-group">
  <a href="profile.php?user=<?php echo$userRow['user_name']; ?>" class="nounderline"><li class="list-group-item"><span class="glyphicon glyphicon-user"></span><i class="fas fa-user-tie"></i>

View Profile</li></a>

  
  <a href="logout.php?logout=true" class="nounderline"><li class="list-group-item"><span class="glyphicon glyphicon-log-out"></span><i class="fas fa-sign-out-alt"></i>

Log Out</li></a>
</ul>
       