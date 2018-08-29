<?php 		
			$new_id = $_GET['user'];
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
            $stmt = $pdo->query("SELECT * FROM users WHERE user_name = '$new_id'");
            $row = $stmt->fetch();
            echo $row['user_name'];
            $quote = "'";
            if (is_array($row)) {
            	  
    	if ($row['user_points'] == NULL) { $row['user_points'] = 0;}
 		if ($row['user_info'] == NULL) { $row['user_info'] = "This user has not updated his Bio yet.";}
    	echo '<div style="text-align: center;">
    }
	
	<h1>'.$row["user_name"].$quote.'s Profile:</h1>
	
	<img class="img-thumbnail" src="avatar.png" width="30%">

	<p>'.$row['user_name'].' has: '.$row['user_points'].' points.</p>
	<p><b>Bio:</b> '.$row['user_info'].'</p>
	<p><b>Contact '.$row['user_name'].':</b> '.$row['user_email'].'</p>

	

</div>';
    }
            
            else {
            	echo '<div style="width: 70%; margin: auto;text-align: center;margin-top:10%;">
 	<h1> No user found :c </h1>
 	  
    <h4 style="font-family: Montserrat;">Try again</h4>

    <form method="get" action="">

    <input class="form-control form-control-lg" type="text" placeholder="Enter Full Name Here" name="user">
    <button type="submit" class="btn btn-primary mb-2">Search</button>

    </form></div>';
            }

             


 
    ?>