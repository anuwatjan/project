// JavaScript Document

$(document).ready(function(){

	$(document).on('submit', '#emp-SaveForm1', function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updateprofile.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			processData:false,
			success: function(data){
				$("#dis").fadeOut();
				$("#dis").fadeIn('slow', function(){
					$("#dis").html('<div class="alert alert-primary">Successfully Saved</div>');
		
				});

				
				
				
				
		    },
		  	error: function(){
	    	} 	        
	   });
	});


	

	
});
