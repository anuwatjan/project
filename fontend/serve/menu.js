$(document).ready(function () {
  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  $("#mylogin").click(function (e) {
    window.location.href = "login.php";
  });

  $("#my-cart").click(function () {
    $("#Cart_Detail_Mobile").modal("toggle");
  });

  $("#myindex").click(function (e) {
    window.location.href = "index.php";
  });




  $("#myaccount").click(function (e) {
    window.location.href = "Profile.php";
  });

  $("#myorder").click(function (e) {
    window.location.href = "myorder_all.php";
  });

  $("#mytable").click(function (e) {
    window.location.href = "dinning.php";
  });

  $("#mylogout").click(function (e) {
    Swal.fire({
      title: "Are you sure?",
      text: "Thank You For Coming See you again",
      icon: "warning",
      width: 500,
      height: 500,
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Exit",
      confirmButtonText: "Logout",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "logoutcheck.php";
      }
    });
  });


      $("#myindex2").click(function (e) {
        window.location.href = "index.php";
      });


            $("#myindex3").click(function (e) {
              window.location.href = "index.php";
            });

    $("#myregister").click(function (e) {
      window.location.href = "register.php";
    });

      
  $("#mylogout2").click(function (e) {
    Swal.fire({
      title: "Are you sure?",
      text: "Thank You For Coming See you again",
      icon: "warning",
      width: 500,
      height: 500,
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Exit",
      confirmButtonText: "Logout",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "logoutcheck.php";
      }
    });
  });


  
  $("#my-cart2").click(function () {
    $("#Cart_Detail_Mobile").modal("toggle");
  });


  $("#myaccount2").click(function (e) {
    window.location.href = "Profile.php";
  });

  $("#myorder2").click(function (e) {
    window.location.href = "myorder_all.php";
  });

  $("#mytable2").click(function (e) {
    window.location.href = "dinning.php";
  });

  $("#mylogin2").click(function (e) {
    window.location.href = "login.php";
  });



  // menu mobile
  $("#menu_mobile").click(function () {
    $("#menu_mobile_view").modal("toggle");
  });
});
