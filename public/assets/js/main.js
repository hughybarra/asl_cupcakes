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
			if (response) {
				console.log(response);
			} else {
				//show an error
			}

		}
		
	});
	
});




/*
$('').click(function(){
	
	
})
*/