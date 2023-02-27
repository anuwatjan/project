$(document).ready(function () {
    console.log("เริ่มต้นการทำงาน");

    $("#showdelivery").hide();
    $("#showbank").hide();
    $("#insert_to_purchase").hide();
    $("#insert_to_purchase22").hide();


    // เริ่มต้นการแสดงของปุ่ม
    $("input[type='radio']").click(function () {
        var radioValue = $("input[name='paymentradio']:checked").val();
        $("#show_payment_id").html(radioValue);
        if (radioValue == 1) {
          $("#showcash").show();
          $("#showdelivery").hide();
          $("#showbank").show();
          $("#insert_to_purchase").show();
          $("#insert_to_purchase22").show();
        } else {
          $("#showdelivery").show();
          $("#showbank").hide();
          $("#showcash").hide();
          $("#insert_to_purchase").show();
          $("#insert_to_purchase22").show();
        }
    })
  
    $(document).bind("contextmenu", function (e) {
      e.preventDefault();
    });
  
    $(document).bind("selectstart", function (e) {
      e.preventDefault();
    });

    ViewAddress();

    // เริ่มต้นที่อยู่
    function ViewAddress() {
        if ($("#noaddress").html() == "0") {
            Swal.fire({
              position: "center",
              icon: "warning",
              title: "Please Insert Address !",
              showConfirmButton: false,
              timer: 500,
            });
            $("#modal_address1").modal("toggle");
        }else{
            $.ajax({
                type: "POST",
                url: "serve/Checkout_Select_Add_First.php",
                data: {},
                dataType: "json",
                success: function (data) {
                  var htmls = "";
                  console.log(data);
                  $.each(data, function (key, val) {
                    htmls +='<p class="m-2"><strong>' +val["cusa_name"] +"           " +val["cusa_surname"] +"</strong>" +"           " +"  |  " +
                      val["cusa_phone"] + '<p class="m-2">' + val["cusa_address"] + "    ,    " + val["cusa_province"] +"  , " +
                      val["cusa_zipcode"] + "</p>";
                    $("#show_address_select").html(htmls);
                    var show_id = val["cusa_id"];
                    $("#show_address_select_id").html(show_id);
                    console.log(show_id);
                    $("#show_address_id").html(show_id);
                  });
                },
              });
        }
    }

    // กดเปลี่ยนที่อยู่ 
    $("#Checkout_Address").click(function () {
        $("#select_modal_address").modal("toggle");
      });

    //   กดปุ่ม เพิ่มที่อยู่ใหม่เอง ย้ำว่าปุ่มเฉยๆ
    $("#clickmodaladdress2").click(function () {
        $("#form").trigger('reset');
        $("#modal_address2").modal("toggle");
      });

    //   กด save ที่อยู่เริ่มต้น กรณีไม่มีที่อยู่เลย
    $("#insert_address1").on("submit", function (event) {
        event.preventDefault();
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
                var cusa_id = val["cusa_id"];
                $.ajax({
                  url: "serve/Checkout_Select_Add.php",
                  type: "post",
                  data: { cusa_id: cusa_id, },
                  dataType: "json",
                  success: function (data) {
                    console.log(data);
                    $.each(data, function (key, val) {
                      $("#show_address_select").append(
                        "" +'<p class="m-2"><strong>' + val["cusa_name"] + "           " + val["cusa_surname"] +
                          "</strong>" + "           " + "  |  " + val["cusa_phone"] +
                          '<p class="m-2">' + val["cusa_address"] + "    ,    " + val["cusa_province"] + "  , " +
                          val["cusa_zipcode"] + "</p>" + "  "
                      );
                    //   $("#show_address_id").html(cusa_id);
                      $("#modal_address1").modal("toggle");
                      location.reload();
                    });
                  },
                });
              } else {
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  title: "Your Not work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }
            });
          },
        });
    });

    // กด save เพิ่มเอง
    $("#insert_address2").on("submit", function (event) {
        event.preventDefault();
        event.stopPropagation();
        console.log("เริ่มต้นการเพิ่มที่อยู่ใหม่");
        var formData = new FormData($(this)[0]);
        $.ajax({
          url: "serve/Checkout_Insert_Add_First.php",
          method: "POST",
          data: formData,
          processData: false,
          cache: false,
          contentType: false,
          success: function (data) {
            let persontt = $.parseJSON(data);
            console.log(data);
            $.each(persontt, function (key, val) {
              if (val["status"] == "YES") {
                var cusa_id = val["cusa_id"];
                console.log(cusa_id);
                $("#show_address_id").html(cusa_id);
                $.ajax({
                  type: "POST",
                  url: "serve/Checkout_Select_Add.php",
                  data: { cusa_id: cusa_id },
                  dataType: "json",
                  success: function (data) {
                    var htmls = "";
                    console.log(data);
                    $.each(data, function (key, val) {
                      var show_address_id = $("#show_address_id").html();
                      htmls +=
                        '<p class="m-2"><strong>' + val["cusa_name"] + "           " + val["cusa_surname"] + "</strong>" +"           " +"  |  " +
                        val["cusa_phone"] + '<p class="m-2">' + val["cusa_address"] + "    ,    " +val["cusa_province"] +"  , " +
                        val["cusa_zipcode"] + "</p>";
                      if (cusa_id == show_address_id) {
                      } else {
                        $("#show_address_select").remove();
                      }
                      $("#modal_address2").modal("toggle");
                      $("#select_modal_address").modal("toggle");
                      $("#show_address_select").html(htmls);
                    });
                  },
                });
              } else {
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  title: "Your Not work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }
            });
          },
        });
      });

    //   กดคลิกเปลั้ยนสลับที่อยู่
      $("#boxselectaddress").on("click", ".selectaddress", function () {
        var cusa_id = $(this).attr("data-id");
        $("#show_address_id").html(cusa_id);
        console.log(cusa_id);
        var cusa_id = $("#show_address_id").html();
        $.ajax({
          type: "POST",
          url: "serve/Checkout_Select_Add.php",
          data: { cusa_id: cusa_id },
          dataType: "json",
          success: function (data) {
            var htmls = "";
            console.log(data);
            $.each(data, function (key, val) {
              htmls +=
                '<p class="m-2"><strong>' + val["cusa_name"] + "           " + val["cusa_surname"] + "</strong>" +"           " +"  |  " +
                val["cusa_phone"] + '<p class="m-2">' + val["cusa_address"] + "    ,    " + val["cusa_province"] +"  , " +val["cusa_zipcode"] +"</p>";
              var cusa_id = val["cusa_id"];
              var show_address_id = $("#show_address_id").html();
              if (cusa_id == show_address_id) {
              } else {
                $("#show_address_select").remove();
              }
              $("#select_modal_address").modal("toggle");
              $("#show_address_select").html(htmls);
            });
          },
        });
      });

    // กดปุ่มส่งคอนเฟริ์มออเดอร์ตามประเภท
    $("#insert_to_purchase").click(function () {
      var show_payment_id = $("#show_payment_id").html();
      var show_address_id = $("#show_address_id").html();
      var show_sto_id = $("#show_sto_id").html();
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Confirm Order!",
        cancelButtonText: "Exit!",
      }).then((result) => {
        if (result.isConfirmed) {
          if (show_address_id == 0) {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Please Select Address !",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            var cartnumber = $("#show_sto_id").html();
            if (!cartnumber) {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Please Shopping ",
                showConfirmButton: false,
                timer: 5000,
              });
            } else {
              if (show_payment_id == 1) {
                PO_Insert_Tranfer(show_address_id, show_sto_id);
              } else if (show_payment_id == 2) {
                PO_Insert_Delivery(show_address_id, show_sto_id);
              }
            }
          }
        }
      });
    });

      $("#insert_to_purchase22").click(function () {
        var show_payment_id = $("#show_payment_id").html();
        var show_address_id = $("#show_address_id").html();
        var show_sto_id = $("#show_sto_id").html();
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, Confirm Order!",
          cancelButtonText: "Exit!",
        }).then((result) => {
          if (result.isConfirmed) {
            if (show_address_id == 0) {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Please Select Address !",
                showConfirmButton: false,
                timer: 1500,
              });
            } else {
              var cartnumber = $("#show_sto_id").html();
              if (!cartnumber) {
                Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "Please Shopping ",
                  showConfirmButton: false,
                  timer: 5000,
                });
              } else {
                if (show_payment_id == 1) {
                  PO_Insert_Tranfer(show_address_id, show_sto_id);
                } else if (show_payment_id == 2) {
                  PO_Insert_Delivery(show_address_id, show_sto_id);
                }
              }
            }
          }
        });
      });

    // คอนเฟิมออเดอร์ของทรานเฟอร์
    function PO_Insert_Tranfer(show_address_id, show_sto_id){
    var show_payment_id = $("#show_payment_id").html();
    var tranfershow = $("#tranfershow").html();
    var sto_id = $("#sto_id").html();
    var bac_id = $("#bac_id").html();
    var tranfer_date = $("#tranfer_date").val();
    var amount = $("#amount").val();
    var bac_name = $("#bac_name").val();
    var bac_number = $("#bac_number").val();
    var bac_account = $("#bac_account").val();
    var logo_img64 = $("#logo_img64").val();
    console.log(tranfershow , sto_id , bac_id , tranfer_date , amount , bac_name , bac_number , bac_account  );
    if ( bac_id != 0 && amount != "" && bac_name != "" && bac_number != "" && bac_account != ""  && logo_img64 != "" ) {
      $.ajax({
        url: "serve/PO_Insert_Tranfer.php",
        type: "post",
        data: {
          show_address_id: show_address_id,
          show_sto_id: show_sto_id,
          show_payment_id: show_payment_id,
        },
        dataType: "json",
        success: function (data) {
          console.log(data);
          $.each(data, function (key, val) {
            var po_id = val["po_id"];
            console.log(po_id);
            if (val["status"] == "YES" && val["status_po"] == "1") {
              InsertBank(po_id);
              DeleteCart();
            } else if (val["status"] == "YES" && val["status_po"] == "7") {
              DeleteCart();
              Swal.fire({
                position: "center",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500,
              });
              window.location.href = "myorder_all.php";
            } else {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Your work has been Not saved",
                showConfirmButton: false,
                timer: 1500,
              });
            }
          });
        },
      });
    }else{
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Please complete the information.",
        showConfirmButton: false,
        timer: 1500,
      });
    }
  }

  function InsertBank(po_id){
    var tranfershow = $("#tranfershow").html();
    var sto_id = $("#sto_id").html();
    var bac_id = $("#bac_id").html();
    var tranfer_date = $("#tranfer_date").val();
    var amount = $("#amount").val();
    var bac_name = $("#bac_name").val();
    var bac_number = $("#bac_number").val();
    var bac_account = $("#bac_account").val();
    var logo_img64 = $("#logo_img64").val();
    var imagebroswer =  $("#imagebroswer").val();
    if (sto_id != "" && tranfershow != "" && bac_id != 0 && amount != "" && bac_name != "" && bac_number != "" && bac_account != ""  && logo_img64 != "" ) {
      $.ajax({
        url: "serve/Bank_Insert.php",
        type: "post",
        data: {
          po_id: po_id,
          bac_id: bac_id , 
          tranfer_date: tranfer_date,
          bac_name: bac_name,
          bac_number: bac_number,
          bac_account: bac_account,
          logo_img64: logo_img64,
          amount:amount ,
          imagebroswer:imagebroswer ,
        },
        dataType: "json",
        success: function (data) {
          console.log(data);
          $.each(data, function (key, val) {
            if (val["status"] == "YES") {
              Swal.fire("SAVE!", "OK.", "success");
              window.location.href = "myorder_all.php";
            } else {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "ERROR",
                showConfirmButton: false,
                timer: 1500,
              });
              location.reload();
            }
          });
        },
      });
    } else {
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Please Check Input",
        showConfirmButton: false,
        timer: 1500,
      });
    }
  }
  
  // คอนเฟริมออเดอร์ของเดลิเวอรี่
  function PO_Insert_Delivery(show_address_id, show_sto_id){
    var show_payment_id = $("#show_payment_id").html();
    $.ajax({
      url: "serve/PO_Insert_Tranfer.php",
      type: "post",
      data: {
        show_address_id: show_address_id,
        show_sto_id: show_sto_id,
        show_payment_id: show_payment_id,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          var po_id = val["po_id"];
          console.log(po_id);
          if (val["status"] == "YES" && val["status_po"] == "1") {
            DeleteCart();
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Your work has been saved",
              showConfirmButton: false,
              timer: 1500,
            });
            window.location.href = "bank.php?po_id=" + po_id;
          } else if (val["status"] == "YES" && val["status_po"] == "7") {
            DeleteCart();
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Your work has been saved",
              showConfirmButton: false,
              timer: 1500,
            });
            window.location.href = "myorder_all.php";
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Your work has been Not saved",
              showConfirmButton: false,
              timer: 1500,
            });
          }
        });
      },
    });
  }

  function DeleteCart(){
    console.log("Remove cart");
    $.ajax({
      url: "serve/Delete_Cart.php",
      type: "post",
      data: {},
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          if (val["status"] == "YES") {
            Swal.fire({
              position: "center",
              icon: "question",
              title: "changing information please please wait",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "ERRORS!!!",
              showConfirmButton: false,
              timer: 1500,
            });
          }
        });
      },
    });
  }

  $("#bac_id").html();
  $("input[type='radio']").click(function () {
    var radioValue = $("input[name='bac_id']:checked").val();
    $("#bac_id").html(radioValue);
  });

})