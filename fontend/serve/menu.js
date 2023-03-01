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
});
