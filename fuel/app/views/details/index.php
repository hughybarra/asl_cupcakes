<div class="cupcake-detail-img">
	<img src="/assets/img/cupcakes/<?php echo $product -> image_path?>.png">
</div>


<div class="cupcake-detail-info">
	<input id="cupcake-details-id" type="hidden" value="<?php echo $product -> id?>" />
	<h1><?php echo $product -> name?></h1>
	<span>$<?php echo $product -> price?></span><br>
	<span><?php echo $product -> product_type?></span><br>
	<span><?php echo $product -> product_description?></span><br>
	<div>
		<span>Quantity:</span>
		<input type="number" name="quantity" min="1" max="36" value="1">
	</div>
	

	<span id="details-add-to-favorites" class="button-submit" href="/action/addFavorite/<?php echo $product -> id ?>">Add to favorites</span>

	<span id="details-add-to-cart" class="button-submit" href="#">Add to cart</span>
</div>

<div id="reviews">
	<h2>Reviews</h2>
	<?php foreach($reviews as $review){
		echo "<h1>test</h1>"; // DELETE WHEN READY
	}
	?>
</div>