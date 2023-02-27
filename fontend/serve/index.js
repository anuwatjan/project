$(document).ready(function () {
  console.log("เริ่มต้นการทำงาน");

  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).bind("selectstart", function (e) {
    e.preventDefault();
  });

  add_product(0);

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
          if (val["status"] == "YES") {
            // เอาลงได้เลย เพราะไม่มี
            var product_id = val["prod_id"];
            Cart_Insert(product_id);
          } else {
            // มี โชว์ modal
          }
        });
      },
    });
  }

  function Cart_Insert(product_id) {
    $.ajax({
      url: "serve/add_product.php",
      type: "POST",
      data: { product_id: product_id },
      dataType: "json",
      success: function (data) {
        htmls = "";
        var htmls_num = 0;
        var toto = 0;
        $.each(data, function (key, val) {
          htmls += '<div class="d-flex align-items-center mb-5">';

          htmls +=
            '<img class="img-fluid flex-shrink-0 rounded-circle" src="../backend/getimg/prod/' +
            val["product_img"] +
            '" alt="' +
            val["product_name"] +
            '" style="width: 65px; height: 65px;">';

          htmls += '<div class="ps-4">';

          htmls += '<h6 class="mb-1"> ' + val["product_name"] + " </h6>";
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
});
