$('#subscription-submit').click(function(){
	var formData = $('#subscription-form').serialize();

	request =$.ajax({
				type : "POST",
				url  : "/register.php",
				dataType : "text",
				data : formData
		})
		request.done(function(response,textStatus,jqXHR){
			if(response.trim()=="ok"){
				showSuccessMessage('Thanks for being part of CuponZa. we will update you along the way');
			}else{
				showErrorMessage(response);
			}
			
		});

		request.fail(function(response,textStatus,jqXHR){
			showErrorMessage('We have an internal error please write directly to uri@cuponza.co');
		});

});

function showErrorMessage(text){
	$.msg({
  			bgPath : '/img/',
  			content : text,
  			css     : {
  				color: '#a94442',
  				background: '#f2dede'
  					},
  			autoUnblock : true		
		  });
}
function showSuccessMessage(text){
	$.msg({
  			bgPath : '/img/',
  			content : text,
  			css     : {
  				color: '#3c763d',
  				background: '#dff0d8'
  					},
  			autoUnblock : false		
		  });
}