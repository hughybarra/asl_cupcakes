$('#users-signup-submit').click(function() {

	var username = $('#users-signup-username').val();
	var email = $('#users-signup-email').val();
	var password = $('#users-signup-password').val();

	$.ajax({
		url : "/action/signup",
		type : "post",
		dataType : "json",
		data : {
			'username' : username,
			'email' : email,
			'password' : password
		},
		success : function(response) {
			if(response.success){
				window.location = document.referrer;
			}
		}
	});

});

$('#users-login-submit').click(function() {

	var username = $('#users-login-username').val();
	var password = $('#users-login-password').val();

	$.ajax({
		url : "/action/login",
		type : "post",
		dataType : "json",
		data : {
			'username' : username,
			'password' : password
		},
		success : function(response) {
			if (response.success) {
				window.location = document.referrer;
			}
		}
	});

});

$('#header-logout').click(function() {

	console.log('log out');

	$.ajax({
		url : "/action/logout",
		type : "post",
		dataType : "json",
		success : function(response) {
			if (response.success) {
				window.location = '/users';
			}
		}
	});

});

$('#details-add-to-cart').click(function() {

	console.log('add to cart');
	return;
	//WHAT IS THE ITEM ID
	var item_id = $('').val();

	$.ajax({
		url : "/action/addToCart",
		type : "post",
		dataType : "json",
		data : {
			'item_id' : item_id
		},
		success : function(response) {
			console.log(response);
		}
	});

});

$('.cart-remove').click(function(e) {
	console.log('dick');
	//WHAT IS THE ITEM IDs
	var item_id = $(this).closest.val();

	$.ajax({
		url : "/action/removeFromCart",
		type : "post",
		dataType : "json",
		data : {
			'item_id' : item_id
		},
		success : function(response) {
			console.log(response);
		}
	});
	
	return false;

});

$('#cart-submit').click(function() {

	console.log('log out');
	return;

	$.ajax({
		url : "/action/submitOrder",
		type : "post",
		dataType : "json",
		success : function(response) {
			if(response.success){
				
			}
		}
	});

});

$('#details-add-to-favorites').click(function() {

	console.log('add to faves');
	return;
	//WHAT IS PRODUCT ID?
	var product_id = $('').val();

	$.ajax({
		url : "/action/addFavorite",
		type : "post",
		dataType : "json",
		data : {
			'product_id' : product_id
		},
		success : function(response) {
			console.log(response);
		}
	});

}); 

$('#favorite-remove').click(function() {

	console.log('removed from faves');
	return;
	//WHAT IS PRODUCT ID?
	var product_id = $('').val();

	$.ajax({
		url : "/action/addFavorite",
		type : "post",
		dataType : "json",
		data : {
			'product_id' : product_id
		},
		success : function(response) {
			console.log(response);
		}
	});

});
