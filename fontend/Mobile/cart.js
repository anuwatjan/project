$(document).ready(function () {
  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  // ปิด
  $(".modalcartclose").click(function(){
    $("#Cart_Detail_Mobile").modal("hide");
  });
  // กดปุ่มเพิ่มจำนวนสินค้าในตะกร้า
  $(".Box_Cart_Number_Product_Mobile").on(
    "click",
    "#increaseValue2",
    function () {
      // ดึงรหัสตั้งต้นมาก่อนด้วย
      var cart_id = $(this).attr("data-id");
      var value = parseInt(
        document.getElementById("number2" + cart_id).value,
        10
      );
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById("number2" + cart_id).value = value;
      // ดึงราคาตั้งต้นมาก่อน
      $("#prod_price_simple_start").html();
      var total =
        Number.parseFloat($("#prod_price_simple_start").html()).toFixed(2) *
        value;
      $("#Cart_Table_Number_Product_Qty").html(
        Number.parseFloat(total).toFixed(2)
      );
      // ปรับเปลี่ยนราคารวมตามไปด้วย
      // จากนั้นกดปุ่ม
      var quantity = value;
      SetUpdateQtyIn1(cart_id, quantity);
    }
  );

  // กดปุ่มลดจำนวนสินค้าในตะกร้า
  $(".Box_Cart_Number_Product_Mobile").on(
    "click",
    "#decreaseValue2",
    function () {
      // ดึงรหัสตั้งต้นมาก่อนด้วย
      var cart_id = $(this).attr("data-id");
      if (document.getElementById("number2" + cart_id).value > 1) {
        var value = parseInt(
          document.getElementById("number2" + cart_id).value,
          10
        );
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById("number2" + cart_id).value = value;
        // ดึงราคาตั้งต้นมาก่อน
        $("#prod_price_simple_start").html();
        var total =
          Number.parseFloat($("#prod_price_simple_start").html()).toFixed(2) *
          value;
        $("#Cart_Table_Number_Product_Qty").html(
          Number.parseFloat(total).toFixed(2)
        );
        // ปรับเปลี่ยนราคารวมตามไปด้วย
        // จากนั้นกดปุ่ม
        var quantity = value;
        SetUpdateQtyDe1(cart_id, quantity);
      } else {
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "serve/Cart_Delete.php",
              type: "post",
              data: {
                cart_id: cart_id,
              },
              dataType: "json",
              success: function (data) {
                $.each(data, function (key, val) {
                  $("#Cart_Table_Number").modal("hide");
                  $(".delete_mem" + cart_id).fadeOut("slow");
                  Refresh_Value_Table();
                  Refresh_Value(val["prod_id"]);
                  Refresh_Value_Table_Mobile();
                  $(".delete_mem_mobile" + cart_id).fadeOut("slow");
                });
              },
              error: function () {
                alert("เกิดข้อผิดพลาด 2222");
              },
            });
          }
        });
      }
    }
  );

  function SetUpdateQtyIn1(cart_id, quantity) {
    $.ajax({
      url: "serve/Cart_Update_Qty_In_Mobile.php",
      type: "post",
      data: {
        cart_id: cart_id,
        quantity: quantity,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          // ปรับเปลี่ยนทั้งตะกร้า กับ โมบาย
          $("#Cart_Table_Number_Product_Qty" + cart_id).html(val["priceqty"]);
          $("#Cart_Table_Number").modal("hide");
          $("#show_price_qty_mobile").html(val["priceqty"]);
          Refresh_Value_Table();
          Refresh_Value_Table_Mobile();
          Refresh_Value(val["prod_id"]);
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด 2222");
      },
    });
  }

  function SetUpdateQtyDe1(cart_id, quantity) {
    $.ajax({
      url: "serve/Cart_Update_Qty_De_Mobile.php",
      type: "post",
      data: {
        cart_id: cart_id,
        quantity: quantity,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          $("#Cart_Table_Number_Product_Qty" + cart_id).html(val["priceqty"]);
          $("#Cart_Table_Number").modal("hide");
          Refresh_Value_Table();
          Refresh_Value_Table_Mobile();
          Refresh_Value(val["prod_id"]);
        });
      },
    });
  }

  //อัพเดตจำนวนสินค้าในตะกร้า เพิ่มแบบไม่รีเฟรช
  $("#Product_To_Table_Mobile").on("click", "#increaseValue3", function () {
    var cart_id = $(this).attr("data-id");
    var value = parseInt(
      document.getElementById("number3" + cart_id).value,
      10
    );
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById("number3" + cart_id).value = value;
    // ดึงราคาตั้งต้นมาก่อน
    $("#prod_price_simple_start").html();
    var total =
      Number.parseFloat($("#prod_price_simple_start").html()).toFixed(2) *
      value;
    $("#Cart_Table_Number_Product_Qty").html(
      Number.parseFloat(total).toFixed(2)
    );
    // ปรับเปลี่ยนราคารวมตามไปด้วย
    // จากนั้นกดปุ่ม
    var quantity = value;
    SetUpdateQtyIn2(cart_id, quantity);
  });

  //อัพเดตจำนวนสินค้าในตะกร้า ลดแบบไม่รีเฟรช
  $("#Product_To_Table_Mobile").on("click", "#decreaseValue3", function () {
    var cart_id = $(this).attr("data-id");
    if (document.getElementById("number3" + cart_id).value > 1) {
      var value = parseInt(
        document.getElementById("number3" + cart_id).value,
        10
      );
      value = isNaN(value) ? 0 : value;
      value--;
      document.getElementById("number3" + cart_id).value = value;
      // ดึงราคาตั้งต้นมาก่อน
      $("#prod_price_simple_start").html();
      var total =
        Number.parseFloat($("#prod_price_simple_start").html()).toFixed(2) *
        value;
      $("#Cart_Table_Number_Product_Qty").html(
        Number.parseFloat(total).toFixed(2)
      );
      // ปรับเปลี่ยนราคารวมตามไปด้วย
      // จากนั้นกดปุ่ม
      var quantity = value;
      SetUpdateQtyDe2(cart_id, quantity);
    } else {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "serve/Cart_Delete.php",
            type: "post",
            data: {
              cart_id: cart_id,
            },
            dataType: "json",
            success: function (data) {
              $.each(data, function (key, val) {
                $("#Cart_Table_Number").modal("hide");
                $(".delete_mem" + cart_id).fadeOut("slow");
                Refresh_Value_Table();
                Refresh_Value(val["prod_id"]);
                Refresh_Value_Table_Mobile();
                $(".delete_mem_mobile" + cart_id).fadeOut("slow");
              });
            },
          });
        }
      });
    }
  });

  function SetUpdateQtyIn2(cart_id, quantity) {
    $.ajax({
      url: "serve/Cart_Update_Qty_In_Mobile.php",
      type: "post",
      data: {
        cart_id: cart_id,
        quantity: quantity,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          // ปรับเปลี่ยนทั้งตะกร้า กับ โมบาย
          $("#Cart_Table_Number_Product_Qty" + cart_id).html(val["priceqty"]);
          $("#Cart_Table_Number").modal("hide");
          $("#show_price_qty_mobile").html(val["priceqty"]);
          Refresh_Value_Table();
          Refresh_Value_Table_Mobile();
          Refresh_Value(val["prod_id"]);
        });
      },
    });
  }

  function SetUpdateQtyDe2(cart_id, quantity) {
    $.ajax({
      url: "serve/Cart_Update_Qty_De_Mobile.php",
      type: "post",
      data: {
        cart_id: cart_id,
        quantity: quantity,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          // ปรับเปลี่ยนทั้งตะกร้า กับ โมบาย
          $("#Cart_Table_Number_Product_Qty" + cart_id).html(val["priceqty"]);
          $("#Cart_Table_Number").modal("hide");
          $("#show_price_qty_mobile").html(val["priceqty"]);
          Refresh_Value_Table();
          Refresh_Value_Table_Mobile();
          Refresh_Value(val["prod_id"]);
          // location.reload();
        });
      },
    });
  }

  // อัพเดตตารางแบบไม่รีเฟรช ของโมบาย
  function Refresh_Value_Table_Mobile() {
    // กรณีที่เป็น Table
    $.ajax({
      url: "Mobile/Cart_Show_Table_Mobile.php",
      type: "post",
      data: {},
      dataType: "json",
      success: function (data) {
        var html = "";
        $.each(data, function (key, val) {
          html +=
            '<tr valign="middle" align="center" class="delete_mem_mobile' +
            val["cart_id"] +
            '">' +
            '<div class="prod_name text-rebacca">' +
            '<td><img class="mx-2" style="border-radius: 50%;" src="../backend/getimg/prod/' +
            val["prod_image"] +
            '" alt="" width="50px;"></td>' +
            // '<div id="prod_cart_id_mobile" data-id=' + val['cart_id'] + '> '+
            '<td width="42%" style="font-size:16px;">' +
            "<strong>" +
            val["prod_name"] +
            val["sprod_name"] +
            // '<br>'+val['sprod_name']+
            val["sprodone_name"] +
            "</div>" +
            "<br>" +
            val["message"] +
            "</strong>" +
            "<strong> £   " +
            val["prod_price_simple"] +
            "</strong>" +
            "</td>" +
            '<td width="8%">' +
            '<div class="Box_Cart_Number_Product_Mobile text-center">' +
            '<form class="form2">' +
            '<div class="value-button3 text-white" id="decreaseValue3" value="Decrease Value" data-id=' +
            val["cart_id"] +
            ">-</div>" +
            '<input type="number3" id="number3' +
            val["cart_id"] +
            '" min="1" class="number3"  data-id=' +
            val["cart_id"] +
            ' value="' +
            val["quantity"] +
            '" />' +
            '<div class="value-button3 text-white" id="increaseValue3" value="Increase Value" data-id=' +
            val["cart_id"] +
            ">+</div>" +
            "</form>" +
            '<a style="font-size:14px;">£' +
            financial(val["prod_price_simple"] * val["quantity"]) +
            "</a>" +
            "</div>" +
            "</td>" +
            '<td width="5%">' +
            '<div class="Cart_Delete_Mobile" data-id=' +
            val["cart_id"] +
            '><a><i class="fa fa-trash fa-2x" style="color: red" aria-hidden="true"></i></i></a></div>' +
            "</td>" +
            // '</div>'+
            "</tr>";
        });

        $("#Product_To_Table_Mobile").html(html);
      },
    });
  }

  // กดถังขยะ
  $(".Cart_Delete_Mobile").on("click", function () {
    var cart_id = $(this).attr("data-id");
    console.log("deleteeeeeeeeeeee");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Delete Orders!",
      cancelButtonText: "Exit ",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "serve/Cart_Delete.php",
          type: "post",
          data: {
            cart_id: cart_id,
          },
          dataType: "json",
          success: function (data) {
            console.log(data);
            $.each(data, function (key, val) {
              Refresh_Value(val["prod_id"]);
              Refresh_Value_Table();
              Refresh_Value_Table_Mobile();
              $(".delete_mem_mobile" + cart_id).fadeOut("slow");
            });
          },
        });
      }
    });
  });

  // กดถังขยะแบบไมารีเฟรช
  $("#Product_To_Table_Mobile").on("click", ".Cart_Delete_Mobile", function () {
    var cart_id = $(this).attr("data-id");
    console.log("deleteeeeeeeeeeee");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Delete Orders!",
      cancelButtonText: "Exit ",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "serve/Cart_Delete.php",
          type: "post",
          data: {
            cart_id: cart_id,
          },
          dataType: "json",
          success: function (data) {
            console.log(data);
            $.each(data, function (key, val) {
              Refresh_Value(val["prod_id"]);
              Refresh_Value_Table();
              Refresh_Value_Table_Mobile();
              $(".delete_mem_mobile" + cart_id).fadeOut("slow");
            });
          },
        });
      }
    });
  });

  // กดปุ่ม checkout
  // $("#checkout1").click(function () {
  //  var number_cart = $(".show_add_product").html();
  //   if (number_cart == "") {
  //     Swal.fire({
  //       position: "center",
  //       icon: "warning",
  //       title: "There are no products in the cart.",
  //       showConfirmButton: false,
  //       timer: 1500,
  //     });
  //   } else {
  //     window.location.href = "CheckOut.php";
  //   }
  // });

   $("#checkout1").click(function () {
     // เช็คล็อคอินยัง
     // รับค่าจำนวนตะกร้า
     var number_cart = $(".show_add_product").html();
     if (number_cart == "") {
       Swal.fire({
         position: "center",
         icon: "warning",
         title: "There are no products in the cart.",
         showConfirmButton: false,
         timer: 1500,
       });
     } else {
       $.ajax({
         url: "serve/checklogin.php",
         type: "post",
         data: {},
         dataType: "json",
         success: function (data) {
           $.each(data, function (key, val) {
             if (val["status"] == "NO") {
               let timerInterval;
               Swal.fire({
                 title: "Please wait few minute",
                 html: "not logged in going to internal login page <b></b> milliseconds.",
                 timer: 2000,
                 timerProgressBar: true,
                 didOpen: () => {
                   Swal.showLoading();
                   const b = Swal.getHtmlContainer().querySelector("b");
                   timerInterval = setInterval(() => {
                     b.textContent = (Swal.getTimerLeft() / 1000).toFixed(2);
                   }, 100);
                 },
                 willClose: () => {
                   clearInterval(timerInterval);
                 },
               }).then((result) => {
                 if (result.dismiss === Swal.DismissReason.timer) {
                   window.location.href = "login_checkout.php";
                 }
               });
               // ไม้มีตะกร้า
             } else if (val["status" == "NOT"]) {
               Swal.fire({
                 position: "center",
                 icon: "warning",
                 title: "Your work has been saved",
                 showConfirmButton: false,
                 timer: 1500,
               });
             } else {
               window.location.href = "CheckOut.php";
             }
           });
         },
       });
     }
   });

  // อัพเดตตารางแบบไม่รีเฟรช
  function Refresh_Value_Table() {
    // กรณีที่เป็น Table
    $.ajax({
      url: "serve/Cart_Show_Table.php",
      type: "post",
      data: {},
      dataType: "json",
      success: function (data) {
        var html = "";
        $.each(data, function (key, val) {
          html +=
            '<tr  valign="middle" align="center" class="delete_mem' +
            val["cart_id"] +
            ' ">' +
            '<td valign="middle" align="center" class="shoping__cart__item" >' +
            '<div id="prod_cart_id_window" data-id=" ' +
            val["cart_id"] +
            ' ">' +
            '<div class="prod_name text-rebacca">' +
            '  <div class="row">' +
            '<img  src="../backend/getimg/prod/' +
            val["prod_image"] +
            ' " alt=""> ' +
            " " +
            val["prod_name"] +
            " " +
            val["sprod_name"] +
            val["sprodone_name"] +
            val["message"] +
            "<br>" +
            val["quantity"] +
            "  x   £ " +
            val["prod_price_simple"] +
            '<div id="prod_price_simple_start" style="display:none;">' +
            val["prod_price_simple"] +
            "</div>" +
            '<div id="prod_price_simple_start_id" style="display:none;">' +
            val["cart_id"] +
            " </div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</td>" +
            '<td class="shoping__cart__total" style="vertical-align: middle;">' +
            '<div id="prod_cart_id_window" data-id="' +
            val["cart_id"] +
            '">' +
            ' <div id="show_price_qty' +
            val["cart_id"] +
            '">' +
            " £" +
            financial(val["prod_price_simple"] * val["quantity"]) +
            " " +
            " </div>" +
            "</div>" +
            "</td>" +
            '<td class="shoping__cart__total" style="vertical-align: middle;width: 30px;">' +
            '<div class="Cart_Delete_NonRefresh" data-id=' +
            val["cart_id"] +
            ">" +
            ' <a><i class="fa fa-trash-o" aria-hidden="true" style="color:red" ></i></a>' +
            "</div>" +
            "</td>" +
            "</tr>";
        });

        $("#Product_To_Table").html(html);
      },
    });
  }

  function Refresh_Value(prod_id) {
    $.ajax({
      url: "serve/Cart_Show_Qty.php",
      type: "post",
      data: {
        prod_id: prod_id,
      },
      dataType: "json",
      success: function (data) {
        var html = "";
        $.each(data, function (key, val) {
          var Total_Price = isNaN(financial(val["prod_price_simple1"]))
            ? 0
            : financial(val["prod_price_simple1"]);
          var cart_id = val["cart_id"];
          // Window
          val["quantity"] =
            null === val["quantity"] ? "" : val["quantity"] + "x";
          $(".Quantity_Product_Select" + val["prod_id"]).html(val["quantity"]);
          $("#Product_To_Table_Total").html("£ " + Total_Price);
          $("#Cart_Total_Num").html(val["cart_id"]);
          // Mobile
          $("#Cart_Total_Num_Mobile").html(val["cart_id"]);
          $("#Cart_Total_Price_Mobile").html("£ " + Total_Price);
          $("#Cart_Total_Mobile").html("£" + Total_Price);
          $("#show_price_qty_mobile").html(Total_Price);
        });
      },
    });
  }
});
