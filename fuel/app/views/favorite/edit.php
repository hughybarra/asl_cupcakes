<h2>Editing <span class='muted'>Favorite</span></h2>
<br>

<?php echo render('favorite/_form'); ?>
<p>
	<?php echo Html::anchor('favorite/view/'.$favorite->id, 'View'); ?> |
	<?php echo Html::anchor('favorite', 'Back'); ?></p>
