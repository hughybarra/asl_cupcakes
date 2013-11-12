<div class="cupcake-detail-img">
	<img src="/assets/img/cupcakes/<?php echo $product -> image_path?>.png">
</div>


<div class="cupcake-detail-info">
	<input id="cupcake-details-id" type="hidden" value="<?php echo $product -> id?>" />
	<h1><?php echo $product -> name?></h1>
	<span>Price: $<?php echo $product -> price?></span><br>
	<span><?php echo $product -> product_type?></span><br>
	<span><?php echo $product -> product_description?></span><br>
	<div>
		<span>Quantity:</span>
		<!-- hugo made changes here -->
		<input id="cart-quantity" type="number" name="quantity" min="1" max="36" value="1">
	</div>

	<!-- LOGGED IN CHECK CONDITION HERE -->
	<!-- ============================= -->
	<?php if (Session::get("user") ){ ?>
	<span id="details-add-to-favorites" class="button-submit">Add to favorites</span>
	
	<? }?>
	<!-- END CONDITIONAL -->
	<span id="details-add-to-cart" class="button-submit">Add to cart</span>
	
	<div id="reviews">
		<h2>Reviews</h2>
		<span>See what others have to say about this patricular cupcake.</span>
		</br>
		<hr />
		<?php foreach($reviews as $review) : ?>
			<span><?php echo $review['user_name']; ?></span>
			<br />
			<p><?php echo($review['user_review']); ?></p>
			<hr />
		<?php endforeach ?>
		<a class="details-add-review"></a>
	</div>
</div>


<div id="dialog" title="Review of <?php echo $product -> name?>" class="hidden">
  <textarea class="review-content">Type review here...</textarea>
  <button>Submit Review</button>
</div>
