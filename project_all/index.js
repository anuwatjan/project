$(document).ready(function () {



    $(".project_click").on("click", function () {
      var link = $(this).attr("data-id");
        console.log(link);
      window.location.href = '/project/'+link+'';
    });


});
