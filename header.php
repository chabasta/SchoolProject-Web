<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();


if (!isset($file)) {
	$file = 'undefined';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		<?php 
			if (isset($title))
			{
				echo $title ;
			}
			else
			{
				echo 'Hazardni hry';
			}
		?>		
	</title>
	<link id="skin" rel="stylesheet" href="<?php echo (isset($_COOKIE['skin'])) ?  $_COOKIE['skin'] : 'css/style.css';?>">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" media="print" href="css/print.css" />
	<link rel="shortcut icon" href="images/favicon.ico">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

</head>
<body>
<header>
		<nav id='menu' class="menu">  
			<ul>
				<li><a class="logo" href="index.php">Hazardní hry</a></li>

				<li>
						<a <?php if ($file == "spolecnosti.php"){ ?> id='active'<?php }?>  class= 'menu-item' href="spolecnosti.php"> Společnosti </a>
				</li>

				<li>
						<a <?php if ($file == "onlinegame.php"){ ?> id='active'<?php }?>  class= 'menu-item' href="onlinegame.php"> Online hazradní hry </a> 
				</li>

				<li>
						<a <?php if ($file == "zkusenosti.php"){ ?> id='active'<?php }?>  class= 'menu-item' href="zkusenosti.php"> Zkušenosti </a>
				</li>


				<?php if (isset($_SESSION['logged'])){?>
					
					<li id="log-out"><div><a class="menu-button" href="data/auth.php?log-out">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						Log out
					</a></div></li>

					

				<?php } else{?>
					<li id="sign-in"><div ><a class="menu-button" href="sign-in.php">
						<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						Sign in
					</a></div></li>
					
					
					<li id="registration"><div ><a class="menu-button" href="reg.php">
						<i class="fa fa-address-card-o" aria-hidden="true"></i>
						Registration
					</a></div></li>
					
				<?php }?>
				
			</ul>
		</nav>

        <noscript>
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert-block display">Došlo k chybě při ověřovani vašich udaju, pravidelně jste něco špatně napsal</div>
            <?php } ?>
        </noscript>
</header>
