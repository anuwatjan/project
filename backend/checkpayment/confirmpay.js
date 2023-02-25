// JavaScript Document

$(document).ready(function () {

    $("#confirm").click(function () {
        
        var show_po_id = $("#show_po_id").html();

        console.log(show_po_id);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FD7E14',
            cancelButtonColor: '#DC3545',
            confirmButtonText: 'CONFIRM!',
            cancelButtonText: 'CANCEL!',
        }).then((result) => {
			if (result.isConfirmed) {
			$.post('update.php', {'show_po_id':show_po_id}, function(data){

			  Swal.fire(
				'CONFIRMED!',
				'Your payment has been confirmed.',
				'success'
			  )

			})

			setTimeout(function () {
            window.location.href="index.php";
        
			return false;
            
			}, 2000);
			}
		
		  })

	});
    

    $("#cancel").click(function () {
        
        var show_po_id = $("#show_po_id").html();

        console.log(show_po_id);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FD7E14',
            cancelButtonColor: '#DC3545',
            confirmButtonText: 'CONFIRM!',
            cancelButtonText: 'CANCEL!',
        }).then((result) => {
			if (result.isConfirmed) {
			$.post('updatecc.php', {'show_po_id':show_po_id}, function(data){

			  Swal.fire(
				'CANCELED!',
				'Your payment has been canceled.',
				'success'
			  )

			})

			setTimeout(function () {
            window.location.href="index.php";
        
			return false;
            
			}, 2000);
			}
		
		  })

	});


  

});


    
