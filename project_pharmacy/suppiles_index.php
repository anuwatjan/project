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

<?php require 'suppiles_script.php' ?>

<a type="button" name="add" id="add" class="btn btn-primary">เพิ่มซัพพลายเซน</a>

<div class=" box">
    <div class="table-responsive">
        <br />
        <div id="alert_message"></div>
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ชื่อ นามสกุล</th>
                    <th scope="col">บริษัท</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ที่ตั้ง</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">ข้อมูล</th>
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
                        url: "suppiles_fetch.php",
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
                html += '<td contenteditable id="data6"></td>';
                html +=
                    '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">เพิ่มข้อมูล</button></td>';
                html += "</tr>";
                $("#user_data tbody").prepend(html);
            });

            $(document).on("click", "#insert", function() {
                var suppiles_name = $("#data1").text();
                var suppiles_company = $("#data2").text();
                var suppiles_phone = $("#data3").text();
                var suppiles_address = $("#data4").text();
                var suppiles_email = $("#data5").text();
                var description = $("#data6").text();
                if (suppiles_phone != "") {
                    $.ajax({
                        url: "suppiles_insert.php",
                        method: "POST",
                        data: {
                            suppiles_name: suppiles_name,
                            suppiles_company: suppiles_company,
                            suppiles_phone: suppiles_phone,
                            suppiles_address: suppiles_address,
                            suppiles_email: suppiles_email,
                            description: description,
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
            function update_data(suppiles_id, column_name, value) {
                $.ajax({
                    url: "suppiles_update.php",
                    method: "POST",
                    data: {
                        suppiles_id: suppiles_id,
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
                var suppiles_id = $(this).data("suppiles_id");
                var column_name = $(this).data("column");
                var value = $(this).text();
                update_data(suppiles_id, column_name, value);
            });
            // ///////////////////////////////////// update //////////////////////////////////////////////

            // ///////////////////////////////////// delete //////////////////////////////////////////////
            $(document).on("click", ".delete", function() {
                var suppiles_id = $(this).attr("suppiles_id");
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
                            url: "suppiles_delete.php",
                            method: "POST",
                            data: {
                                suppiles_id: suppiles_id,
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