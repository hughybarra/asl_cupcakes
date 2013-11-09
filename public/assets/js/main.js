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



$('#details-add-to-cart').click(function(){
	
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
	})
	
})


/*
$('').click(function(){
	
	
})
*/