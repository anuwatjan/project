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

<?php require 'user_script.php' ?>

<a type="button" name="add" id="add" class="btn btn-primary ">เพิ่มสมาชิก</a>
<div class="box">
    <div class="table-responsive">
        <br />
        <div id="alert_message"></div>
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">เมนู</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript" language="javascript" src="user_insert.js"></script>