function financial(x) {
  return Number.parseFloat(x).toFixed(2);
}

$(document).ready(function () {
  console.log("เริ่มต้นการทำงาน");

  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  // เพิ่มสินค้าลงตะกร้า จำนวน
  $("#increaseValue").click(function () {
    var value = parseInt(document.getElementById("number").value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById("number").value = value;
    $("#show_quantity_de").html(value * 1);

    var total = $("#show_price_simple_total").html() * value;
    $("#show_price_simple_total_in_button").html(
      "£" + Number.parseFloat(total).toFixed(2)
    );
  });

  // ลดสินค้าลงตะกร้า จำนวน
  $("#decreaseValue").click(function () {
    if (document.getElementById("number").value > "1") {
      var value = parseInt(document.getElementById("number").value, 10);
      if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value < 1 ? (value = 1) : "";
        value--;
        document.getElementById("number").value = value;
        $("#show_quantity_de").html(value * 1);

        var total = $("#show_price_simple_total").html() * value;
        $("#show_price_simple_total_in_button").html(
          "£" + Number.parseFloat(total).toFixed(2)
        );
      }
    }
  });

  // หน้าแรกเริ่มต้นจะแสดงหน้าหลักก่อนเลย
  ViewmainCategory();

  function ViewmainCategory() {
    $.ajax({
      url: "serve/Product_First.php",
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          var cat_id = val["cat_id"];
          var cat_name = val["cat_name"];
          $("#show_category").html(cat_id);
          ViewCategory(cat_id, cat_name);
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด 1111111");
      },
    });
  }

  // เมื่อกดคลิกปุ่มที่หมวดหมู่จะรับค่ามาแล้วเอามาแสดงทั้งชื่อของสินค้า
  $("#Box_Category").on("click", ".Category_id", function () {
    var cat_name = $(this).attr("id");
    var cat_id = $(this).attr("data-id");
    console.log("เลือกหมวดหมู่ : " + cat_name);
    $(".Category_Name").html(
      "" +
        '<i class="fa fa-free-code-camp" aria-hidden="true" style="color:#9400D3"></i>' +
        "   " +
        cat_name
    );
    $(".HoverBorder").removeClass("hoveradye");
    $(".category" + cat_id).addClass("hoveradye");
    ViewCategory(cat_id, cat_name);
    $("#show_category").html(cat_id);
  });

  // แสดงสินค้าออกมาเมื่อกดคลิกที่หมวดหมู่
  function ViewCategory(cat_id, cat_name) {
    console.log(cat_id + cat_name);
    $(".Category_Name").html(
      "" +
        '<i class="fa fa-free-code-camp" aria-hidden="true" style="color:#9400D3"></i>' +
        "   " +
        cat_name
    );
    $(".HoverBorder").removeClass("hoveradye");
    $(".category" + cat_id).addClass("hoveradye");
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
    $(".boxcategory").empty();

    // console.log(cat_id+ cat_name);

    $.ajax({
      url: "serve/Category_click.php",
      type: "POST",
      dataType: "json",
      data: { cat_id: cat_id },
      success: function (data) {
        // console.log(data);
        $htmls = "";
        $.each(data, function (key, val) {
          console.log("มีจำนวนสินค้าของหมวดหมู่นี้ : " + val["product_num"]);
          var show_cat_id = val["cat_id"];
          var prod_detail = val["prod_detail"];
          var prod_id = val["prod_id"];
          var showChar = 30;
          var c = "";
          if (val["num4"] > 0) {
            var prod_price = "START PRICE :  £ " + val["sprod_price"] + " ";
          } else {
            var prod_price = "PRICE : £ " + val["prod_price"] + " ";
          }

          if (prod_detail == "") {
            var c = "";
          } else {
            if (prod_detail.length > showChar) {
              c = prod_detail.substr(0, showChar) + ".....";
            }
          }

          val["quantity"] =
            null === val["quantity"] ? "" : val["quantity"] + "x";

          $htmls +=
            '<div id="Product_Click" data-id=' +
            val["prod_id"] +
            ">" +
            '<div class="mix' +
            show_cat_id +
            ' ">' +
            '<a href="#" class="latest-product__item">' +
            '<div class="latest-product__item__pic">' +
            '<img style="border-radius: 10%;" src="../backend/getimg/prod/' +
            val["prod_image"] +
            '" alt=""></div>' +
            '<div class="latest-product__item__text">' +
            '<div class="button-rebacca Quantity_Product_Select' +
            val["prod_id"] +
            '"> ' +
            val["quantity"] +
            "</div> " +
            "<span> " +
            val["prod_name"] +
            "</span>" +
            '<p class="fontsize">' +
            c +
            "</p >" +
            "<h6> 	 <strong> " +
            prod_price +
            "</strong> </h6>" +
            "</div>" +
            "</a>" +
            "</div>" +
            "</div>";
        });
        $(".Product_Show").html($htmls);
      },
      error: function () {
        alert("เกิดข้อผิดพลาด 2222");
      },
    });
  }

  // ค้นหา
  $("#btnSearch").click(function () {
    var itemname = $("#itemname").val();
    if (itemname == "") {
      window.location.href = "index.php";
    } else {
      $(".Category_Name").html(
        "" +
          '<i class="fa fa-free-code-camp" aria-hidden="true" style="color:#9400D3"></i>' +
          " Search :  " +
          itemname
      );
    }
    $.ajax({
      url: "serve/search.php",
      type: "post",
      data: { itemname: itemname },
      beforeSend: function () {
        $(".loader").show();
      },
      complete: function () {
        $(".loader").hide();
      },
      dataType: "json",
      success: function (data) {
        $htmls = "";
        console.log(data);
        $.each(data, function (key, val) {
          if (val["comn"] == "NODATA") {
            $("#msgerror").html("<p>NO DATA</p>");
          } else {
            console.log("มีจำนวนสินค้าของหมวดหมู่นี้ : " + val["product_num"]);
            var show_cat_id = val["cat_id"];
            var prod_detail = val["prod_detail"];
            var prod_id = val["prod_id"];
            var showChar = 30;
            var c = "";
            console.log([prod_id]);

            if (val["num4"] > 0) {
              var prod_price = "START PRICE :  £ " + val["sprod_price"] + " ";
            } else {
              var prod_price = "PRICE : £ " + val["prod_price"] + " ";
            }

            if (prod_detail == "") {
              var c = "";
            } else {
              if (prod_detail.length > showChar) {
                c = prod_detail.substr(0, showChar) + ".....";
              }
            }

            val["quantity"] =
              null === val["quantity"] ? "" : val["quantity"] + "x";
            $htmls +=
              '<div id="Product_Click" data-id=' +
              val["prod_id"] +
              ">" +
              '<div class="mix' +
              show_cat_id +
              ' ">' +
              '<a href="#" class="latest-product__item">' +
              '<div class="latest-product__item__pic">' +
              '<img style="border-radius: 10%;" src="../backend/getimg/prod/' +
              val["prod_image"] +
              '" alt=""></div>' +
              '<div class="latest-product__item__text">' +
              '<div class="button-rebacca Quantity_Product_Select' +
              val["prod_id"] +
              '"> ' +
              val["quantity"] +
              "</div> " +
              "<span> " +
              val["prod_name"] +
              "</span>" +
              '<p class="fontsize">' +
              c +
              "</p >" +
              "<h6> 	 <strong> " +
              prod_price +
              "</strong> </h6>" +
              "</div>" +
              "</a>" +
              "</div>" +
              "</div>";
          }
        });
        $(".Product_Show").html($htmls);
        // $("#list-data").html(data);
      },
    });
  });
  $("#searchform").on("keyup keypress", function (e) {
    var code = e.keycode || e.which;
    if (code == 13) {
      $("#btnSearch").click();
      return false;
    }
  });

  // รีเซต
  $("#btnreset").click(function () {
    window.location.href = "index.php";
  });

  // คลิกสินค้าแล้วลงตะกร้า อาจมีเงื่อนไขว่า ถ้ามีสินค้าย่อยให้โชว์ Modal ออกมาก่อนเสมอ
  $(".Product_Show").on("click", "#Product_Click", function (e) {
    e.preventDefault();
    $("#show_quantity_de").html(1);
    $("#message").val("");
    var prod_id = $(this).attr("data-id");
    console.log("aaaaa" + prod_id);
    $("#show_prod_id").html(prod_id);
    // เช็คก่อนว่ามีสินค้าย่อยไหม ถ้าไม่มีเอาลงตะกร้าได้เลยครับ
    Product_Check_Sub(prod_id);
  });

  // ฟังก์ชั่นเช็คว่ามีสินค้าย่อยไหม
  function Product_Check_Sub(prod_id) {
    $.ajax({
      url: "serve/Product_Check_Sub.php",
      type: "post",
      data: {
        prod_id: prod_id,
      },
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          // รับค่ารหัสร้านมาด้วยนะ
          $("#show_sto_id").html(val["store_id"]);
          // ไม่มีเมนูย่อย จะมีจำนวนโผล่มาข้างๆชื่อ
          if (val["status"] == "NOLOGIN") {
            window.location.href = "login.php";
          } else if (val["status"] == "YES") {
            // เอาลงตะกร้าเลย
            Cart_Insert("inset");
          } else {
            // Product_Detail
            console.log('$("#Product_Detail").modal("show");');
            $("#Product_Detail").modal("show");

            // มีสินค้าย่อยให้ทำการโชว์ป๊อปอัพขึ้นมาก่อนว่าจะเอารายการไหนเพิ่มเติมหรือไม่
            $("#number").val(1);
            $("#show_price_simple_total_in_button").html(0);
            $("#increaseValue").show();
            $("#decreaseValue").show();
            Product_Show_Detail(prod_id);
          }
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด ----");
      },
    });
  }

  // กดปุ่มลงตะกร้า
  $("#ok_inset_cart").click(function (e) {
    e.preventDefault();
    Cart_Insert("inset");
  });

  // กดปุ่มปิด modal
  $("#ok_insert_close").click(function () {
    $("#Product_Detail").modal("hide");
  });

  // โชว์รายละเอียดสินค้าบน modal
  function Product_Show_Detail(prod_id) {
    $("#show_sub_prod_id").html(0);
    $("#show_sub_prodone_id").html(0);
    $("#show_price_simple").html(0);
    $("#show_price_simple_sub").html(0);
    $("#show_price_simple_sub_one").html(0);
    $("#box_sub_prodone_name").html("");
    $(".Product_Show_Detail_Sub_One").empty();
    $("#show_sub_prodone_id").html(0);
    $.ajax({
      url: "serve/Product_Sub.php",
      type: "POST",
      dataType: "json",
      data: { prod_id: prod_id },
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          var htmls = "";
          var htmlss = "";
          var htmlsss = "";

          $("#prod_id").val(data.main[0].prod_id);
          $("#show_category").html(data.main[0].cat_id);
          $("#show_sub_category").html(data.main[0].scate_id);

          $("#Product_Show_Detail_Images").html(
            '<img src="../backend/getimg/prod/' +
              data.main[0].prod_image +
              '" alt=""  style="" width="100%" height="250px;">'
          );

          // สำหรับชื่อสินค้าล้วนๆ
          htmls =
            '<div class="col-lg-12 col-md-12">' +
            '<div class="product__details__text">' +
            '<h4  style="float:left;">' +
            data.main[0].prod_name +
            "</h4>" +
            "</div>" +
            // '<h4 class="text-danger" style="float:right"> £ ' +
            // data.main[0].prod_price +
            // "</h4>" +
            "<br>" +
            "<br>" +
            "<p>" +
            data.main[0].prod_detail +
            "</p>" +
            "</div>";
          $("#Product_Show_Detail_").html(htmls);
          $("#show_price_simple").html(data.main[0].prod_price);

          // สำหรับ มีสินค้าย่อยมา
          var i = 1;
          $.each(data.sub, function (key, val) {
            // if(i == 1){ var checked = "checked";}else{ var checked = "";}
            // var checked = Math.min(val["sprod_price"]);
            htmlss +=
              '<div class="demo-inline-spacing ">' +
              '<div class="list-group">' +
              '<label class="listgroupitem2">' +
              '<div class="form-check" id="show_sprod_id" sprod_id=' +
              val["sprod_id"] +
              ' " sprod_price=' +
              val["sprod_price"] +
              ">" +
              '<input class="form-check-input"  type="radio" id="specifyColor"    value="' +
              val["sprod_id"] +
              '" name="sprod_id" >' +
              '<span class="form-check-label mx-2  text_for_radio">  ' +
              val["sprod_name"] +
              " </span>" +
              '<span class="formchecklabel" style="float:right">  £ ' +
              val["sprod_price"] +
              "  </span>" +
              "</div>" +
              "</label>" +
              "</div>" +
              "</div>";
          });

          $(".Product_Show_Detail_Sub").html(htmlss);
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด ----");
      },
    });
  }

  // กดคลิกเลือกสินค้าย่อยแล้วเช็คว่ามีสินค้าย่อย 1 อีกไหม
  $("#box_sub_prod").on("click", "#show_sprod_id", function () {
    if ($("#show_sub_prod_id").html() != 0) {
      $("#increaseValue").show();
      $("#decreaseValue").show();
    }
    $("#show_price_simple_sub").html(0);
    var sprod_id = $(this).attr("sprod_id"); //รหัสสินค้าย่อย
    var sprod_price = $(this).attr("sprod_price"); //รหัสสินค้าย่อย
    $("#show_sub_prod_id").html(sprod_id); //เก็บค่ารหัสสินค้าย่อย
    $("#show_price_simple_sub").html(sprod_price);
    $("#show_sub_prodone_id").html(0);
    $("#show_price_simple").html(0);
    $("#show_price_simple_sub_one").html(0);

    $.ajax({
      url: "serve/Product_Check_Sub_One.php",
      type: "POST",
      data: {
        sprod_id: sprod_id,
      },
      dataType: "json",
      success: function (data) {
        var htmlss = "";
        $.each(data, function (key, val) {
          if (val["status"] == "NO") {
            $("#box_sub_prodone_name").html("");
          } else {
            htmlss +=
              '<div class="demo-inline-spacing ">' +
              '<div class="list-group">' +
              '<label class="listgroupitem2">' +
              '<div class="form-check" id="show_sprodone_id" sprodone_id=' +
              val["sprodone_id"] +
              ' " sprodone_price=' +
              val["sprodone_price"] +
              ">" +
              '<input class="form-check-input" type="radio" id="specifyColor"  value="' +
              val["sprodone_id"] +
              '"  name="sprodone_id">' +
              '<span class="form-check-label mx-2 text_for_radio" >  ' +
              val["sprodone_name"] +
              " </span>" +
              '<span class="formchecklabel" style="float:right">  £ ' +
              val["sprodone_price"] +
              "  </span>" +
              "</div>" +
              "</label>" +
              "</div>" +
              "</div>";
            $("#box_sub_prodone_name").html(
              "<h4> CHOOSE : SUB PRODUCT ONE </h4>"
            );
          }
        });
        var total =
          Number.parseFloat($("#show_price_simple").html()) +
          Number.parseFloat($("#show_price_simple_sub").html()).toFixed(2);
        console.log(total);
        $("#show_price_simple_total").html(total * 1);
        $("#show_price_simple_total_in_button").html("£" + total * 1);
        $(".Product_Show_Detail_Sub_One").html(htmlss);
      },
    });
  });

  // กดคลิกเลือกสินค้าย่อย 1
  $("#box_sub_prodone").on("click", "#show_sprodone_id", function () {
    var sprodone_id = $(this).attr("sprodone_id");
    var sprodone_price = $(this).attr("sprodone_price"); //รหัสสินค้าย่อย
    $("#show_price_simple_sub_one").html(sprodone_price);
    $("#show_sub_prodone_id").html(0);
    $.ajax({
      url: "serve/Product_Show_Sub_One.php",
      type: "POST",
      data: {
        sprodone_id: sprodone_id,
      },
      dataType: "json",
      success: function (data) {
        $htmls = "";
        $.each(data, function (key, val) {
          if ((val["status"] = "YES 1")) {
            var sprodone_id = val["sprodone_id"];
            var sprodone_price = val["sprodone_price"];
            $("#show_sub_prodone_id").html(sprodone_id);
            var total = (
              Number.parseFloat($("#show_price_simple").html()) +
              Number.parseFloat($("#show_price_simple_sub").html()) +
              Number.parseFloat($("#show_price_simple_sub_one").html())
            ).toFixed(2);
            console.log(total);
            $("#show_price_simple_total").html(total * 1);
            $("#show_price_simple_total_in_button").html("£" + total * 1);
          }
        });
      },
    });
  });

  // กดปุ่มลบสินค้าในตะกร้า
  $(".Cart_Delete").on("click", function () {
    var cart_id = $(this).attr("data-id");
    var prod_id = $("#show_prod_id").html(); //รหัสสินค้า
    console.log(cart_id);
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
            $.each(data, function (key, val) {
              Refresh_Value(val["prod_id"]);
              Refresh_Value_Table();
              Refresh_Value_Table_Mobile();
              // console.log(val['prod_id']);
              $(".delete_mem" + cart_id).fadeOut("slow");
            });
          },
        });
      }
    });
  });

  // กดตรงตะกร้าสินค้าจะมีการเปลี่ยนจำนวนได้
  $("#container").on("click", "#prod_cart_id", function () {
    var cart_id = $(this).attr("data-id");
    Cart_Change_Number(cart_id);
  });

  // กดปุ่มเพิ่มจำนวนสินค้าในตะกร้า
  $(".Box_Cart_Number_Product").on("click", "#increaseValue1", function () {
    // ดึงรหัสตั้งต้นมาก่อนด้วย
    var cart_id = $("#prod_price_simple_start_id").html();
    var value = parseInt(document.getElementById("number1").value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById("number1").value = value;
    // console.log(cart_id);
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
    $("#update_number").click(function () {
      SetUpdateQtyIn(cart_id, quantity);
    });
  });

  // กดปุ่มลดจำนวนสินค้าในตะกร้า
  $(".Box_Cart_Number_Product").on("click", "#decreaseValue1", function () {
    if (document.getElementById("number1").value > 1) {
      var value = parseInt(document.getElementById("number1").value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? (value = 1) : "";
      value--;
      document.getElementById("number1").value = value;
      // ดึงราคาตั้งต้นมาก่อน
      $("#prod_price_simple_start").html();
      // ดึงรหัสตั้งต้นมาก่อนด้วย
      var cart_id = $("#prod_price_simple_start_id").html();
      var total =
        Number.parseFloat($("#prod_price_simple_start").html()).toFixed(2) *
        value;
      console.log(total);
      $("#Cart_Table_Number_Product_Qty").html(
        Number.parseFloat(total).toFixed(2)
      );
      // ปรับเปลี่ยนราคารวมตามไปด้วย
      // จากนั้นกดปุ่ม
      var quantity = value;
      $("#update_number").click(function () {
        SetUpdateQtyDe(cart_id, quantity);
      });
    } else {
      var cart_id = $("#prod_price_simple_start_id").html();
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
                Refresh_Value_Table_Mobile();

                Refresh_Value(val["prod_id"]);
              });
            },
          });
        }
      });
    }
  });

  //อัพเดตจำนวนสินค้าในตะกร้า เพิ่ม
  function SetUpdateQtyIn(cart_id, quantity) {
        console.log(quantity);
    $.ajax({
      url: "serve/Cart_Update_Qty_In.php",
      type: "post",
      data: {
        cart_id: cart_id,
        quantity: quantity,
      },
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          $("#Cart_Table_Number_Product_Qty" + cart_id).html(val["priceqty"]);
          $("#Cart_Table_Number").modal("hide");
          Refresh_Value_Table();
          Refresh_Value_Table_Mobile();

          Refresh_Value(val["prod_id"]);
          // location.reload();
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด 1111111");
      },
    });
  }

  //อัพเดตจำนวนสินค้าในตะกร้า ลด
  function SetUpdateQtyDe(cart_id, quantity) {
    $.ajax({
      url: "serve/Cart_Update_Qty_De.php",
      type: "post",
      data: {
        cart_id: cart_id,
        quantity: quantity,
      },
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          $("#Cart_Table_Number_Product_Qty" + cart_id).html(val["priceqty"]);
          $("#Cart_Table_Number").modal("hide");
          Refresh_Value_Table();
          Refresh_Value_Table_Mobile();

          Refresh_Value(val["prod_id"]);
          // location.reload();
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด 1111111");
      },
    });
  }

  //อัพเดตจำนวนสินค้าในตะกร้า เพิ่ม
  $("#container").on("click", "#prod_cart_id_window", function () {
    var cart_id = $(this).attr("data-id");
    Cart_Change_Number(cart_id);
  });

  function Cart_Change_Number(cart_id) {
    $("#prodname").empty();
    $("#sprodname").empty();
    $("#sprodonename").empty();
    $("#prod_price_simple_start_id").html(cart_id);
    $("#Cart_Table_Number").modal("show");
    $.ajax({
      url: "serve/Cart_Number_Product.php",
      type: "post",
      data: {
        cart_id: cart_id,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          $("#prodname").html(val["prod_name"]);

          if (val["sprod_name"] == "-") {
          } else if (val["sprod_name"] != "-" || val["sprodone_name"] == "-") {
            $("#sprodname").html(val["sprod_name"]);
          } else if (val["sprodone_name"] != "-" || val["sprod_name"] != "-") {
            $("#sprodname").html(val["sprod_name"]);
            $("#sprodonename").html(val["sprodone_name"]);
          }

          $(".Cart_Table_Number_Product").val(val["quantity"]);
          $("#Cart_Table_Number_Product_Qty").html(
            val["prod_price_simple"].toFixed(2)
          );
        });
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

  // เพิ่มลงตะกร้า
  function Cart_Insert(st) {
    var prod_id = $("#show_prod_id").html(); //รหัสสินค้า
    var show_sub_prod_id = $("#show_sub_prod_id").html(); //รหัสสินค้าย่อย
    var show_sub_prodone_id = $("#show_sub_prodone_id").html(); //รหัสสินค้าย่อย 1
    var show_quantity_de = $("#show_quantity_de").html(); //จำนวนที่รับ
    var show_sto_id = $("#show_sto_id").html(); //รหัสร้านค้า
    var show_category = $("#show_category").html();
    var show_sub_category = $("#show_sub_category").html();
    var show_price_simple_total = $("#show_price_simple_total").html(); //ราคารวมจริง
    var message = $("#message").val(); //หมายเหตุ
    $.ajax({
      url: "serve/Product_Insert_Cart.php",
      type: "post",
      data: {
        prod_id: prod_id,
        show_sub_prod_id: show_sub_prod_id,
        show_sub_prodone_id: show_sub_prodone_id,
        show_quantity_de: show_quantity_de,
        show_sto_id: show_sto_id,
        show_category: show_category,
        show_sub_category: show_sub_category,
        st: st,
        show_price_simple_total: show_price_simple_total,
        message: message,
      },
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          if (val["status"] == "NOLOGIN") {
            window.location.href = "login.php";
          } else if (val["status"] == "NOS") {
            //ไม่มีสิค้าย่อย
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Please Select SubProduct",
              showConfirmButton: false,
              timer: 1500,
            });
            // $("#box_sub_prod").css({ 'background': '#FFA07A',  'color': 'white' });
          } else if (val["status"] == "NOS1") {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Please Select SubProduct1",
              showConfirmButton: false,
              timer: 1500,
            });
          } else if (val["status"] == "NO") {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "saved successfully",
              showConfirmButton: false,
              timer: 1500,
            });
          } else if (val["status"] == "NOSsto") {
            Swal.fire({
              title: "Are you sure?",
              text: "Your basket contains another store.",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, Change it!",
            }).then((result) => {
              if (result.isConfirmed) {
                changecart_inset("det");
                Swal.fire("Change!", "CHANGE OK.", "success");
              }
            });
          } else if (val["status"] == "YES") {
            Refresh_Value(prod_id);

            Refresh_Value_Table();

            Refresh_Value_Table_Mobile();

            $("#Product_Detail").modal("hide");
          }
        });
      },
    });
  }

  // ลบสินค้าออกจากตะกร้าแบบไม่รีเฟรช
  $("#container").on("click", ".Cart_Delete_NonRefresh", function () {
    var cart_id = $(this).attr("data-id");
    var prod_id = $("#show_prod_id").html(); //รหัสสินค้า
    console.log(cart_id);
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
              if (val["status"] == "YES") {
                Refresh_Value(val["prod_id"]);

                $(".delete_mem" + cart_id).fadeOut("slow");
              } else {
                Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "error",
                  showConfirmButton: false,
                  timer: 1500,
                });
                location.reload();
              }
            });
          },
        });
      }
    });
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

  // กดปุ่ม checkout
  $("#checkout").click(function () {
    // กดปุ่ม checkout
    var cartnumber = $("#Cart_Total_Num_Mobile").html();
    console.log(cartnumber);
    if (cartnumber < 1) {
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Please Shoopping",
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      window.location.href = "CheckOut.php";
    }
  });

  $("#delete_all").click(function () {
    if ($("#Cart_Total_Num").html() < 1) {
    } else {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "EXIT!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "serve/Cart_Delete_all.php",
            type: "post",
            data: {},
            dataType: "json",
            success: function (data) {
              console.log(data);
              $.each(data, function (key, val) {
                $.each(data.main, function (key, val) {
                  let arr = val["prod_id"];

                  Refresh_Value(arr);
                });

                Refresh_Value_Table();

                Refresh_Value_Table_Mobile();
              });
            },
          });
        }
      });
    }
  });

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
});
