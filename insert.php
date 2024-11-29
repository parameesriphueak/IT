<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <?php
        $sName = 'localhost';
        $uName = 'root';
        $uPass = '';
        $dbName = 'it';

        $conn = new mysqli($sName, $uName, $uPass, $dbName);
        mysqli_set_charset($conn, "utf8");
        // if($conn->connect_error){
        //     echo $conn->connect_error;
        //     exit;
        // }
        // else{
        //     echo "Database Connected";
        // }
    
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">เพิ่ม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">รายการ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="mt-4 text-center">รายการสินค้าที่ต้องซื้อ</h1>
    <div class="col-md-1 col-sm-1"></div>
    <div class="md-3 col-md-10 col-sm-10 ">
        <div>
            <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
            <input class="form-control" id="exampleFormControlInput1" placeholder="กรุณาใส่ชื่อสินค้า">
        </div>

        <div>
            <label for="exampleFormControlInput1" class="form-label">จำนวน</label>
            <input class="form-control" id="exampleFormControlInput1" placeholder="กรุณากรอกจำนวนสินค้า">
        </div>
        <div class="mt-4">
            <button type="button" class="btn btn-success">เพิ่ม</button>
        </div>

    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">จำนวน</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>



</body>

</html>