<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $sName = 'localhost';
    $uName = 'root';
    $uPass = '';
    $dbName = 'db';

    $conn = new PDO("mysql:host=$sName; dbname=$dbName", $uName, $uPass);
    $conn->exec("SET CHARACTER SET utf8");

    $result = $conn->query("SELECT name, count FROM list_pro");

    if($result !== false){
        echo 'There is ' . $result->rowCount() . "application in db <br>";
        foreach($result as $row){
            echo '- ' . $row['name'] ." " . $row['count'];
        }
    }

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

    <div class="container">

        <h1 class="mt-4 text-center">รายการสินค้าที่ต้องซื้อ</h1>

        <div class="row">

            <div class="md-3 col-sm-1 col-md-10 col-lg-10">
                <div>
                    <label for="exampleFormControlInput1" class="form-label mt-4">ชื่อ</label>
                    <input class="form-control" id="exampleFormControlInput1" placeholder="กรุณาใส่ชื่อสินค้า">
                </div>

                <div>
                    <label for="exampleFormControlInput1" class="form-label mt-4">จำนวน</label>
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
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>