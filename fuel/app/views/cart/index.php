<div class="main">
	<h1>Shopping Cart</h1>
	<div class="shopping-cart">
		<div>
			<span>Total</span>
			<span>$23.54</span>
			<a href="#" class="button-submit">Checkout</a>
		</div>
	</div>
	<div class="cart-items">
		<?php for($i = 1; $i < 9; $i++):?>
			<div class="cart-item">
				<div class="cupcake-thumb">
					<img src="/img/cupcakes/7.png">
				</div>
				<div class="cupcake-cart-info">
					<span class="cupcake-name">Cupcake Name</span>
					<span>Price</span>
					<span>$2.50</span>
					<span>Quantity</span>
					<span>2</span>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</div>