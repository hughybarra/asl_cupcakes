<h1>Favorites</h1>

<div class="favorite-items">
	
	<?php foreach ($favorites as $item): ?>
		
	<div class="favorite-item">
		<input id="cupcake-favorite-id" type="hidden" value="<?php echo $item -> id?>" />
		<div class="cupcake-thumb">
			<img src="/assets/img/cupcakes/<?php echo $item['image_path']; ?>.png">
		</div>
		<div class="cupcake-favorite-info">
			<span class="cupcake-name"><?php echo $item['name']; ?></span>
			<span>Price</span>
			<span>$<?php echo $item['price']; ?></span>
			<span>Type</span>
			<span><?php echo $item['quantity']; ?></span>
			<a id="favorite-remove"<? echo $item["id"] ?>">remove favorite</a>
		</div>
	
	</div>
	
	<?php endforeach; ?>
	
</div>