<h2>Viewing <span class='muted'>#<?php echo $favorite->id; ?></span></h2>

<p>
	<strong>User id:</strong>
	<?php echo $favorite->user_id; ?></p>
<p>
	<strong>Product id:</strong>
	<?php echo $favorite->product_id; ?></p>

<?php echo Html::anchor('favorite/edit/'.$favorite->id, 'Edit'); ?> |
<?php echo Html::anchor('favorite', 'Back'); ?>