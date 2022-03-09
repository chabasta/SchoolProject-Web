<?php
	$title = 'Spolecnosti'; 
	$file= basename(__FILE__);
	include 'header.php';

?>

<div class="groups">
  <div class="group-item">
    <div class="group-image">
      <img src="images/casino.jpg" alt="casino">
    </div>
    <div class="group-title">Casino</div>
    <div class="group-short-desc">Nejlepší kasino na světě, zahrajte si ho, nebudete litovat, stanete se milionářem.</div>
    <div class="group-button">
      <button data-modal="modal1">More...</button>
    </div>
  </div>
  <div class="group-item">
    <div class="group-image">
      <img src="images/hazardni_hry.jpg" alt="casino">
    </div>
    <div class="group-title">Klub hazarnich her</div>
    <div class="group-short-desc">Zahrajte si svou oblíbenou hru s dobrou společností</div>
    <div class="group-button">
      <button data-modal="modal2">More...</button>
    </div>
  </div>
  <div class="group-item">
    <div class="group-image">
      <img src="images/loterie.jpg" alt="casino">
    </div>
    <div class="group-title">Loterie</div>
    <div class="group-short-desc">Vyhrajte telefon nebo byt, vše záleží na vašem úspěchu</div>
    <div class="group-button">
      <button data-modal="modal3">More...</button>
    </div>
  </div>
</div>

<div id="modal1" class="group-modal">
  <div class="modal-text">
    Casino Azino 777 je jedním z klubů Azino provozovaných společností Victory777. Společnost působí legálně na základě oficiální licence vydané Nizozemskými Antilskými komisemi. Některé země pravidelně blokují virtuální kasina, takže pokud nemáte přímý přístup k Azino777, zrcadlo vám pomůže tento blok obejít a znovu si užít své oblíbené hry.
  </div>
  <div class="modal-btn">
    <button data-modal="modal1">Close</button>
  </div>
</div>

<div id="modal2" class="group-modal">
  <div class="modal-text">Číselná loterie, Peněžitá/věcná loterie, Okamžitá loterie, Totalizátorová hra, Bingo, Tombola, Turnaj malého rozsahu</div>
  <div class="modal-btn">
    <button data-modal="modal2">Close</button>
  </div>
</div>

<div id="modal3" class="group-modal">
  <div class="modal-text">
    Pokud jste vždy snili o novém autě, teď je ten správný čas. Každý může mít štěstí, protože šance jsou stejné. Stačí jít do Puškinovy ​​ulice, Kolotuškinův dům a koupit si lístek na šťastný život.
  </div>
  <div class="modal-btn">
    <button data-modal="modal3">Close</button>
  </div>
</div>

<div id="modal-overlay" class="modal-overlay"></div>

<script>
	window.onload = function () {
		let open_buttons = document.querySelectorAll(".group-button button");
		let close_buttons = document.querySelectorAll(".modal-btn button");
		buttons_events(open_buttons,close_buttons);
	}
</script>
<?php 
	include 'footer.php'
?>