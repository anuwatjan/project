// JavaScript Document

$(document).ready(function(){

	$(document).on('submit', '#emp-SaveForm1', function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updatestore.php",
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

// $(document).on("submit","#emp-SaveForm1",function(event){

// 		event.preventDefault(); //prevent default submitting
// 		var formData = new FormData($(this)[0]);
// 		// console.log(formData);                        
// 		$.ajax({
// 			url: "updatestore.php",
// 			type: "post",
// 			data: formData,
// 			processData: false, //Not to process data
// 			contentType: false, //Not to set contentType
// 			success: function (data,key,vi) {
// 					// let persontt = $.parseJSON(data);
// 					console.log(data);
					   
// 					// $.each(persontt, function(key,vi){
						
// 						if(vi['in'] == "YES" ){
							
// 							console.log('ewewf');
							
// 						}
// 					// });
// 			}
// 		});
	
	
// 	});
	

	
});
