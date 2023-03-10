<style>
.bgc {
    background-color: purple;
}

.borderstyle {
    border-style: solid;
    border-width: 5px;
    border-color: purple;
}
</style>

<?php require 'customer_script.php' ?>

<a type="button" name="add" id="add" class="btn btn-primary">เพิ่มลูกค้า</a>

<div class=" box">
    <div class="table-responsive">
        <br />
        <div id="alert_message"></div>
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ชื่อ </th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ที่อยู่</th>
                    <th scope="col">การแพ้ยา</th>
                    <th scope="col">เมนู</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<script>
$(document).ready(function() {
            // /////////////////////////////////////////////////////////////////////////////////////
            fetch_data();

            function fetch_data() {
                var dataTable = $("#user_data").DataTable({
                    processing: true,
                    serverSide: true,
                    order: [],
                    ajax: {
                        url: "customer_fetch.php",
                        type: "POST",
                    },
                });
            }
            // /////////////////////////////////////////////////////////////////////////////////////

            // ///////////////////////////////////// add //////////////////////////////////////////////
            $("#add").click(function() {
                var html = "<tr>";
                html += '<td contenteditable id="data1"></td>';
                html += '<td contenteditable id="data2"></td>';
                html += '<td contenteditable id="data3"></td>';
                html += '<td contenteditable id="data4"></td>';
                html += '<td contenteditable id="data5"></td>';
                html +=
                    '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">เพิ่มข้อมูล</button></td>';
                html += "</tr>";
                $("#user_data tbody").prepend(html);
            });

            $(document).on("click", "#insert", function() {
                var customer_name = $("#data1").text();
                var customer_last = $("#data2").text();
                var customer_phone = $("#data3").text();
                var customer_address = $("#data4").text();
                var customer_drug = $("#data5").text();
                if (customer_phone != "") {
                    $.ajax({
                        url: "customer_insert_sql.php",
                        method: "POST",
                        data: {
                            customer_name: customer_name,
                            customer_last: customer_last,
                            customer_phone: customer_phone,
                            customer_address: customer_address,
                            customer_drug: customer_drug,
                        },
                        success: function(data) {
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
                    setInterval(function() {
                        $("#alert_message").html("");
                    }, 5000);
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'บันทึกไม่ได้',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
            // ///////////////////////////////////// add //////////////////////////////////////////////

            // ///////////////////////////////////// update //////////////////////////////////////////////
            function update_data(customer_id, column_name, value) {
                $.ajax({
                    url: "customer_update.php",
                    method: "POST",
                    data: {
                        customer_id: customer_id,
                        column_name: column_name,
                        value: value,
                    },
                    success: function(data) {
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
                setInterval(function() {
                    $("#alert_message").html("");
                }, 5000);
            }

            $(document).on("blur", ".update", function() {
                var customer_id = $(this).data("customer_id");
                var column_name = $(this).data("column");
                var value = $(this).text();
                update_data(customer_id, column_name, value);
            });
            // ///////////////////////////////////// update //////////////////////////////////////////////

            // ///////////////////////////////////// delete //////////////////////////////////////////////
            $(document).on("click", ".delete", function() {
                var customer_id = $(this).attr("customer_id");
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
                            url: "customer_delete.php",
                            method: "POST",
                            data: {
                                customer_id: customer_id,
                            },
                            success: function(data) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'ลบเรียบร้อย',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $("#user_data").DataTable().destroy();
                                fetch_data();
                            },
                        });
                        setInterval(function() {
                            $("#alert_message").html("");
                        }, 5000);
                    }
                });
            });
        });

            // ///////////////////////////////////// update //////////////////////////////////////////////
</script>