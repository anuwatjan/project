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


    
})