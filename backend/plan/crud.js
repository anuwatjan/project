// JavaScript Document

$(document).ready(function(){


	$("#emp-SaveForm1").on("submit", function (event) {
		event.preventDefault(); //prevent default submitting
		var formData = new FormData($(this)[0]);          
		console.log(formData);              
		$.ajax({
			url: "create.php",
			type: "post",
			data: formData,
			processData: false,
			contentType: false, 
			success: function (data) {
			  console.log(data);
			  let persontt = $.parseJSON(data);
	
			  $.each(persontt, function (key, val) {
						
						if (val["in"] == "YES") {
						  Swal.fire({
							position: "top-end",
							icon: "success",
							title: "Save Data Successfully",
							showConfirmButton: false,
							timer: 2000,
						  });
						  
						 
	
						} 
						setTimeout(function () {
							window.location.href="index.php";
	
						   }, 2000);
					  });
					},
					
				  });
				  
				});
	
	
		
	
	
	
			
	
	});
	