<?php 

//change style 

session_start();
	if(isset($_GET['skin'])){		//check if isset skin

		$theme= '';

		if ($_GET['skin']=='dark') {  //write skin path 
			$theme = 'css/skinovatelnost.css';
		}
		else{
			$theme = 'css/style.css';
		}
		setcookie('skin',$theme,time()+3600*24*365*10,'/'); /*10 let bude ulozene coockie*/

	}
?>