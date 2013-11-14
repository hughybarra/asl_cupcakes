$('#users-signup-submit').click(function() {

	var username = $('#users-signup-username').val();
	var email = $('#users-signup-email').val();
	var password = $('#users-signup-password').val();
	var confirmPassword = $('#users-signup-confirm-password').val();

	var valid = true;

	var regex_email = /^[\w-\._\+%]+@(?:[\w-]+\.)+[\w]{2,6}$/;
	var regex_name = /^[a-zA-Z]{4,10}$/;
	var regex_pass = /^[a-zA-Z0-9]{4,15}$/;

	if (!regex_name.test(username)) {
		valid = false;
	}
	if (!regex_email.test(email)) {
		valid = false;
	}
	if (!regex_pass.test(password)) {
		valid = false;
	}
	if (!regex_pass.test(confirmPassword)) {
		valid = false;
	}
	if (password != confirmPassword) {
		valid = false;
	}
	if (!valid) {
		var errorHtml = 'Please fill out the form completely and correctly. Be sure the check the hints in each field!</br>';
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
	}
	if (!regex_pass.test(password)) {
		valid = false;
	}
	if (!valid) {
		var errorHtml = 'Incorrect username or password. Please Try again.</br>';
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
			}else{
				alert('There was an error submitting your cart. Please refresh and try again. Hint: Make sure that you are signed in to your The Cupcake Factory or MadServ account.');
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
			if(response.success){
				alert("Item has been succesfully added to favorites");
			}else{
				alert("There was an error adding to favorites. Please refresh and try again.");
			}
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
	
	var product_id = $('#cupcake-details-id').val();
	var user_review = $('.review-content').val();
	
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



$('.details-add-review').click(function(){
	
	//set variables
	var product_id = $('#cupcake-details-id').val();
	var user_review = $('.review-content').val();

	var valid = true;
	
	if(user_review != 0){
		valid = false;
	}
	if(!valid){
		return;
	}
	
	
	$.ajax({
		url : "/action/addReview",
		type : "post",
		dataType : "json",
		data : {
			'user_review' : user_review,
	 		'product_id' : product_id
		},
		success : function(response) {
			if(response.success){
				window.location.reload();
			}else{
				alert('There was an error submitting your review. Please refresh and try again.');
			}
		}
	});
	
});

$('.cart-quantity-stepper').change(function(){
	
	var item_id = $(this).closest('.cart-item').find('.cupcake-product-id').val();
	var quantity = $(this).val();
	

	$.ajax({
		url : "/action/cartUpdate",
		type : "post",
		dataType : "json",
		data : {
			'quantity' : quantity,
	 		'item_id' : item_id
		}
	});
	
});
