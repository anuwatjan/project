$(document).ready(function () {
  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  // แก้ไขข้อมูลส่วนตัว
  $(document).on("submit", "#emp-UpdateForm", function (e) {
    e.preventDefault();
    $.ajax({
      url: "serve/profile_update.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data, key, val) {
        if (val["status"] == "YES") {
          Swal.fire({
            position: "center",
            icon: "Success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
        }

        $("#emp-UpdateForm")[0].reset();
        $("body").fadeOut("slow", function () {
          $("body").fadeOut("slow");
          window.location.href = "Profile.php";
        });
      },
      error: function () {},
    });
  });

  $("#clickmodaladdress").on("click", function () {
    console.log("เริ่มต้นแสดงฟอร์มที่อยู่");
    $("#modal_address").modal("toggle");
  });

  $("#insert_address").on("submit", function (event) {
    event.preventDefault();
    console.log("เริ่มต้นการเพิ่มที่อยู่");
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: "serve/Checkout_Insert_Add_First.php",

      method: "POST",

      data: formData,

      processData: false,

      contentType: false,

      success: function (data) {
        let persontt = $.parseJSON(data);

        $.each(persontt, function (key, val) {
          console.log(data);

          if (val["status"] == "YES") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "YES SAVED!",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Your Not work has been saved",
              showConfirmButton: false,
              timer: 1500,
            });
          }

          $("#modal_address").modal("hide");

          location.reload();
        });
      },
    });
  });

  $(".clickdelete_addressid").on("click", function () {
    var cusa_id = $(this).attr("data-id");
    console.log(cusa_id);
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Delete Address!",
      cancelButtonText: "Exit!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "serve/Delete_address.php",
          type: "post",
          data: {
            cusa_id: cusa_id,
          },
          dataType: "json",
          success: function (data) {
            console.log(data);
            $.each(data, function (key, val) {
              if (val["status"] == "YES") {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "Success",
                  showConfirmButton: false,
                  timer: 1500,
                });
                location.reload();
              } else {
                Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "error",
                  showConfirmButton: false,
                  timer: 1500,
                });
                location.reload();
              }
            });
          },
        });
      }
    });
  });

  $(document).on("submit", "#edit_address", function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",

      url: "serve/update_address.php",

      data: new FormData(this),

      contentType: false,

      cache: false,

      processData: false,

      success: function (data) {
        // var aa = document.getElementById("status").innerHTML = data[0];

        Swal.fire({
          position: "center",
          icon: "success",
          title: "Successfully Saved ! ",
          showConfirmButton: false,
          timer: 5000,
        });

        window.history.go(-1);

        //   $("#dis").fadeOut();
        //   $("#dis").fadeIn("slow", function() {
        //       $("#dis").html(
        //           '<div class="alert alert-primary">Successfully Saved</div>'
        //       );
        //   });
      },
    });
  });

  $("#emp-SaveFormPassword").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData($(this)[0]);

    console.log(formData);

    $.ajax({
      url: "serve/change_password.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log(data);

        let persontt = $.parseJSON(data);

        $.each(persontt, function (key, val) {
          if (val["status"] == "YES") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "OK SAVE",
              showConfirmButton: false,
              timer: 1500,
            });
            $("#emp-SaveFormPassword").trigger("reset");
          } else if (val["status"] == "NO") {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "NOT SAVE",
              showConfirmButton: false,
              timer: 1500,
            });
          } else if (val["status"] == "NOM") {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "PASSWORD NOT MATCH!",
              showConfirmButton: false,
              timer: 1500,
            });
          } else if (val["status"] == "NOPT") {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Original Password Is Wrong!",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Incorrect Username",
              showConfirmButton: false,
              timer: 1500,
            });
          }
        });
      },
    });
  });

  // order
  // $("#btnSearchOrder").click(function () {
  //   $.ajax({
  //     url: "serve/searchorder.php",
  //     type: "post",
  //     data: {
  //       startdate: $("#itemstartdate").val(),
  //       enddate: $("#itemenddate").val(),
  //      },
  //     // dataType: "json",
  //     success: function (data) {
  //       $htmls = "";
  //       console.log(data);
  //       $.each(data, function (key, val) {});
  //     },
  //   });
  // });
  
});
