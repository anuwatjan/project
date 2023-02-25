$(document).ready(function () {
  var showproduct_name = $(".showproduct_name").text();

  if (showproduct_name == "") {
    $("#buttonclick_print").hide();
    $("#clickshowinvoice").hide();
  }

  var get = $(".get").text();
  if (get.includes("น้อย")) {
    Swal.fire({
      position: "center",
      icon: "error",
      title: "จำนวนเงินรับมาน้อยกว่าราคาขายจริง",
      showConfirmButton: false,
      timer: 1500,
    });
    $("#buttonclick_print").hide();
    $("#clickshowinvoice").hide();
  } else {
    $("#buttonclick_print").show();
    $("#clickshowinvoice").show();
  }

  $("#valuecustomer_name").html();

  var str = $(".price").text();
  if (str.includes("ไม่")) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "สินค้าไม่เพียงพอ กรุณาปรับจำนวนใหม่",
      showConfirmButton: false,
      timer: 1500,
    });
    $("#buttonclick_print").hide();
    $("#clickshowinvoice").hide();
  } else {
    $("#buttonclick_print").show();
    $("#clickshowinvoice").show();
  }

  // $("#container").on("click", "#customer_name", function () {
  //   var valuecustomer_name = $("#customer_name").find(":selected").val();

  //   console.log(valuecustomer_name);

  //   $("#valuecustomer_name").html(valuecustomer_name);
  // });

  $("#clickshowinvoice").click(function () {
    $("#exampleModal").modal("show");
  });

  $("#closemodal").click(function () {
    $("#exampleModal").modal("hide");
  });

  // $("#buttonclick_print").click(function () {
  //   var pricetotal = $("#pricetotal").text();

  //   var priceget = document.getElementById("priceget").value;

  //   if (pricetotal > priceget) {
  //     Swal.fire({
  //       position: "top-end",
  //       icon: "error",
  //       title: "จำนวนเงินที่รับมาน้อยกว่าราคาที่ต้องจ่าย",
  //       showConfirmButton: false,
  //       timer: 1500,
  //     });
  //   }
  // });

  // var str = $(".price").text();
  // if (str.includes("ไม่")) {
  //   Swal.fire({
  //     position: "top-end",
  //     icon: "error",
  //     title: "สินค้าไม่เพียงพอ กรุณาปรับจำนวนใหม่",
  //     showConfirmButton: false,
  //     timer: 1500,
  //   });
  //   $("#buttonclick_print").hide();
  //   $("#clickshowinvoice").hide();
  // } else {
  //   $("#buttonclick_print").show();
  //   $("#clickshowinvoice").show();
  // }
});
