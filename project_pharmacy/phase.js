$(document).ready(function () {
  $("#showmodal").click(function () {
    $(".showmodaldetail").modal("show");
  });

	$("[name=clickfiter]").on("click", function (event) {
    event.preventDefault();
    $(this).hide().show(); //hide first and then show here
  });




 

  $("#container").on("click", "#deletepo", function () {
    var po_id = $(this).attr("data-id");
    Swal.fire({
      title: "คุณต้องการยกเลิกหรือไม่",
      text: "ยกเลิกแล้วไม่สามารถเปลี่ยนกลับได้อีก",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ใช่ ฉันต้องการยกเลิก",
      cancelButtonText: "ยกเลิก",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "phase_delete.php",
          method: "POST",
          data: {
            po_id: po_id,
          },
          success: function (data) {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "ยกเลิกเรียบร้อย",
              showConfirmButton: false,
              timer: 1500,
            });
            location.reload();
           
          },
        });
      }
    });
  });

  $("#container").on("click", "#updatepo", function () {
    var po_id = $(this).attr("data-id");
    Swal.fire({
        title: "คุณต้องการสั่งซื้อหรือไม่",
        text: "สั่งซื้อแล้วสามารถยกเลิกได้ภายหลัง",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ใช่ ฉันต้องการสั่งซื้อ",
        cancelButtonText: "ยกเลิก",
      }).then((result) => {
        $.ajax({
            url: "phase_manager_sql.php",
            method: "POST",
            data: {
              po_id: po_id,
            },
            success: function (data) {

                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "ยืนยันการสั่งซื้อเรียบร้อย",
                  showConfirmButton: false,
                  timer: 1500,
                });

                location.reload();
            
            },
          });
      })
    })

   
  });

