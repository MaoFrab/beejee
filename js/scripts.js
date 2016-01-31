$( document ).ready(function() {
	$('#form_submit').click(function(event) {
		$.ajax({
		  	type: 'POST',
		  	url: 'post/create_post',
		  	data: $('#form_post').serialize(),
		  	success: function(data){
		  		//...
		  	}
		});


	});



	// $('#validate_post').click(function(event) {
	// 	$.ajax({
	// 	  	type: 'POST',
	// 	  	url: 'admin/post_set_valid',
	// 	  	data: $('#form_validate').serialize(),
	// 	  	success: function(data){
	// 	  		//...
	// 	  		console.log($('#validate_post').parent().parent().parent().hasClass("success"));
	// 	  	}
	// 	});


	// });

});