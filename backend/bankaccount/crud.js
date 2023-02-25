// JavaScript Document

$(document).ready(function () {


    $("#clickshowmodal , #clickshowmodal1").click(function(){

       $("#showmodal").modal("toggle");
       
       var bac_id = $(this).attr("data-id");

       console.log(bac_id) ; 

       $.ajax({

        url: "showdata.php",

        type: "post",

        data: { bac_id : bac_id  },

        dataType : "json" ,

        success: function (data) {

             console.log(data);

            $.each(data, function (key, val) {
                var bac_id = val['bac_id']; 
                var bac_mem_name = val['bac_mem_name']; 
                var bac_number_mem = val['bac_number_mem'];
                var bac_name = val['bac_name'];
                var bak_id = val['bak_id'];
                var bak_name = val['bak_name'];
                console.log(bac_mem_name);
            $("#bac_id").val(bac_id);
            $("#bac_mem_name").val(bac_mem_name);
            $("#bac_number_mem").val(bac_number_mem);
            $("#bac_name").val(bac_name);
            $("#bak_id").val(bak_id);
            $("#bak_name").val(bak_name);
            })

        }

       })

    });


    $("#emp-SaveForm1").on("submit", function (event) {
		event.preventDefault(); //prevent default submitting
		var formData = new FormData($(this)[0]);                        
		$.ajax({
			url: "create.php",
			type: "post",
			data: formData,
			processData: false, //Not to process data
			contentType: false, //Not to set contentType
			success: function (data) {
					let persontt = $.parseJSON(data);
					 
					   
					$.each(persontt, function(key,vi){
						console.log(data);
						if( vi['in'] == 'YES' ){
							
							Swal.fire({
								position: 'center',
								icon: 'success',
								title: 'Successfully Saved',
								showConfirmButton: false,
								timer: 1500
							  })   
							window.location.href="index.php"; 
							
						}
					});
			}
		});
	
	
	});


    $("#mysfutton").on("click",".delete",function(){
  
		  
        var id = $(this).attr("id");
        var id = id;
        var parent = $(this).parent("td").parent("tr");

        console.log(id);

        Swal.fire({
            title: 'Are You Sure!!',
            text: "To delete ID no  "+ id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B59DFA',
            cancelButtonColor: '#ff8080',
            confirmButtonText: 'YES',
            cancelButtonText: 'CANCEL'
          }).then((result) => {

            if (result.isConfirmed) {

            $.post('delete.php', {'id':id}, function(data){


              Swal.fire(
                'DELETED!',
                'Your file has been deleted.',
                'success'
              )

            })

            parent.fadeOut('slow');
            location.reload();
            return false;
            
            }

          })


        
        
    });


        


        

       

     

       

    




});
