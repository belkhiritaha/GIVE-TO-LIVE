<?php 		
			$userRow['user_name'] = "";
			$search_user = $_GET['user'];
 			$host = "localhost";
            $user = "root";
            $pass = "";
            $db = "dblogin";
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($dsn, $user, $pass, $opt);
            $i = 1;
            // $stmt = $pdo->query("SELECT * FROM users WHERE user_name = '$new_id'");
            $stmt = $pdo->prepare('SELECT * FROM users WHERE user_name = :search_user');
			$stmt->bindParam(':search_user', $search_user, PDO::PARAM_STR);
			$stmt->execute();
            $row = $stmt->fetch();

            if ($logvar == 1) {
            	require_once("session.php");
  
			  require_once("class.user.php");
			  $auth_user = new USER();
			  
			  
			  $user_id = $_SESSION['user_session'];
			  
			  $stmt24 = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
			  $stmt24->execute(array(":user_id"=>$user_id));
			  
			  $userRow=$stmt24->fetch(PDO::FETCH_ASSOC);

			$servername = "localhost";
			$username = "root";
			$password = "";

            }

                    
            


                  

            $quote = "'";
            if (is_array($row)) {
            $img_path_raw ="uploads/". $row['user_id'] . ".jpg";
            $img_path = $img_path_raw . "?rand=". rand();
            $placeholder_image = "avatar.png";

             $o_id = $row['user_id'];
                  $stmt2 = $pdo->prepare('SELECT * FROM offre WHERE ID = :o_id');
                  $stmt2->bindParam(':o_id', $o_id, PDO::PARAM_STR);
                  $stmt2->execute();
                  $r=$stmt2->fetch(PDO::FETCH_ASSOC);
                 
     
            	

         
    	if ($row['user_points'] == NULL) { $row['user_points'] = 0;}
 		if ($row['user_info'] == NULL) { $row['user_info'] = "This user has not updated his Bio yet.";}
    	echo '<div style="text-align: center;">
	
			<h1>'.$row["user_name"].$quote.'s Profile:</h1>';

			if (file_exists($img_path_raw)) {
		    echo '<img src="'.$img_path.'" class="img-thumbnail" onerror="this.onerror=null; this.src='.$placeholder_image.'" width="30%;">'; 
		} 
		else {
			echo '<img src="avatar.png" class="img-thumbnail" width="30%;">'; 
		}
			
			 echo '

			<p>'.$row['user_name'].' has: '.$row['user_points'].' points.</p>
			<p><b>Bio:</b> '.$row['user_info'].'</p>
			<p><b>Contact '.$row['user_name'].':</b> '.$row['user_email'].'</p>
			<p><b>Participations :</b> </p><p><ul>';

			$all_zero = true;

			 if (is_array($r)) {
			 	
                  	unset($r['ID']);
                 		foreach ($r as $key => $parti) {
                 			if ($parti == 1) {
                 				echo "<li>participated in: ".$key."</li>";
                 				$all_zero = false;
                 			}
                 		}
                  	}
             if ($all_zero == true) {
              	echo "<p style='display:inline'>This user has not participated in any events yet.</p>";
              } 

			echo'</ul></p>

			

		</div>';
    }


            
            else {
            	
            	echo '<div style="width: 70%; margin: auto;text-align: center;margin-top:10%;">
 	<h1> No user found :c </h1>
 	  
    <h4 style="font-family: Montserrat;">Try again</h4>

    <form method="get" action="">

    <input class="form-control form-control-lg" type="text" placeholder="'.$_GET['user'].'" name="user">
    <button type="submit" class="btn btn-primary mb-2">Search</button>

    </form></div>';
    if (strlen($search_user) > 2) {
            		$sth = $pdo->prepare('SELECT user_name FROM users WHERE user_name LIKE CONCAT("%", :search_user, "%")');
            	$sth->bindParam(':search_user', $search_user, PDO::PARAM_STR);
				$sth->execute();


				$result = $sth->fetchAll();


			// 	if (count($result)==1) {
			// 		 for ($i=0; $i < count($result) ; $i++) { 
   //          	$filter = $result[$i];
   //          	foreach($filter as $usname => $usname_value) {
   //          	echo "<span class='h6' style='font-weight: 400; font-size:1.25em;text-transform:uppercase;'><a href='profile.php?user=".$usname_value."' style='display: inline; margin: 2%;width:100%;'>";
   //          	echo $usname_value;
			// 	echo "</a>";
			// 	echo "</span>";
			// }
   //          }
				 
			// 	}
				
            
            echo '<p style="font-weight: 400; font-size:1.25em;text-transform:uppercase">did you mean: '.$row['user_name'].'</p>';
            echo "<div style='width:100%; text-align:center'>";
            for ($i=0; $i < count($result) ; $i++) { 
            	$filter = $result[$i];
            	foreach($filter as $usname => $usname_value) {
            	echo "<span class='h6' style='font-weight: 400; font-size:1.25em;text-transform:uppercase;'><a href='profile.php?user=".$usname_value."' style='display: inline; margin: 2%;width:100%;'>";
            	echo $usname_value;
				echo "</a>";
				echo "</span>";
			}
            }
            echo "</div>";
            	}
            }

             if ($_GET['user'] == $userRow['user_name']) {
             	echo "<script>console.log('ezez');</script>";
            	echo '<button id="editbutton" class="btn btn-outline-info" onclick="show()" style="width:20%;margin-left:40%;margin-top:10%;">Edit my profile</button>';


   // echo $user_id;
   // echo $userRow['user_name']; 
           $quote = "'";
           $img_path_raw ="uploads/". $user_id . ".jpg";
           $img_path = $img_path_raw . "?rand=". rand();
            $placeholder_image = "avatar.png";
           if (file_exists($img_path_raw)) {
        $img_path_final = $img_path; 
    } else {
      $img_path_final = $placeholder_image;
    }
       echo '    

     <div id="containeredit" class="containeredit" style="text-align: center; width: 80%; margin: auto; display:none;">
    <h1>Edit Profile</h1>
    <hr>
      <!-- left column -->
      
        <div class="text-center">
      
      <img src="'.$img_path_final.'" class="img-thumbnail" onerror="this.onerror=null; this.src="avatar.png"" width="30%;" id="uploadPreview">
          
      
          <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" style="margin-top: 2%;display:none;" onchange="PreviewImage();">
    <label for="fileToUpload" class="btn btn-outline-info" style="display:block; width:20%; margin:auto; margin-top:2%;">Select file</label>
    <input type="submit" value="Upload Image" name="submit" class="btn btn-primary" style="margin-top: 2%">

</form>
        </div>


      
      <!-- edit form column -->
      <div class="personal-info">
        <div class="alert alert-info alert-dismissable bg-warning" style="display: none">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>

         <script type="text/javascript">
      function checkdiff(val) {
        var x = document.getElementById("nameform").value;
        var x = val;
      }
  </script>
        
        <form class="form-horizontal" role="form" style="margin-top: 10%" method="post" action="imaginary.php" accept-charset="utf-8">
          <div class="form-group">
            <label class=" control-label">Full name:</label>
            <div class="">
              <input class="form-control" type="text" value="'.$userRow['user_name'].'" name="name" onchange="checkdiff(this.value)">
            </div>
          </div>
  
          <div class="form-group">
            <label class=" control-label">Email:</label>
            <div class="">
              <input class="form-control" type="text" value="'.$userRow['user_email'].'" name="mail" onchange="checkdiff(this.value)">
            </div>
          </div>

          <div class="form-group">
            <label class=" control-label">Bio:</label>
            <div class="">
              <input class="form-control" type="text" value="'.$userRow['user_info'].'" name="info" onchange="checkdiff(this.value)">
            </div>
          </div>
         
          <div class="form-group">
            <label class=" control-label">Set new password:</label>
            <div class="">
              <input class="form-control" id="pw1" type="password" value="" name="pass1" onchange="checkdiff(this.value)">
            </div>
          </div>
          <div class="form-group">
            <label class=" control-label">Confirm new password:</label>
            <div class="">
              <input class="form-control" type="password" value="" name="pass2" onchange="checkdiff(this.value)" >
            </div>
          </div>
          <div class="form-group">
            <label class=" control-label"></label>
            <div class="">
      <script type="text/javascript">
      function confirm(){
        document.getElementById("confirm").style.display = "none";
        document.getElementById("confirm_appear").style.display = "block";
      }
  </script>
        <span id="confirm" class="btn btn-primary" onclick="confirm()">Confirm Changes</span>
              <span></span>
              <input type="reset" class="btn btn-default" value="Reset">
            </div>
          </div>
          <div class="form-group" id="confirm_appear" style="display: none;">
            <label class=" control-label">Confirm current password:</label>
            <div class="">
              <input class="form-control" type="password" value="" name="pass" onchange="checkdiff(this.value)">
               <input type="submit" class="btn btn-primary" value="Save Changes">  
            </div>
          </div>
        </form>
      </div>
  </div>

<hr>
          </div>
  </div>
  <style type="text/css">
      .form-control {
        width: 50%;
        margin: auto;
      }

      label.control-label::after {
                        content: "";
                        border-top: 1px solid #3063b5;
                        display: block;
                        width: 50%;
                        margin: auto;
                        margin-top:2.3%;
                        animation-name:end;
                        animation-duration: 1.2s;
                    }

    label.control-label{
                        margin-top: 1%;
                        font-family: "Montserrat", sans-serif;
                        text-transform: uppercase;
                        letter-spacing: 6px;
                        word-spacing: 2px;
                        font-size: 135%;
                        color: black;
                        animation-name:end;
                        animation-duration: 1.2s;
                        text-align: center;
                    }

                    h1 {
                        padding-top: 0;
                    }

                    .alert {
                        margin: 2%;
                    }
  </style>';
            }


 
    ?>