// JavaScript Document

$(document).ready(function() {

    $("#clickmodaltable").click(function(){

       $("#modal_table").modal("toggle");

       var res_id = $(this).attr("data-id") ; 

       $("#show_res_id").html(res_id);

       $.ajax({
        url: "showres.php",
  
        type: "post",
  
        data: {
          res_id: res_id,
        },
  
        dataType: "json",
  
        success: function (data) {
          console.log(data);

          $htmls = "" ;

          $htmlss = "" ;

  
          $.each(data, function (key, val) {

           var res_datereserve =  val['res_datereserve']  ;

           var date =  val['date']  ;

           console.log(val['res_datereserve']);


           $htmls += 
           '  <input type="date" name="date" id="dateid" data-id='+res_id+'  class="form-control" value='+val['date']+' min='+date+'>';

           $htmlss += 
           '  <input type="time" name="time" id="timeid" data-id='+res_id+'  class="form-control" value='+val['time']+' >';



            $("#dateres").append($htmls);

            $("#dateress").append($htmlss);



            $("#res_datereserve").val(res_datereserve);


          })

        }

    })

    })


    $("#edit_tablereserve").on("submit", function(e) {

      e.preventDefault();

      var res_id = $("#show_res_id").html();

      var dateid = $("#dateid").attr("name");

      var timeid = $("#timeid").attr("name");

      console.log(dateid);

      console.log(timeid);


      $.ajax({

        url: "updateres.php",
  
        type: "post",
  
        data: {
          res_id: res_id, dateid:dateid , timeid:timeid
        },
  
        // dataType: "json",
  
        success: function (data) {
          console.log(data);

          $htmls = "" ;

          $htmlss = "" ;

  
          $.each(data, function (key, val) {

          })

        }

      })


    })

})