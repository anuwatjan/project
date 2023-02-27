$(document).ready(function () {
  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  $("#mycart").click(function (e) {
    window.location.href = "index.php";
  });

  $("#myorder").click(function (e) {
    window.location.href = "myorder_all.php";
  });

  $("#mylogin").click(function (e) {
    window.location.href = "login.php";
  });

  $("#myregister").click(function (e) {
    window.location.href = "register.php";
  });

  $("#myindex").click(function (e) {
    window.location.href = "index.php";
  });

  $("#myreserve").click(function (e) {
    window.location.href = "serve.php";
  });

  $("#mytable").click(function (e) {
    window.location.href = "dinning.php";
  });

  $("#myaccount").click(function (e) {
    window.location.href = "Profile.php";
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
});
