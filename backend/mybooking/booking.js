$(document).ready(function () {

	$("#search").click(function() {
		console.log('search');
		var stasdate = $('#stasdate').val();
		var stopdate = $('#stopdate').val();
        

            window.location.href = "?stasdate="+stasdate+"&stopdate="+stopdate;
		



		

  });   

    $("#mysfutton").on("click",".checkin",function(){

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
            confirmButtonText: 'CHECK IN!',
            cancelButtonText: 'CANCEL!',
        }).then((result) => {
			if (result.isConfirmed) {
			$.post('updcheckin.php', {'id':id}, function(data){

			  Swal.fire(
				'CHECKED IN!',
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

    $("#mysfutton").on("click",".cancel",function(){

		var id = $(this).attr("id");
		var id = id;
		var parent = $(this).parent("td").parent("tr");

		console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#E83E8C',
            cancelButtonColor: '#DC3545',
            confirmButtonText: 'CONFIRM CANCEL!',
            cancelButtonText: 'CANCEL!',
        }).then((result) => {
			if (result.isConfirmed) {
			$.post('updcancel.php', {'id':id}, function(data){

			  Swal.fire(
				'CANCELED!',
				'Your file has been canceled.',
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