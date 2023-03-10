$(document).ready(function () {
  // /////////////////////////////////////////////////////////////////////////////////////
  fetch_data();

  function fetch_data() {
    var dataTable = $("#user_data").DataTable({
      processing: true,
      serverSide: true,
      order: [],
      ajax: {
        url: "user_fetch.php",
        type: "POST",
      },
    });
  }
  // /////////////////////////////////////////////////////////////////////////////////////

  // ///////////////////////////////////// add //////////////////////////////////////////////
  $("#add").click(function () {
    var html = "<tr>";
    html += '<td contenteditable id="data1"></td>';
    html += '<td contenteditable id="data2"></td>';
    html += '<td contenteditable id="data3"></td>';
    html += '<td contenteditable id="data4"></td>';
    html += '<td contenteditable id="data5"></td>';
    html += '<td contenteditable id="data6"></td>';
    html +=
      '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">เพิ่มข้อมูล</button></td>';
    html += "</tr>";
    $("#user_data tbody").prepend(html);
  });

  $(document).on("click", "#insert", function () {
    var employee_name = $("#data1").text();
    var employee_phone = $("#data2").text();
    var employee_email = $("#data3").text();
    var employee_role = $("#data4").text();
    var username = $("#data5").text();
    var password = $("#data6").text();
    if (employee_name != "" && employee_phone != "") {
      $.ajax({
        url: "user_insert.php",
        method: "POST",
        data: {
          employee_name: employee_name,
          employee_phone: employee_phone,
          employee_email: employee_email,
          employee_role: employee_role,
          username: username,
          password: password,
        },
        success: function (data) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'บันทึกเรียบร้อย',
            showConfirmButton: false,
            timer: 1500
          })
          $("#user_data").DataTable().destroy();
          fetch_data();
        },
      });
      setInterval(function () {
        $("#alert_message").html("");
      }, 5000);
    } else {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'บันทึกไม่ได้',
        showConfirmButton: false,
        timer: 1500
      })
    }
  });
  // ///////////////////////////////////// add //////////////////////////////////////////////

  // ///////////////////////////////////// update //////////////////////////////////////////////
  function update_data(employee_id, column_name, value) {
    $.ajax({
      url: "user_update.php",
      method: "POST",
      data: {
        employee_id: employee_id,
        column_name: column_name,
        value: value,
      },
      success: function (data) {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'แก้ไขเรียบร้อย',
          showConfirmButton: false,
          timer: 1500
        })
        $("#user_data").DataTable().destroy();
        fetch_data();
      },
    });
    setInterval(function () {
      $("#alert_message").html("");
    }, 5000);
  }

  $(document).on("blur", ".update", function () {
    var employee_id = $(this).data("employee_id");
    var column_name = $(this).data("column");
    var value = $(this).text();
    update_data(employee_id, column_name, value);
  });
  // ///////////////////////////////////// update //////////////////////////////////////////////

  // ///////////////////////////////////// delete //////////////////////////////////////////////
  $(document).on("click", ".delete", function () {
    var employee_id = $(this).attr("employee_id");
    Swal.fire({
      title: 'คุณต้องการลบหรือไม่',
      text: "ลบแล้วไม่สามารถเปลี่ยนกลับได้อีก",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่ ฉันต้องการลบ',
      cancelButtonText: 'ยกเลิก'
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url: "user_delete.php",
              method: "POST",
              data: {
                employee_id: employee_id
              },
              success: function(data) {
                  Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'ลบเรียบร้อย',
                      showConfirmButton: false,
                      timer: 1500
                  })
                  $('#user_data').DataTable().destroy();
                  fetch_data();
              }
          });
          setInterval(function() {
              $('#alert_message').html('');
          }, 5000);
      }
  })
  });
});
// ///////////////////////////////////// update //////////////////////////////////////////////
