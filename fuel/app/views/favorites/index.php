<h1>Favorites</h1>

<div class="favorite-items">
	
	<?php foreach ($favorites as $item): ?>
		
	<div class="favorite-item">
		<input class="cupcake-favorite-id" type="hidden" value="<?php echo $item -> id?>" />
		<div class="cupcake-thumb">
			<img src="/assets/img/cupcakes/<?php echo $item['image_path']; ?>.png">
		</div>
		<div class="cupcake-favorite-info">
			<span class="cupcake-name"><?php echo $item['name']; ?></span><br/>
			<span>Price</span><br/>
			<span>$<?php echo $item['price']; ?></span><br/>
			<span>Type</span><br/>
			<span><?php echo $item['product_type']; ?></span><br/>
			<button class="favorite-remove button-submit">Remove From Favorites</button><br/>
			<button class="favorites-add-to-cart button-cta">Add To Cart</button><br/>
		</div>
	
	</div>
	
	<?php endforeach; ?>
	
</div>