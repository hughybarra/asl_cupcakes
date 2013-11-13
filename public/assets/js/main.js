$('#users-signup-submit').click(function() {

	var username = $('#users-signup-username').val();
	var email = $('#users-signup-email').val();
	var password = $('#users-signup-password').val();
	var confirmPassword = $('#users-signup-confirm-password').val();

	// validate the variable
	var valid = true;

	// hugo added this
	//==========================
	// regex vars
	var regex_email = /^[\w-\._\+%]+@(?:[\w-]+\.)+[\w]{2,6}$/;
	var regex_name = /^[a-zA-Z]{4,10}$/;
	var regex_pass = /^[a-zA-Z0-9]{4,15}$/;

	// User Name
	//======================================
	if (!regex_name.test(username)) {
		// console.log("user name invalid");
		valid = false;
	}// end username validation

	// User Email
	//======================================
	if (!regex_email.test(email)) {
		// console.log("user email invalid");
		valid = false;
	}// end email validation

	// Password 1
	//======================================
	if (!regex_pass.test(password)) {
		// console.log("password invalid");
		valid = false;
	}// end password 1 validation

	// Password 2
	//======================================
	if (!regex_pass.test(confirmPassword)) {
		// console.log("password 2 invalid");
		valid = false;
	}// end password 2 validation

	if (password != confirmPassword) {

		valid = false;
		//Show the user an error
	}

	if (!valid) {
		var errorHtml = '<span class="error-signup">Please fill out the form completely and correctly. Be sure the check the hints in each field!</br></span>';
		$(errorHtml).appendTo('.signup-errors');
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
	
	
	var regex_email = /^[\w-\._\+%]+@(?:[\w-]+\.)+[\w]{2,6}$/;
	var regex_name = /^[a-zA-Z]{4,10}$/;
	var regex_pass = /^[a-zA-Z0-9]{4,15}$/;

	var valid = true;

	if (!regex_name.test(username)) {
		valid = false;
		// show the user an error
	}

	if (!regex_pass.test(password)) {
		valid = false;
		// show the user an error
	}

	if (!valid) {
		var errorHtml = '<span class="error-login">Incorrect username or password. Please Try again.</br></span>';
		$(errorHtml).appendTo('.login-errors');

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
	var quantity = $("#cart-quantity").val();

	$.ajax({
		url : "/action/addToCart",
		type : "post",
		dataType : "json",
		data : {
			'item_id' : item_id,
			'quantity' : quantity
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
$(".favorites-add-to-cart").click(function() {

	var product_id = $(".cupcake-favorite-id").val();

	$.ajax({
		url : 'action/addToCart',
		type : 'post',
		dataType : 'json',
		data : {
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

});
// end favorites added to cart
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


$('.details-add-review').click(function(){
	
	$(function() {
		$("#dialog").dialog();
	});
	
	//set variables
	var product_id = $('#cupcake-details-id').val();
	var user_review = $('.review-content').val();
	//validate variables
	
	//Ajax call
	$.ajax({
		url : "/action/addReview",
		type : "post",
		dataType : "json",
		data : {
			'user_review' : user_review,
	 		'product_id' : product_id
		},
		success : function(response) {
			window.location.reload();
		}
	});
	
});
