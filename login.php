<?php

session_start(); // เริ่มต้นเซสชั่น

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-lg">
            <div class="row mt-5">
                <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
                <?php
                    if(isset($_SESSION['error'])){
                        echo "<div class='alert alert-danger'> ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง </div>";
                        unset($_SESSION['error']);
                    }
                ?> 
                <div class="col-lg-4 col-md-6 col-sm-8 col-10"> 
                        <div class="card">
                            <div class="card-header">Login</div>
                            <div class="card-body">
                                <form action="login_check.php" method="post">
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username :</label>
                                        <input type="text" name="username" id="username" class="form-control" required placeholder="onwaree@gmail.com">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="password" class="form-label">Password :</label>
                                        <div class="input-group">
                                            <input type="text" name="password" id="password" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                    <button type="submit" class="btn btn-secondary btn-sm me-2">Login</button>
                                </div>
                                </form>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div> 
            </div>

            <br>
            <div style="text-align: center;">
                ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสามาชิก</a>
            </div>

    </div>
</body>
</html>