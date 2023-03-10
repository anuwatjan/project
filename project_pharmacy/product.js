$(document).ready(function () {
  $(".container").on("click", "#delete_stock", function () {
    var stock_id = $(this).attr("data-id");
    Swal.fire({
      title: 'คุณต้องการลบสต็อกนี้หรือไม่',
      text: "ลบแล้วจะไม่สามารถเปลี่ยนกลับได้อีก",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่ ต้องการลบ',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "product_stock_delete.php",
          method: "POST",
          dataType: "json",
          data: {
            stock_id: stock_id,
          },
          success: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'ลบสต็อกนี้แล้ว',
              showConfirmButton: false,
              timer: 1500
            })
            setTimeout(function () {
              location.reload();
           },3000); 
          },
        });
      }
    })
  });
  $("#emp-insert_product").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: "product_insert_sql.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        let persontt = $.parseJSON(data);
        $.each(persontt, function (key, val) {
          if (val["status"] == "YES") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "บันทึกเรียบร้อย",
              showConfirmButton: false,
              timer: 1500,
            });
            window.location.href = "?page=product";
          } else if (val["status"] == "NOPRICE") {
            Swal.fire({
              position: "center",
              icon: "warning",
              title: "ราคาขายน้อยกว่าราคาทุนไม่ได้",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "ผิดพลาด",
              showConfirmButton: false,
              timer: 1500,
            });
          }
        });
      },
    });
  });
  $("#container").on("click", "#delete", function () {
    var product_id = $(this).attr("data-id");
    console.log(product_id);
    Swal.fire({
      title: "คุณต้องการลบหรือไม่?",
      text: "ลบแล้วไม่สามารถเปลี่ยนกลับได้อีก",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ใช่ ฉันต้องการลบ",
      cancelButtonText: "ยกเลิก",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "product_delete.php",
          method: "POST",
          data: {
            product_id: product_id,
          },
          success: function (data) {
            Swal.fire("ลบเรียบร้อย", "", "success");
            location.reload();
          },
        });
      }
    });
  });
});
