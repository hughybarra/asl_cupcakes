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
	

	<span id="details-add-to-favorites" class="button-submit">Add to favorites</span>
	<span id="details-add-to-cart" class="button-submit">Add to cart</span>
	
	<div id="reviews">
		<h2>Reviews</h2>
		<span>See what others have to say about this patricular cupcake.</span></br>
		<?php foreach($reviews as $review) : ?>
			<span>USERNAME GOES HERE</span>
			<p><?php echo($review['user_review']); ?></p>
			</hr>
		<?php endforeach ?>
	</div>
</div>


<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>