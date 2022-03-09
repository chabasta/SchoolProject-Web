<?php
	$title = 'Registrace'; 
	include 'header.php';
    if (isset($_SESSION['logged'])){
        echo "<script>window.location.href='./index.php'</script>";
        echo '<meta http-equiv="refresh" content="0;url=./index.php">';
    }
?>
	<div class="auth-container">
		<div class="title">Registrace</div>
		<form id="registrace-form" class="auth" method="POST" action="data/auth.php">

			<label for="email">Email<span class="star"> *</span></label>
			<input id="email" type="email" name="email" placeholder="Username@gmail.com" required pattern="\w+@\w+\.\w+"> <!--required  pattern="\w+@\w+\.\w+" -->

			<label for="username">Username<span class="star"> *</span></label>
			<input id="username" type="text" name="username" placeholder="Write your username"  required pattern="\w{3,}"> <!--required pattern="\w{3,}" -->

			<label for="password1">Password<span class="star"> *</span></label>
			<input id="password1" type="password" name="password1" placeholder="Write your password"  required pattern="\w{6,}"> <!--required pattern="\w{6,}" -->

			<label for="password2">Confirm your password<span class="star"> *</span></label>
			<input id="password2" type="password" name="password2" placeholder="Confirm your password" required> <!-- required -->

			<input type="submit" value="Submit">
		</form>
	</div>
<script > 
    window.onload = function () {
        let registrace_form = document.getElementById("registrace-form");
        bind_events(registrace_form);
    }
</script>
<?php
	include 'footer.php';
?>
