<html>

	<head>

	</head>

	<body>

		<input id="user_id" />
		<input id="product_id" />

		<button id="button">
			Submit
		</button>
	</body>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script>
	
		$('#button').click(function() {

			var user_id = $('#user_id').val();
			var product_id = $('#product_id').val();

			$.ajax({
				type : 'POST',
				url : 'http://localhost:8888/action/addfavorite',
				dataType : 'JSON',
				data : {
					'user_id' : user_id,
					'product_id': product_id
				},
				success : function(response) {
		
					console.log(response)
		
				}
			});

		});

	</script>

</html>