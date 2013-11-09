$('#header-login').click(function(){
	
	ajax({
		url : "",
		type : "post",
		dataType : "json",
		data : {
			'username' : username,
			'password' : md5(password)
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