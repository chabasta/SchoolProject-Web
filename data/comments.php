<?php

	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	session_start();
	include 'connect_data_base.php';




	$error_msg = "";

		if(	isset($_SESSION['user_id']) &&   //check if isset
			isset($_POST['topic']) &&
			isset($_POST['comment'])&&
			isset($_POST['language'])){

			$topic = htmlspecialchars($_POST['topic']);
			$comment = htmlspecialchars($_POST['comment']);

			date_default_timezone_set('Europe/Prague');
			$time= date("Y-m-d H:i:s", time());

			mysqli_query($mysqli, "INSERT INTO comments ( user_id, topic, comment, cas, language) VALUES ('".$_SESSION['user_id']."','".$topic."','". $comment."', '".$time."', '".$_POST['language']."')" );  // sending mysqli query 

			$error_msg = 'redirect_on_comments';

		}
		else if(!isset($_SESSION['user_id'])){

			$error_msg = 'Sign-in abys mohl napsat svou historku';
		}
		else{
			$error_msg = 'Měl byste vyplnit všechna pole';
		}

	















?>

<noscript>
	<meta http-equiv="refresh" content="0;url=./../zkusenosti.php?<?php if ($error_msg != "redirect_on_comments") echo "error"; ?>">
</noscript>

<?php echo $error_msg; ?>
