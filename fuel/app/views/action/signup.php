<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('action/logout','Logout');?></li>
	<li class='<?php echo Arr::get($subnav, "signup" ); ?>'><?php echo Html::anchor('action/signup','Signup');?></li>
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('action/login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "addToCart" ); ?>'><?php echo Html::anchor('action/addToCart','AddToCart');?></li>
	<li class='<?php echo Arr::get($subnav, "removeFromCart" ); ?>'><?php echo Html::anchor('action/removeFromCart','RemoveFromCart');?></li>
	<li class='<?php echo Arr::get($subnav, "addQuantity" ); ?>'><?php echo Html::anchor('action/addQuantity','AddQuantity');?></li>
	<li class='<?php echo Arr::get($subnav, "reduceQuantity" ); ?>'><?php echo Html::anchor('action/reduceQuantity','ReduceQuantity');?></li>
	<li class='<?php echo Arr::get($subnav, "submitOrder" ); ?>'><?php echo Html::anchor('action/submitOrder','SubmitOrder');?></li>

</ul>
<p>Signup</p>