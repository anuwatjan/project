$(document).ready(function () {
  $("#logout").click(function () {
    Swal.fire({
        title: 'ต้องการออกจากระบบ ? ',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ออกจากระบบ',
        cancelButtonText: 'ยังอยู่ระบบต่อไป'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "logout.php",
                method: "POST",
                data: {
               
                },
                success: function (data) {
                  Swal.fire("ลบเรียบร้อย", "", "success");
                  location.reload();
                },
              });
        }
      })
  });
});

