<?php 		
			$new_id = intval($_GET['user']);
			echo $new_id;
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
            $stmt = $pdo->query("SELECT * FROM users WHERE user_id = '$new_id'");
            $row = $stmt->fetch();
            echo $row['user_name'];
             

 ?>

<div style="text-align: center;">
	
	<h1><?php echo $row['user_name']; ?>'s Profile:</h1>

	<img class="img-thumbnail" src="avatar.png" width="30%">

	<p><?php echo $row['user_name']; ?> has: <?php if ($row['user_points'] == NULL) {echo "0";}else {echo $row['user_points'];} ?> points.</p>
	<p><b>Bio:</b> <?php if ($row['user_info'] == NULL) {echo "This user has not updated his Bio yet.";} else {echo $row['user_info'];}  ?></p>
	<p><b>Contact <?php echo $row['user_name']; ?>:</b> <?php echo $row['user_email']; ?></p>

</div>

