$(document).ready(function () {
  console.log("เริ่มต้นการทำงาน");

  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  add_product(0);

  // รีวิว และ เกี่ยวกับ
  $("#review_info").click(function () {
    var sto_id = $(this).attr("data-id");
    $("#Review_Detail" + sto_id).modal("toggle");
    $.ajax({
      url: "serve/Review_Store.php",
      type: "POST",
      dataType: "json",
      data: { sto_id: sto_id },
      success: function (data) {
        console.log(data);
        $.each(data, function (key, val) {
          $("#Review_Show_Detail_Images").html(
            '<img src="../backend/getimg/logo/' +
              val["sto_logo"] +
              '" alt=""  style="" width="100%" height="300px;">'
          );

          $("#Review_Show_Detail_Name").html(
            '<h2 class="text-center">' +
              val["sto_name"] +
              "</h2>" +
              "<br>" +
              "<h3> Address </h3>" +
              "<br>" +
              "<p>" +
              val["address"] +
              "</p>"
          );
        });
      },
    });
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

  // กดคลิกจะเลื่อนตามหมวดหมู่

  $("#Box_Category").on("click", ".Category_id", function () {
    var cat_id = $(this).attr("data-id");
    console.log(cat_id);
    scrollFunction(cat_id);
  });

  function scrollFunction(cat_id) {
    var pro_cat_id = document.getElementById("category" + cat_id);
    pro_cat_id.scrollIntoView({
      behavior: "smooth",
      block: "center",
      inline: "end",
    });
  }

  // คลิกสินค้า แล้วเช้คเงื่อนไข
  $("#box_product").on("click", "#Product_Click", function () {
    var product_id = $(this).attr("data-id");
    console.log(product_id);
    $("#show_prod_id").html(product_id);
    add_product(product_id);
  });

  // รับค่ามาก่อน เช็คว่ามีไหม
  function add_product(product_id) {
    $.ajax({
      url: "serve/Product_Check_Sub.php",
      type: "POST",
      data: { product_id: product_id },
      dataType: "json",
      success: function (data) {
        htmls = "";
        var htmls_num = 0;
        var toto = 0;
        $.each(data, function (key, val) {
          var product_id = val["prod_id"];
          if (val["status"] == "YES") {
            // เอาลงได้เลย เพราะไม่มี
            Cart_Insert_not(product_id);
          } else {
            // มี โชว์ modal
            $("#Product_Detail").modal("toggle");
            Product_Show_Detail(product_id);
          }
        });
      },
      error: function () {
        alert("เกิดข้อผิดพลาด ---222-");
      },
    });
  }

  // โชว์รายละเอียดสินค้าบน modal
  function Product_Show_Detail(product_id) {
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
      data: { product_id: product_id },
      success: function (data) {
        // console.log(data);
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

  // กดปุ่มลบออก
  $("#show_add_product").on("click", "#ok_add_product_dele", function () {
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
        var product_id = $(this).attr("product_id");
        console.log(product_id);
        $.ajax({
          url: "serve/dele_product.php",
          type: "POST",
          data: { product_id: product_id },
          dataType: "json",
          success: function (data) {
            // console.log(data);
            $.each(data, function (key, val) {
              add_product(0);
            });
          },
        });
      }
    });
  });

  // กดปุ้มลบ
  $("#show_add_product").on("click", "#ok_add_product_dow", function () {
    var product_id = $(this).attr("product_id");
    var name = "d";
    quantity_product(product_id, name);
  });

  // กดปุ่มบวก
  $("#show_add_product").on("click", "#ok_add_product_up", function () {
    var product_id = $(this).attr("product_id");
    var name = "b";
    quantity_product(product_id, name);
  });

  // ปรับปรุงจำนวน
  function quantity_product(product_id, name) {
    $.ajax({
      url: "serve/quantity_product.php",
      type: "POST",
      data: { product_id: product_id, name: name },
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          add_product(0);
        });
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

  // กดปุ่มลงตะกร้า
  $("#ok_inset_cart").click(function (e) {
    e.preventDefault();
    var product_id = $("#show_prod_id").html(); //รหัสสินค้า
    // Cart_Insert(product_id);
  });

  // คำสั่งลงตะกร้าจริงๆ แบบย่อย
  function Cart_Insert(product_id) {
    var show_sub_prod_id = $("#show_sub_prod_id").html(); //รหัสสินค้าย่อย
    var show_sub_prodone_id = $("#show_sub_prodone_id").html(); //รหัสสินค้าย่อย 1
    var show_quantity_de = $("#show_quantity_de").html(); //จำนวนที่รับ
    var show_sto_id = $("#show_sto_id").html(); //รหัสร้านค้า
    var show_category = $("#show_category").html(); //รหัสหมวดหมู่
    var show_sub_category = $("#show_sub_category").html(); //รหัสหมวดหมู่ย่อย
    var show_price_simple_total = $("#show_price_simple_total").html(); //ราคารวมจริง
    var message = $("#message").val(); //หมายเหตุ

    $.ajax({
      url: "serve/add_product.php",
      type: "POST",
      data: {
        product_id: product_id, //รหัสสินค้า
        show_sub_prod_id: show_sub_prod_id, //รหัสสินค้าย่อย
        show_sub_prodone_id: show_sub_prodone_id, //รหัสสินค้าย่อย 1
        show_quantity_de: show_quantity_de, //จำนวนที่รับ
        show_sto_id: show_sto_id, //รหัสร้านค้า
        show_category: show_category, //รหัสหมวดหมู่
        show_sub_category: show_sub_category, //รหัสหมวดหมู่ย่อย
        show_price_simple_total: show_price_simple_total, //ราคารวมจริง
        message: message, //หมายเหตุ
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        htmls = "";
        var htmls_num = 0;
        var toto = 0;
        $.each(data, function (key, val) {
          // console.log(data.mainArray_subproduct[0]);

          // if (val["status"] == "NOS") {
          //   Swal.fire({
          //     position: "center",
          //     icon: "error",
          //     title: "Please Select SubProduct",
          //     showConfirmButton: false,
          //     timer: 1500,
          //   });

          //  } else if (val["status"] == "NOS1") {
          //   Swal.fire({
          //     position: "center",
          //     icon: "error",
          //     title: "Please Select SubProduct1",
          //     showConfirmButton: false,
          //     timer: 1500,
          //   });

          // } else if (val["status"] == "NO") {
          //   Swal.fire({
          //     position: "center",
          //     icon: "error",
          //     title: "saved successfully",
          //     showConfirmButton: false,
          //     timer: 1500,
          //   });

          // } else if (val["status"] == "NOSsto") {
          //   Swal.fire({
          //     title: "Are you sure?",
          //     text: "Your basket contains another store.",
          //     icon: "warning",
          //     showCancelButton: true,
          //     confirmButtonColor: "#3085d6",
          //     cancelButtonColor: "#d33",
          //     confirmButtonText: "Yes, Change it!",
          //   }).then((result) => {
          //     if (result.isConfirmed) {
          //       changecart_inset("det");
          //       Swal.fire("Change!", "CHANGE OK.", "success");
          //     }
          //   });

          // }

          htmls += '<div class="d-flex align-items-center mb-5">';

          htmls +=
            '<img class="img-fluid flex-shrink-0 rounded-circle" src="../backend/getimg/prod/' +
            val["product_img"] +
            '" alt="' +
            val["product_name"] +
            '" style="width: 65px; height: 65px;">';

          htmls += '<div class="ps-4">';

          htmls +=
            '<h6 class="mb-1"> ' +
            val["product_name"] +
            "</br>" +
            val["sprod_name"] +
            val["message"] +
            " </h6>";
          htmls +=
            "<span>" +
            val["product_quantity"] +
            " x " +
            (val["product_price"] * 1).toFixed(2) +
            "</span> ";

          htmls += "<br>";

          htmls +=
            '<button type="button"   id="ok_add_product_dow"   class="btn btn-warning text-white" product_id = "' +
            val["product_id"] +
            '" >-</button> ';
          htmls +=
            '<button type="button"   id="ok_add_product_up"   class="btn btn-success" product_id = "' +
            val["product_id"] +
            '" >+</button> ';

          htmls +=
            '<button type="button"   id="ok_add_product_dele"   class="btn btn-danger" product_id = "' +
            val["product_id"] +
            '" ><i class="bi bi-archive-fill"></i></button> ';

          htmls += "</div>";

          htmls += "</div>";

          toto =
            toto + val["product_quantity"] * 1 * (val["product_price"] * 1);
        });

        $("#show_add_product").html(htmls);
        $(".toto_add_product").html((toto * 1).toFixed(2));
      },
    });
  }

  // คำสั่งลงตะกร้าจริงๆ แบบไม่ย่อย
  function Cart_Insert_not(product_id) {
    $.ajax({
      url: "serve/add_product_not.php",
      type: "POST",
      data: {
        product_id: product_id, //รหัสสินค้า
      },
      // dataType: "json",
      success: function (data) {
        htmls = "";
        var htmls_num = 0;
        var toto = 0;
        var suu = "";
        $.each(data, function (key, val) {
          htmls += '<div class="d-flex align-items-center mb-5">';

          htmls +=
            '<img class="img-fluid flex-shrink-0 rounded-circle" src="../backend/getimg/prod/' +
            val["product_img"] +
            '" alt="' +
            val["product_name"] +
            '" style="width: 65px; height: 65px;">';

          htmls += '<div class="ps-4">';

          htmls +=
            '<h6 class="mb-1"> ' +
            val["product_name"] +
            val["sprod_name"] +
            " </h6>";
          htmls +=
            "<span>" +
            val["product_quantity"] +
            " x " +
            (val["product_price"] * 1).toFixed(2) +
            "</span> ";

          htmls += "<br>";

          htmls +=
            '<button type="button"   id="ok_add_product_dow"   class="btn btn-warning text-white" product_id = "' +
            val["product_id"] +
            '" >-</button> ';
          htmls +=
            '<button type="button"   id="ok_add_product_up"   class="btn btn-success" product_id = "' +
            val["product_id"] +
            '" >+</button> ';

          htmls +=
            '<button type="button"   id="ok_add_product_dele"   class="btn btn-danger" product_id = "' +
            val["product_id"] +
            '" ><i class="bi bi-archive-fill"></i></button> ';

          htmls += "</div>";

          htmls += "</div>";

          toto =
            toto + val["product_quantity"] * 1 * (val["product_price"] * 1);

          // if (val["sum"] > 0) {
          //   suu = "Your order from";
          // } else {
          //   suu = "Not Order";
          // }
        });

        $("#show_add_product").html(htmls);
        $(".toto_add_product").html((toto * 1).toFixed(2));
        // $(".show_num_cart").html('<p>'+suu+'</p>');
      },
    });
  }

  // กดปุ่ม checkout
  $("#checkout").click(function () {
    $.ajax({
      url: "serve/Product_Insert_Cart.php",
      type: "post",
      data: {
      },
      // dataType: "json",
      success: function (data) {
        $.each(data, function (key, val) {
          console.log(data);
        });
      },
    });
    // window.location.href = "CheckOut.php";
    // }
  });

  // รับค่าน้องสวิต
  $('[type="checkbox"]').click(function (e) {
    var isChecked = $(this).is(":checked");
    console.log("isChecked: " + isChecked);
  });
});
