<?php
	$title = 'Zkušenosti'; 
	$file= basename(__FILE__);
	include 'header.php';
	include 'data/connect_data_base.php';
	include 'data/comment_page.php';


	// $query= mysqli_query($mysqli, "SELECT user.username, comments.topic, comments.comment, comments.cas FROM comments LEFT JOIN user  ON comments.user_id=user.id ORDER BY comments.id DESC"); 
?>


<div class="reviews-container">
	<div class="filter">

		<form method="GET" action="./zkusenosti.php">

			<div class="filter-title">Filter<span class="star"> *</span></div>

			<div class="filter-item">
				<input id='en' type="radio" name="lang" value="en" <?php if ($lang == 'en'){echo 'checked';}?>>
				<label for="en">English</label>
			</div>

			<div class="filter-item">
				<input id= 'cz' type="radio" name="lang" value="cz" <?php if ($lang == 'cz'){echo 'checked';}?>>
				<label for="cz">Čeština</label>
			</div>

			<div class="filter-item">
				<input id='ru' type="radio" name="lang" value="ru" <?php if ($lang == 'ru'){echo 'checked';}?>>
				<label for="ru">Русский</label>
			</div>

			
			<input class='filter-submit' type="submit" value="Aplikovat">

		</form>

		<form  method="GET" action="./zkusenosti.php"><input class='remove-filtr' type="submit" value='Smazat filtr'></form>
	</div>

	<div class="comments">
		<div >
				<form  class='comment-form' id="comment-form" method='POST' action="data/comments.php">
					<div class="comment-form-inline">
						<div id= 'input-left' class="comment-form-inputs">
							<label for='topic'>Topic<span class="star"> *</span>:</label>
							<input  id='topic' type="text"  name="topic" maxlength="50" placeholder="Napište topic">
						</div>
						<div id= 'input-right' class="comment-form-inputs">
							<label for='language'>Language<span class="star"> *</span>:</label>
							<select id='language' name='language' class="comment-language">
								<option value= '' selected disabled>Vyberte jazyk</option>
		                        <option value="en">English</option>
		                        <option value="cz">Čeština</option>
		                        <option value="ru">Русский</option> 

							</select>
						</div>
					</div>
					<label for="comment">Vaši historka<span class="star"> *</span>:</label>
					<textarea  id='comment' form="comment-form" name="comment" maxlength="500" placeholder="Napište svou zkušenost"></textarea>
					<input  type="submit" value="Submit">

				</form>
		</div>
		<?php if ($max_pages != 0) { ?>
			<div class="number-of-pages"><?php echo 'Current page: '.$page.' / Max pages: '.$max_pages ?> </div>

			<div class="pages-nav" >
				<?php if ($page == 1 && $max_pages > 1){ ?>

					<a class="right" href="./zkusenosti.php?p=<?php echo $page+1;if (!empty($lang)){echo '&lang='.$lang;} ?>"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></a>


				<?php } else if ($page == $max_pages && $max_pages != 1){ ?>

					<a class="left" href="./zkusenosti.php?p=<?php echo $page-1; if (!empty($lang)){echo '&lang='.$lang;} ?>"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i></a>

				<?php } else if ($page > 1){  ?>

					<a class="right" href="./zkusenosti.php?p=<?php echo $page+1; if (!empty($lang)){echo '&lang='.$lang;} ?>"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></a>


					<a class="left" href="./zkusenosti.php?p=<?php echo $page-1;  if (!empty($lang)){echo '&lang='.$lang;}?>"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i></a>

				<?php } ?>
				<div class='clear'></div>
			</div>

		<?php } ?>
		<?php 	

		foreach ($comments as $data) {
		
		?>
			<div class="comment">

					<div class="comment-top">
						<div class="comment-user"><?php echo $data['username'] ?></div>
						<div class="comment-topic"><?php echo $data['topic'] ?></div>
						<div class="comment-time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $data['cas'] ?></div>
					</div>

					<div class="comment-text"> <?php  echo $data['comment'] ?></div>

			</div>

			<?php } ?>

				


	</div>
</div>
<script > 
    window.onload = function () {
        let comment_form = document.getElementById("comment-form");
        bind_events(comment_form);
    }
</script>
<?php 
	include 'footer.php'
?>