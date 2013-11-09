$('#users-login-submit').click(function(){

	var username = $('#users-login-username').val();
	var password = $('#users-login-password').val();

	ajax({
		url : "",
		type : "post",
		dataType : "json",
		data : {
			'username' : username,
			'password' : password
		},
		success : function(response) {

			console.log(response);
			if (response) {
				console.log(response);
				loadApplication();
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