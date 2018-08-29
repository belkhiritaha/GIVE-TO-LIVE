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





$changepass = $_POST['pass'];
$newpass = $_POST['pass1'];
$confnewpass = $_POST['pass2'];

if ($newpass == $confnewpass) {
	echo "identical";
	if (password_verify($changepass, $userRow['user_pass'])) {
	echo "good";
				$changename = $_POST['name'];
			if ($changename == $userRow['user_name']) {
				
			} else {
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
			            $stmt = $pdo->prepare('UPDATE users SET user_name = :changename WHERE user_id = :user_id');
			            $stmt->bindParam(':changename', $changename, PDO::PARAM_STR);
						$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
						$stmt->execute();
			}

			$changemail = $_POST['mail'];
			if ($changemail == $userRow['user_email']) {
				
			} else {
			            $stmt = $pdo->prepare('UPDATE users SET user_email = :changemail WHERE user_id = :user_id');
			            $stmt->bindParam(':changemail', $changemail, PDO::PARAM_STR);
						$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
						$stmt->execute();
			}

			$changebio = $_POST['info'];
			if ($changebio == $userRow['user_info']) {
				
			} else {
			            $stmt = $pdo->prepare('UPDATE users SET user_info = :changebio WHERE user_id = :user_id');
			            $stmt->bindParam(':changebio', $changebio, PDO::PARAM_STR);
						$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
						$stmt->execute();
			}
	} else  {
		echo "wrong";
	}
}
else {
	echo "not identical";
}


 ?>