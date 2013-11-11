$('#users-signup-submit').click(function(){
	
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
			console.log(response);
		}
		
	});
	
});

$('#users-login-submit').click(function(){

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
			console.log(response);
		}
		
	});
	
});




$('#header-logout').click(function(){
	
	console.log('log out');
	return;
	
	var item_id = $('').val();
	
	$.ajax({
		url : "/action/logout",
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




$('#details-add-to-cart').click(function(){
	
	console.log('add to cart');
	return;
	
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




$('#cart-remove').click(function(){
	
	console.log('log out');
	return;
	
	var item_id = $('').val();
	
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
	
});




$('#cart-submit').click(function(){
	
	console.log('log out');
	return;
	
	var item_id = $('').val();
	
	$.ajax({
		url : "/action/submitOrder",
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




$('#details-add-to-favorites').click(function(){
	
	console.log('add to faves');
	return;
	
	var item_id = $('').val();
	
	$.ajax({
		url : "/action/addFavorite",
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