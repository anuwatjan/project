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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<a type="button" name="add" id="add" class="btn btn-primary">เพิ่มหมวดหมู่แยกตามอาการ</a>
<div class=" box">
    <div class="table-responsive">
        <br />
        <div id="alert_message"></div>
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">หมวดหมู่ตามอาการ</th>
                    <th scope="col">เมนู</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function() {



            // /////////////////////////////////////////////////////////////////////////////////////
            fetch_data();


            function fetch_data() {
                var dataTable = $('#user_data').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "symp_fetch.php",
                        type: "POST"
                    }
                });
            }
            // /////////////////////////////////////////////////////////////////////////////////////




            // ///////////////////////////////////// add //////////////////////////////////////////////
            $('#add').click(function() {
                var html = '<tr>';
                html += '<td contenteditable id="data1"></td>';
                html +=
                    '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">เพิ่มข้อมูล</button></td>';
                html += '</tr>';
                $('#user_data tbody').prepend(html);
            });


            $(document).on('click', '#insert', function() {
                var symp_name = $('#data1').text();
                if (symp_name != '') {
                    $.ajax({
                        url: "symp_insert_sql.php",
                        method: "POST",
                        data: {
                            symp_name: symp_name,
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'บันทึกเรียบร้อย',
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
            function update_data(symp_id, column_name, value) {
                $.ajax({
                    url: "symp_update.php",
                    method: "POST",
                    data: {
                        symp_id: symp_id,
                        column_name: column_name,
                        value: value
                    },
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'แก้ไขเรียบร้อย',
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

            $(document).on('blur', '.update', function() {
                var symp_id = $(this).data("symp_id");
                var column_name = $(this).data("column");
                var value = $(this).text();
                update_data(symp_id, column_name, value);
            });
            // ///////////////////////////////////// update //////////////////////////////////////////////




            // ///////////////////////////////////// delete //////////////////////////////////////////////
            $(document).on('click', '.delete', function() {
                var symp_id = $(this).attr("symp_id");
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
                            url: "symp_delete.php",
                            method: "POST",
                            data: {
                                symp_id: symp_id
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
                });
            });
        });

            // ///////////////////////////////////// update //////////////////////////////////////////////
</script>