<h1>Shopping Cart</h1>
<div class="shopping-cart">
	<div id="cart">
		<h2>Total</h2><br/>
		<span> $ <?php echo  $total = Session::get("total"); ?> </span><br/>
		<button id="cart-submit" class="button-cta">Checkout</button>
	</div>
</div>
<div class="cart-items">
	
	<?php foreach ($cart as $item): ?>
		
	<div class="cart-item">
		<input type="hidden" class="cupcake-product-id" value="<?php echo $item['id']; ?>" />
		<div class="cupcake-thumb">
			<img src="/assets/img/cupcakes/<?php echo $item['image_path']; ?>.png">
		</div>
		<div class="cupcake-cart-info">
			<h2><?php echo $item['name']; ?></h2>
			<br />
			<span>Price</span>
			<span>$<?php echo $item['price']; ?></span>
			<br />
			<span>Quantity</span>
			<input type="number" name="quantity" min="1" max="36" value="<?php echo $item['quantity']; ?>">
			<br />
			<button class="cart-remove button-submit">Remove From Cart</button>
		</div>
	</div>
	
	<?php endforeach; ?>
	
</div>

