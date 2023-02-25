$(document).ready(function () {
  console.log("----------------- เริ่มต้นการทำงาน ---------------------");

  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  ViewmainTable();

  $(".zoneidall").addClass("hoveradye");


  function ViewmainTable() {
    
    $.ajax({
      url: "serve/show_table_first.php",
      dataType: "json",
      success: function (data) {
        console.log(data);

        $.each(data, function (key, val) {
          
          ViewTableAll();
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด");
      },
    });
  }

  

  $("#showall").on("click" , function(){
    

    $("#showimage").empty();
  
    $(".HoverBorder1").removeClass("hoveradye");

    $(".HoverBorder").removeClass("hoveradye");

    $(".zoneidall").addClass("hoveradye");


    ViewTableAll();
    
  })

  function ViewTableAll(){

  
   
    $(".show_name_table").html("All Zone");

    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 1000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });

    $(".boxzone").empty();



    $.ajax({
      url: "serve/click_zone_all.php",
      type: "POST",
      dataType: "json",
      data: {  },
      success: function (data) {
        $htmls = "";

        $.each(data, function (key, val) {

          console.log(data);

          var table_name = val["table_name"];


          var sto_id = val["sto_id"];

          $htmls +=
         
            '<div class="text-center"  id="show_detail" sto_id='+val["sto_id"] + ' data-id=' + val["table_id"] + '>' +
            '<div class="mix ' +
            val['zone_id'] +  
            ' ">' +
            '<a href="#" class="latest-product__item">' +
            '<h5 class="mt-2"><u>Store : '+val['sto_name'] +' </u></h5>'+   
            '<div class="latest-product__item__text">' +
            "<span>" +
            table_name +  
            "</span>" +
            "<h6>" +
            val["table_person"] +
            "</h6>" +
            "</div>" +
            "</a>" +
            "</div>" +
            "</div>";

          // $("#show_sto_id").val(sto_id); 


        })


        $(".show_table").html($htmls);

      },
      error: function () {
        alert("เกิดข้อผิดพลาด");
      },

    })

  }

  

  $("#boxzone").on("click", ".zoneid", function () {

    var zoneid = $(this).attr("data-id");

    console.log(zoneid);

    ViewTable(zoneid);

    $(".show_table").show();

    var zone_name = $(this).attr("id");

    $(".show_name_table").html("" + zone_name);

    $(".HoverBorder1").removeClass("hoveradye");

    $(".HoverBorder").removeClass("hoveradye");

    $(".zone" + zoneid).addClass("hoveradye");

    
  });

  function ViewTable(zone_id, zone_name) {

    console.log(zone_id);

    $(".show_name_table").html("" + zone_name);

    $(".HoverBorder").removeClass("hoveradye");

    $(".HoverBorder1").removeClass("hoveradye");

    $(".zoneidall").addClass("hoveradye");


    $(".zone" + zone_id).addClass("hoveradye");

    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 1000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });

    //   Toast.fire({
    // 	icon: 'success',
    // 	title: 'Show Menu'
    //   })

    $("#show_sto_id").val(); //รหัสร้าน

    $(".boxzone").empty();

    $.ajax({
      url: "serve/click_zone.php",
      type: "POST",
      dataType: "json",
      data: { zone_id: zone_id },
      success: function (data) {
        $htmls = "";
        $htmlss = "";
        console.log(data) ; 
      
        $.each(data, function (key, val) { 
      

   
          var zone_id = val["zone_id"];

          var table_name = val["table_name"];

          var sto_id = val["sto_id"];

          $htmlss =
          '<img src="../backend/getimg/plan/' +
          val["chart_name"] +
          '" alt="" width="30%;">' +
          '<br>' + 
          'Store : ' + val['sto_name']  ;

      

          $htmls +=
            '<div class="text-center " id="show_detail" data-id=' +
            val["table_id"] +
            ">" +
            '<div class="mix ' +
            zone_id +
            ' ">' +
            '<a href="#" class="latest-product__item">' +
            '<div class="latest-product__item__text">' +
            "<span>" +
            table_name +
            "</span>" +
            "<h6>" +
            val["table_person"] +
            "</h6>" +
            "</div>" +
            "</a>" +
            "</div>" +
            "</div>";

        });

        $(".show_table").html($htmls);

        $("#showimage").html($htmlss);

      },
      error: function () {
        alert("เกิดข้อผิดพลาด");
      },
    });
  }

  $("#show_quantity_table").val();

  $("#show_molo_plus_table").click(function () {
    console.log("----------------- เพิ่มจำนวน ---------------------");

    var quantity = $("#show_quantity_table").val();

    $("#show_quantity_table").val(quantity * 1 + 1);
  });

  $("#show_molo_minus_table").click(function () {
    console.log("----------------- ลดจำนวน ---------------------");

    var quantity = $("#show_quantity_table").val();

    $("#show_quantity_table").val(quantity * 1 - 1);

    var show_qty_res = $("#show_quantity_table").val(quantity * 1 - 1);

    if(  $("#show_quantity_table").val() < 1  ){
      
      $("#show_quantity_table").val(1);

    }

    $("#show_qty_res").val(show_qty_res); //จำนวนคน
  });

  $("#show_tablename").val(); //รหัสโต๊ะ
  $("#show_tableid").val(); //รหัสโต๊ะ

  $(".show_table").on("click", "#show_detail", function () {

    var table_id = $(this).attr("data-id");

    var sto_id = $(this).attr("sto_id");

    $("#show_sto_id").val(sto_id); //รหัสร้าน


    console.log(table_id);

    $("#modal_table").modal("toggle");

    $.ajax({

      url: "serve/show_table.php",

      type: "post",

      data: {
        table_id: table_id,sto_id: sto_id , 
      },

      dataType: "json",

      success: function (data) {
        console.log(data);

        $.each(data, function (key, val) {
          console.log(val["table_name"]);

          var table_name = val["table_name"];

          var zone_name = val["zone_name"];

          var zone_id = val["zone_id"];


          $("#tablename").html(table_name);

          $("#show_tablename").val(table_name); //รหัสโต๊ะ
          $("#show_tableid").val(table_id); //รหัสโต๊ะ

          $("#zonename").html(zone_name);
        });
      },
    });
  });

  $("#insert_tablereserve").on("submit", function(e) {


    e.preventDefault();

    console.log("เริ่มต้นการจอง  ");

    var formData = new FormData($(this)[0]);

    console.log(formData)  ;

    $.ajax({
      url: "serve/insert_table.php",

      method: "POST",

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
            title: "RESERVE OK!",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#modal_table").modal("toggle");

          location.reload(true);
            
        } else if(val['status'] == "DAY_NO"){
          Swal.fire({
            position: "error",
            icon: "error",
            title: "Day Time!",
            showConfirmButton: false,
            timer: 1500,
          });

        } else {

          Swal.fire({
            position: "error",
            icon: "error",
            title: "Duplicate Time!",
            showConfirmButton: false,
            timer: 1500,
          });

        }

      })
      },
    });
  });

  $(".cancel_table").click(function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes , Cancel !",
      cancelButtonText: "Exit!",
    }).then((result) => {
      if (result.isConfirmed) {
        var res_id = $(this).attr("data-id");

        console.log(res_id);

        $.ajax({
          url: "serve/cencel_table.php",

          type: "post",

          data: {
            res_id: res_id,
          },

          dataType: "json",

          success: function (data) {
            console.log(data);

            $.each(data, function (key, val) {
              if (val["status"] == "YES") {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "CANCEL OK",
                  showConfirmButton: false,
                  timer: 1500,
                });
                location.reload();
              } else {
                Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "NOT CANCEL",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }
              location.reload();
          
            });
          },
        });
      }
    });
  });
});
