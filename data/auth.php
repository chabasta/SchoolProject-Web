<?php
	session_start();
	include 'connect_data_base.php';


	function validate($key, $value) {  //check on regular expressions 
		$regex='';
	    if ($value == ""){
	        return false;
	    }

	    switch ($key) {
	        case 'email':
	            $regex = "/^\w+@\w+\.\w+$/";
	            break;
	        case 'username':
	            $regex = "/^\w{3,}$/";
	            break;
	        case 'password':
	        case 'password1':
	            $regex = "/^\w{6,}$/";
	            break;


	    }
	    if(!empty($regex)){
	    	return preg_match($regex, $value) ? true : false;
	    }
	    else{
	    	return true; 
	    }
	}

    $error_msg = "";

	if( isset($_POST['email']) &&       //check if isset form inputs
		isset($_POST['username']) &&
		isset($_POST['password1']) &&
		isset($_POST['password2'])){


				$error = false;
				foreach ($_POST as $key => $value) {
				  if (!validate($key, $value)) {
				    $error = true;
				    break;
				  }
				}

				if (!$error) {

					$query= mysqli_query($mysqli, "SELECT count(*) AS count FROM user WHERE email= '".$_POST['email']."'");    //sending query to database

					$query1= mysqli_query($mysqli, "SELECT count(*) AS count FROM user WHERE username= '".$_POST['username']."'"); 

					$data = mysqli_fetch_row($query); // get 1 row from query object

					$data1 = mysqli_fetch_row($query1);


					if($data[0] == 1){

                        $error_msg = 'Takovy email uz existuje';

					}

					elseif ($data1[0] == 1){

						$error_msg = 'Takovy username uz existuje';

					}
					else if($_POST['password1'] != $_POST['password2']){
						$error_msg = 'Nespravne heslo';
					}
					else{

						$heslo_hash = password_hash($_POST['password1'],PASSWORD_DEFAULT);
						mysqli_query($mysqli, "INSERT INTO user ( email, username, password) VALUES ('".$_POST['email']."','".$_POST['username']."','". $heslo_hash."')" );

						$error_msg = 'redirect';
					}


					 // sending data to database 	
				} 
				else {
                    $error_msg = "Došlo k chybě při ověřovani vašich udaju, pravidelně jste něco špatně napsal";
				}






	}
	elseif( isset($_POST['email']) &&
			isset($_POST['password'])){

		$error = false;
		foreach ($_POST as $key => $value) {
		  if (!validate($key, $value)) {
		    $error = true;
		    break;
		  }
		}


		if(!$error){
			$query= mysqli_query($mysqli, "SELECT email, password, id FROM user WHERE email= '".$_POST['email']."'" );  //taking data from database

			$data = mysqli_fetch_row($query);

			if ($data){

				if (password_verify($_POST['password'], $data[1])){  // check password


                    $error_msg = 'redirect';

					$_SESSION['logged'] = 1;

					$_SESSION['user_id']= $data[2];

				} else {
                    $error_msg = "Nespravne heslo";

	            }

			} else {
                $error_msg = "Takovy email neexistuje";
	        }

		}

		else {
            $error_msg = "Došlo k chybě při ověřovani vašich udaju, pravidelně jste něco špatně napsal";
		}
	}

	elseif (isset($_GET['log-out'])) {
		unset($_SESSION['logged']);
		unset($_SESSION['user_id']);
		$error_msg = "redirect";

		echo "<script> window.location.href='./../index.php' </script>";  //redirect 
	}



?>

<noscript>
	<meta http-equiv="refresh" content="0;url=./../index.php?<?php if ($error_msg != "redirect") echo "error"; ?>">
</noscript>

<?php echo $error_msg; ?>




	