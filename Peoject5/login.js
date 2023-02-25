$(document).ready(function () {
  console.log("----------------- เริ่มต้นการทำงาน ---------------------");

  $("#emp-login").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: "logincheck.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log(data);
        let persontt = $.parseJSON(data);
        $.each(persontt, function (key, val) {
          if (val["status"] == "YES") {
            if (val["role"] == "เภสัชกร") {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "ยินดีต้อนรับ เภสัชกร",
                showConfirmButton: false,
                timer: 1500,
              });
              window.location.href = "index.php";
            } else if (val["role"] == "ผู้ดูแลระบบ") {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "ยินดีต้อนรับ ผู้ดูแลระบบ",
                showConfirmButton: false,
                timer: 1500,
              });
              window.location.href = "index.php";
            } else if (val["role"] == "เจ้าของกิจการ") {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "ยินดีต้อนรับ เจ้าของกิจการ",
                showConfirmButton: false,
                timer: 1500,
              });
              window.location.href = "index.php";
            }
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
});
