<h1>Shopping Cart</h1>
<div class="cart-items twelve columns column alpha">
	
	<?php foreach ($cart as $item): ?>
		
	<div class="cart-item">
		<input type="hidden" class="cupcake-product-id" value="<?php echo $item['id']; ?>" />
		<div class="cupcake-thumb">
			<img src="/assets/img/cupcakes/<?php echo $item['image_path']; ?>.png">
		</div>
		<div class="cupcake-cart-info six columns">
			<h2><?php echo $item['name']; ?></h2>
			<br />
			<span>Price</span>
			<span>$<?php echo $item['price']; ?></span>
			<br />
			<span>Quantity</span>
			<input type="number" name="quantity" min="1" max="36" value="<?php echo $item['quantity']; ?>">
			<br />
			<button class="cart-remove button-submit">Remove Item</button>
		</div>
	</div>
	
	<?php endforeach; ?>
	
</div>


<div class="shopping-cart four columns column omega">
	<div id="cart">
		<h2>Total</h2><br/>
		<span id="cart-total"> $ <?php echo $total; ?> </span><br/><br/>
		<button id="cart-update" class="button-submit">Update Cart</button>
		<button id="cart-submit" class="button-cta">Checkout</button>
	</div>
</div>

