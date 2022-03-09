<?php 
	$title = 'Sign-in';
	include 'header.php';
	if (isset($_SESSION['logged'])){
	    echo "<script>window.location.href='./index.php'</script>";
        echo '<meta http-equiv="refresh" content="0;url=./index.php">';
	}
?>
	
	<div class="auth-container">
		<div class="title">Sign-in</div>
		<form id="sign-in-form" class="auth" method="POST" action="data/auth.php">
			<label for="email">Email<span class="star"> *</span></label>
			<input id="email" type="email" name="email" placeholder="Username@gmail.com"  > <!--required pattern="\w+@\w+\.\w+" -->

			<label for="password">Password<span class="star"> *</span></label>
			<input id="password" type="password" name="password" placeholder="Write your password"  > <!--required pattern="\w{6,}" -->

			<input type="submit" value="Submit">
		</form>
	</div>
	<script >  //connect validate.js

        window.onload = function () {
            let sign_in_form = document.getElementById("sign-in-form");
            bind_events(sign_in_form);
        }
	</script>
<?php
	include 'footer.php';
?>