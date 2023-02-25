$(document).ready(function () {

	$("#search").click(function() {
		console.log('search');
		var stasdate = $('#stasdate').val();
		var stopdate = $('#stopdate').val();
        

            window.location.href = "?stasdate="+stasdate+"&stopdate="+stopdate;
		



		

  });   

    $("#mysfutton").on("click",".checkout",function(){

		var id = $(this).attr("id");
		var id = id;
		var parent = $(this).parent("td").parent("tr");

		console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#DC3545',
            confirmButtonText: 'CHECK OUT!',
            cancelButtonText: 'CANCEL!',
        }).then((result) => {
			if (result.isConfirmed) {
			$.post('updcheckout.php', {'id':id}, function(data){

			  Swal.fire(
				'CHECKED OUT!',
				'Your file has been checked in.',
				'success'
			  )

			})

			setTimeout(function () {
			
            parent.fadeOut('slow');
			location.reload();
			return false;

			}, 2000);
			}
		
		  })

	});

    
	

});