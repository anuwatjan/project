// JavaScript Document

$(document).ready(function () {


    $("#mysfutton").on("click",".completed",function(){

        var id = $(this).attr("id");
        var id = id;
        var parent = $(this).parent("td").parent("tr");

        console.log(id);
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
            $.post('updshipping.php', {'id':id}, function(data){

              Swal.fire(
                'CONFIRMED!',
                'Your order has been already delivered.',
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
    


    $("#completed").click(function () {
       
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
				'Your order has been finished preparing food.',
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




    
