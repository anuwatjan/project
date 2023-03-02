// เช็คว่าเผลอรีเฟรชโดยที่ส่งใบออกไปแล้ว ให้ทำการย้อนกลับไปปหน้าแรก

// var show_po_id_ = $("#show_po_id_").html();

// console.log(show_po_id_);

// $.ajax({
//   url: "serve/check_bank.php",

//   type: "post",

//   data: { show_po_id_: show_po_id_ },

//   dataType: "json",

//   success: function (data) {
//     console.log(data);

//     $.each(data, function (key, val) {
//       if (val["status"] == "YES") {
//         Swal.fire({
//           position: "center",
//           icon: "error",
//           title: "Your Not work has been saved!",
//           showConfirmButton: false,
//           timer: 1500,
//         });

//         window.location.href = "index.php";
//       }
//     });
//   },
// });

$("#bac_id").html();

$(document).ready(function () {
  $("input[type='radio']").click(function () {
    var radioValue = $("input[name='bac_id']:checked").val();
    // console.log(radioValue);
    $("#bac_id").html(radioValue);
  });

  $("#emp-savebank").on("submit", function (e) {
    e.preventDefault();

    var tranfershow = $("#tranfershow").html();

    var sto_id = $("#sto_id").html();

    var bac_id = $("#bac_id").html(); //ธนาคารผู้ขายที่เราเลือก

    console.log(bac_id);

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Confirm Payment!",
      cancelButtonText: "Exit!",
    }).then((result) => {
      if (result.isConfirmed) {
        if (sto_id != "" && tranfershow != "" && bac_id != "") {
          var formData = new FormData($(this)[0]);

          console.log(formData);

          $.ajax({
            url: "serve/bank_sql.php",

            type: "post",

            data: formData,

            processData: false,

            contentType: false,

            success: function (data) {
              console.log(data);

              let persontt = $.parseJSON(data);

              $.each(persontt, function (key, val) {
                if (val["status"] == "YES") {
                  Swal.fire("SAVE!", "OK.", "success");
                  window.location.href="Profile.php";
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
            title: "Not Pay Now Becasue Bank Account in Member Not have",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      }
    });
  });

  $("#emp-savebank1").on("submit", function (e) {

    e.preventDefault();

    var tranfershow = $("#tranfershow").html();

    var sto_id = $("#sto_id").html();

    var bac_id = $("#bac_id").html(); //ธนาคารผู้ขายที่เราเลือก

    console.log(bac_id);

       Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Confirm Payment!",
      cancelButtonText: "Exit!",
    }).then((result) => {
      if (result.isConfirmed) {
        if (sto_id != "" && tranfershow != "" && bac_id != "") {
          var formData = new FormData($(this)[0]);

          console.log(formData);

          $.ajax({
            url: "serve/bank_sql.php",

            type: "post",

            data: formData,

            processData: false,

            contentType: false,

            success: function (data) {
              console.log(data);

              let persontt = $.parseJSON(data);

              $.each(persontt, function (key, val) {
                if (val["status"] == "YES") {
                  Swal.fire("SAVE!", "OK.", "success");
                  window.history.go(-1);
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
            title: "Not Pay Now Becasue Bank Account in Member Not have",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      }
    });

  });

  $(".cancel_po").click(function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Delete Order!",
      cancelButtonText: "Exit!",
    }).then((result) => {
      if (result.isConfirmed) {
        var po_id = $(this).attr("data-id");

        console.log(po_id);

        $.ajax({
          url: "serve/cencel_po.php",

          type: "post",

          data: {
            po_id: po_id,
          },

          dataType: "json",

          success: function (data) {
            console.log(data);

            $.each(data, function (key, val) {
              if (val["status"] == "YES") {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "Your work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                });
              } else {
                Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "Your work has been Not saved",
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

  $(".receive_po").click(function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Receive it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var po_id = $(this).attr("data-id");

        console.log(po_id);

        $.ajax({
          url: "serve/receive_po.php",

          type: "post",

          data: {
            po_id: po_id,
          },

          dataType: "json",

          success: function (data) {
            console.log(data);

            $.each(data, function (key, val) {
              if (val["status"] == "YES") {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "Your work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                });
              } else {
                Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "Your work has been Not saved",
                  showConfirmButton: false,
                  timer: 1500,
                });

                location.reload();
              }
              location.reload();
            });
          },
        });
      }
    });
  });

  $("#close_modal").click(function(){
    $("#backDropModal").modal("hide");
  
  })

});

$("#paymentslip").click(function(){
  $("#backDropModal").modal("show");
  var po_id = $(this).attr("data-id");
  console.log(po_id);
  $.ajax({
    url: "serve/PO_slip.php",
    type: "post",
    data: {
      po_id: po_id,
    },
    dataType: "json",
    success: function (data) {
      var html = "";
      $.each(data.pay, function (key, val) {
        console.log(val['tranfer_image']);
        html +=
        '<center><img src="../backend/getimg/slip/' + val['tranfer_image'] +'" width="50%;"></center>';
      })
      $("#show_payment").html(html);
    }
  })
})

