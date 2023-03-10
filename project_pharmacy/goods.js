$(document).ready(function () {
  $("#insert_to_stock").click(function () {
    // console.log("aaaaa");

    var goods_id = $(this).attr("data-id");

    Swal.fire({
      title: "คุณต้องการนำเข้าสต็อกหรือไม่",
      text: "กรุณาใส่เลขล็อต",
      icon: "warning",
      input: "text",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ใช่ ฉันต้องการนำเข้าสต็อก",
      cancelButtonText: "ยกเลิก",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "goods_stock.php",
          method: "POST",
          dataType: "json",
          data: {
            goods_id: goods_id,
            product_lot: result.value,
          },
          success: function (data) {
            $.each(data, function (key, val) {
              if (val["status"] == "YES") {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "นำเข้าสต็อกเรียบร้อยเมื่อเวลา" + val["Date"],
                  showConfirmButton: false,
                  timer: 1500,
                });
                location.reload();
              }
            });
          },
        });
      } else if (result.value == "") {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "กรุณาใส่เลขล็อตก่อน",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  });

  $("#container").on("click" , "#dalete_goods" , function(){
    var goods_id = $(this).attr("data-id");
    Swal.fire({
      title: 'คุณต้องการส่งคืนหรือไม่',
      text: "ส่งคืนแล้วจะไม่สามารถเปลี่ยนกลับได้อีก",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ต้องการส่งคืน',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "goods_delete.php",
          method: "POST",
          data: {
            goods_id : goods_id , 
          },
          success: function (data) {
            Swal.fire("ทำการส่งคืน", "", "success");
            location.reload();
          },
        });
      }
    })
  });
});
