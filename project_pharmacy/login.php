<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="container mt-5 pt-5">

    <h1 class="mb-5">ยินดีต้อนรับเข้าสู่ ระบบร้านขายยาดาชัย์ By เจ๊แนน</h1>
    
    <center>
    <form id="emp-login" method="post" class="user">
            <!-- Email input -->
            
            <div class="col-md-6">
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Username</label>
                <input type="text" name="username" id="username" class="form-control" />
       
            </div>
            </div> 
            <div class="col-md-6"> 
            <!-- Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
                <input type="password" name="password" id="password" class="password form-control" />
            </div> 
            </div>



            <!-- Submit button -->
            <button type="submit" id="ok_login" class="btn btn-primary btn-block mb-4">เข้าสู่ระบบ</button>


        </form>
        </center>
    </div>

</body>

</html>

<script src="login.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
