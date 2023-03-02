$(document).ready(function () {
  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  $("#profile").click(function () {
    window.location.href = "Mobile/profile_edit.php";
  });

  $("#email").click(function () {
    window.location.href = "Mobile/email_edit.php";
  });

  $("#clickmodaladdress1").on("click", function () {
    console.log("เริ่มต้นแสดงฟอร์มที่อยู่");
    $("#modal_address1").modal("toggle");
  });

  $("#insert_address1").on("submit", function (event) {
    event.preventDefault();
    console.log("เริ่มต้นการเพิ่มที่อยู่");
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: "./serve/Checkout_Insert_Add_First.php",

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

  $("#password").click(function () {
    window.location.href = "Mobile/password_edit.php";
  });
  $("#phone").click(function () {
    window.location.href = "Mobile/phone_edit.php";
  });

  $("#myindex").click(function (e) {
    window.location.href = "../Profile.php";
  });

  $("#myindex11").click(function (e) {
    window.location.href = "Profile.php";
  });

  $(document).on("submit", "#emp-UpdateForm", function (e) {
    e.preventDefault();
    $.ajax({
      url: "../serve/profile_update.php",
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
          window.location.href = "../Profile.php";
        });
      },
      error: function () {},
    });
  });

  $(document).on("submit", "#emp-UpdateForm_email", function (e) {
    e.preventDefault();
    $.ajax({
      url: "../serve/profile_update.php",
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

        $("#emp-UpdateForm_email")[0].reset();
        $("body").fadeOut("slow", function () {
          $("body").fadeOut("slow");
          window.location.href = "../Profile.php";
        });
      },
      error: function () {},
    });
  });

  $("#emp-SaveFormPassword").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData($(this)[0]);

    console.log(formData);

    $.ajax({
      url: "../serve/change_password.php",
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

  $(document).on("submit", "#emp-UpdateForm_phone", function (e) {
    e.preventDefault();
    $.ajax({
      url: "../serve/profile_update.php",
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

        $("#emp-UpdateForm_phone")[0].reset();
        $("body").fadeOut("slow", function () {
          $("body").fadeOut("slow");
          window.location.href = "../Profile.php";
        });
      },
      error: function () {},
    });
  });
});
