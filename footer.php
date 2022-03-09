
<footer>
	<button id="skin-button" class="skin-button">
		<?php   
			$icon= 'fa fa-moon-o fa-lg';
			if (isset($_COOKIE['skin'])){
				if ($_COOKIE['skin'] == 'css/skinovatelnost.css') {
					$icon= 'fa fa-cloud fa-lg';
				}
				else{
					$icon= 'fa fa-moon-o fa-lg';
				}
			}
		?>
		<i id ='skin-icon' class="<?php echo $icon; ?>" aria-hidden="true"></i>
	</button>
</footer>

	<script  src="js/jquery-3.5.1.min.js"></script>
	<script  src="js/skin.js"></script>
	<script  src="js/validate.js"></script>
	<script  src="js/diamond.js"></script>
	<script  src="js/spolecnosti.js"></script>
</body>
</html>