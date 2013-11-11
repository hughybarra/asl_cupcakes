<h1>Shopping Cart</h1>
<div class="shopping-cart">
	<div>
		<span>Total</span>
		<span>$23.54</span>
		<a id="cart-submit" href="#" class="button-submit">Checkout</a>
	</div>
</div>
<div class="cart-items">
	
	<?php foreach ($cart as $item): ?>
		
	<div class="cart-item">
		<div class="cupcake-thumb">
			<img src="/assets/img/cupcakes/<?php echo $item['image_path']; ?>.png">
		</div>
		<div class="cupcake-cart-info">
			<span class="cupcake-name"><?php echo $item['name']; ?></span>
			<br />
			<span>Price</span>
			<span>$<?php echo $item['price']; ?></span>
			<br />
			<span>Quantity</span>
			<input type="number" name="quantity" min="1" max="36" value="<?php echo $item['quantity']; ?>">
			<br />
			<a id="cart-remove" href="#">Remove From Cart</a>
		</div>
	</div>
	
	<?php endforeach; ?>
	
</div>

