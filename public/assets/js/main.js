$('#users-signup-submit').click(function() {

	var username = $('#users-signup-username').val();
	var email = $('#users-signup-email').val();
	var password = $('#users-signup-password').val();
	var confirmPassword = $('#users-signup-confirm-password').val();
	// validate the variable
	var valid = true;

	
	if (username.length == 0) {
		valid = false;
		// show the user an error
	}
	if (email.length == 0) {
		valid = false;
		// show the user an error
	}
	if (password.length > 0 && pass.length < 6) {
		valid = false;
		// show the user an error
	}
	if (confirmPass.length > 0 && confirmPass.length < 6) {
		valid = false;
		var errorHtml = '<span class="error-signup">Password must be at least 6 characters long.</br></span>';
		$(errorHtml).appendTo('.errors');
		return;
	}

	if (password != confirmPass) {
		valid = false;
		//Show the user an error
	}

	if (!valid) {
		var errorHtml = '<span class="error-signup">Please fill out the form completely.</br></span>';
		$(errorHtml).appendTo('.errors');
		return;
	}

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
			if (response.success) {
				window.location = document.referrer;
			}
		}
	});
});

$('#users-login-submit').click(function() {

	var username = $('#users-login-username').val();
	var password = $('#users-login-password').val();

	var valid = true;

	if (username.length == 0) {
		valid = false;
		// show the user an error
	}

	if (password.length < 6) {
		valid = false;
		// show the user an error
	}

	if (!valid) {
		var errorHtml = '<span class="error-login">Incorrect username or password.</br></span>';
		$(errorHtml).insertAfter('.login');

		return;
	}

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
	var item_id = $('#cupcake-details-id').val();

	$.ajax({
		url : "/action/addToCart",
		type : "post",
		dataType : "json",
		data : {
			'item_id' : item_id
		},
		success : function(response) {
			if (response.error) {
				alert("There was an issue adding this item to your cart. Please refresh and try again.");
			} else {
				alert("Item has been added successfully!");
			}
		}
	});

});




// Hugo added this
// favorites added to cart 
//===============================
$(".favorites-add-to-cart").click(function(){
	var product_id = $(".cupcake-favorite-id").val();
	console.log(product_id);
	
	$.ajax({
		url:'action/addToCart',
		type: 'post',
		dataType: 'json', 
		data:{
			'item_id' : product_id
		}, 
		success : function(response) {
			if (response.error) {
				alert("There was an issue adding this item to your cart. Please refresh and try again.");
			} else {
				alert("Item has been added successfully!");
			}
		}
	});
});// end favorites added to cart
//===============================





$('.cart-remove').click(function(e) {

	var item_id = $(this).closest('.cart-item').find('.cupcake-product-id').val();
	var that = this;
	$.ajax({
		url : "/action/removeFromCart",
		type : "post",
		dataType : "json",
		data : {
			'item_id' : item_id
		},
		success : function(response) {
			$(that).closest('.cart-item').slideUp();
		}
	});

});

$('#cart-submit').click(function() {
	$.ajax({
		url : "/action/submitOrder",
		type : "post",
		dataType : "json",
		success : function(response) {
			if (response.success) {
				alert('Order Submitted');
			}
		}
	});
});

$('#details-add-to-favorites').click(function() {
	
	
	console.log(_user);
	
	$(function() {
    	$( "#dialog" ).dialog();
  	});
	
	
	var product_id = $('#cupcake-details-id').val();

	$.ajax({
		url : "/action/addFavorite",
		type : "post",
		dataType : "json",
		data : {
			'product_id' : product_id
		},
		success : function(response) {
			alert("Item has been succesfully added to favorites");
		}
	});

});



$('.favorite-remove').click(function() {
	var product_id = $(this).closest('.favorite-item').find('.cupcake-favorite-id').val();
	var that = this;

	$.ajax({
		url : "/action/removeFavorite",
		type : "post",
		dataType : "json",
		data : {
			'product_id' : product_id
		},
		success : function(response) {
			$(that).closest('.favorite-item').slideUp();
		}
	});

});
