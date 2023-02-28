$(document).ready(function () {
    console.log("----------------- เริ่มต้นการทำงาน ---------------------");
  
    $(document).bind("contextmenu", function (e) {
      e.preventDefault();
    });
  
    $(document).bind("selectstart", function (e) {
      e.preventDefault();
    });

    // กดปุ่มล็อคอินแล้วไปฟังก์ชั่น
    $("#ok_login").click(function (e) {
        e.preventDefault();
        var urls = "index.php";
        logins(urls);
      });

    // ฟังก์ชั่นตรวจสอบการล็อคอิน
    function logins(urls) {
        var cus_username = $("#cus_username").val();
        var cus_password = $(".cus_password").val();
        if (cus_username != "" && cus_password != "") {
          console.log(cus_username + cus_password);
          $.post(
            "serve/Login_Check.php",
            {
              cus_username: cus_username,
              cus_password: cus_password,
            },
            function (response) {
              let present = $.parseJSON(response);
              $.each(present, function (key, val) {
                if (val["status"] == "YES") {
                  location = urls;
                } else if (val["status"] == "NO") {
                  Swal.fire({
                    icon: "error",
                    title: "Username Or Password Faild!!",
                    text: "",
                  });
                }
              });
            }
          );
        } else {
          Swal.fire({
            icon: "error",
            title: "Please enter all information!!",
            text: "",
          });
        }
    }

    // lมัครสมาชิก
    $("#emp-SaveRegister").on("submit", function (e) {
      e.preventDefault();
      var formData = new FormData($(this)[0]);
      console.log(formData);
      $.ajax({
        url: "serve/Register_Check.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          console.log(data);
          let persontt = $.parseJSON(data);
          $.each(persontt, function (key, val) {
            console.log(data);
            if (val["status"] == "YES") {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "Thank you Save Success",
                showConfirmButton: false,
                timer: 2000,
              });
              window.location.href = "./login.php";
            } else if (val["status"] == "NOS") {
              Swal.fire({
                position: "center",
                icon: "warning",
                title: "This email has already been registered, please login.",
                showConfirmButton: false,
                timer: 2000,
              });
            } else if (val["status"] == "NO") {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Dont Save.",
                showConfirmButton: false,
                timer: 2000,
              });
            }
          });
        },
      });
    });
  
});