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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // รับข้อมูลจากฟอร์ม
        $Pname = $_POST['name'];
        $count = $_POST['count'];

        // ตรวจสอบว่าได้รับข้อมูลหรือไม่
        if (!empty($Pname) && !empty($count)) {
            // เชื่อมต่อฐานข้อมูล
            $conn = new PDO("mysql:host=localhost; dbname=db; charset=utf8", "root", "");

            // เตรียม SQL สำหรับการแทรกข้อมูล
            $sql = "INSERT INTO list_pro (name, count) VALUES (:name, :count)";

            // เตรียมคำสั่ง SQL
            $stmt = $conn->prepare($sql);

            // ผูกค่ากับตัวแปร
            $stmt->bindParam(':name', $Pname);
            $stmt->bindParam(':count', $count);

            // Execute SQL
            $stmt->execute();

            // ปิดการเชื่อมต่อ
            $conn = null;
        } else {
            echo "กรุณากรอกข้อมูลให้ครบถ้วน";
        }
    }
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // รับข้อมูลจากฟอร์ม
        $Pname = $_POST['name'];
        $count = $_POST['count'];

        // ตรวจสอบว่าได้รับข้อมูลหรือไม่
        if (!empty($Pname) && !empty($count)) {
            // เชื่อมต่อฐานข้อมูล
            $conn = new PDO("mysql:host=localhost; dbname=db; charset=utf8", "root", "");

            // ตรวจสอบชื่อสินค้าว่าซ้ำหรือไม่
            $stmt = $conn->prepare("SELECT COUNT(*) FROM list_pro WHERE name = :name");
            $stmt->bindParam(':name', $Pname);
            $stmt->execute();
            $countResult = $stmt->fetchColumn();

            // ถ้ามีสินค้าชื่อนี้แล้ว
            if ($countResult > 0) {
                echo "<p class='text-danger'>ชื่อสินค้านี้มีอยู่ในฐานข้อมูลแล้ว กรุณากรอกชื่ออื่น</p>";
            } else {
                // เตรียม SQL สำหรับการแทรกข้อมูล
                $sql = "INSERT INTO list_pro (name, count) VALUES (:name, :count)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name', $Pname);
                $stmt->bindParam(':count', $count);

                // Execute SQL
                $stmt->execute();

                echo "<p class='text-success'>สินค้าถูกเพิ่มเรียบร้อยแล้ว</p>";
            }

            // ปิดการเชื่อมต่อ
            $conn = null;
        }
    }
    ?>



    <?php
    // เชื่อมต่อฐานข้อมูล
    $conn = new PDO("mysql:host=localhost; dbname=db; charset=utf8", "root", "");

    // ตรวจสอบหากมีการขอลบสินค้าจาก URL
    if (isset($_GET['delete_id'])) {
        $deleteId = $_GET['delete_id'];

        // เตรียม SQL สำหรับการลบข้อมูล
        $sql = "DELETE FROM list_pro WHERE id = :id";

        // เตรียมคำสั่ง SQL
        $stmt = $conn->prepare($sql);

        // ผูกค่ากับตัวแปร
        $stmt->bindParam(':id', $deleteId);

        // Execute SQL
        $stmt->execute();
    }

    // ดึงข้อมูลทั้งหมดจากตาราง
    $stmt = $conn->query("SELECT * FROM list_pro");
    $products = $stmt->fetchAll();

    // ปิดการเชื่อมต่อ
    $conn = null;
    ?>


    <?php
    // เชื่อมต่อฐานข้อมูล
    $conn = new PDO("mysql:host=localhost; dbname=db; charset=utf8", "root", "");

    // ดึงข้อมูลทั้งหมดจากตาราง
    $stmt = $conn->query("SELECT * FROM list_pro");
    $products = $stmt->fetchAll();

    // ปิดการเชื่อมต่อ
    $conn = null;
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
                <form method="POST" action="">
                    <div>
                        <label for="exampleFormControlInput1" class="form-label mt-4">ชื่อ</label>
                        <input class="form-control" id="exampleFormControlInput1" name="name" placeholder="กรุณาใส่ชื่อสินค้า">
                    </div>

                    <div>
                        <label for="exampleFormControlInput2" class="form-label mt-4">จำนวน</label>
                        <input class="form-control" id="exampleFormControlInput2" name="count" placeholder="กรุณากรอกจำนวนสินค้า">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">เพิ่ม</button>
                    </div>
                </form>


            </div>


            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $index => $product): ?>
                        <tr>
                            <th scope="row"><?php echo $index + 1; ?></th>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><?php echo htmlspecialchars($product['count']); ?></td>
                            <td>
                                <!-- ปุ่มลบส่งไปยังสคริปต์พร้อมกับ ID ของสินค้าที่จะลบ -->
                                <a href="?delete_id=<?php echo $product['id']; ?>" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>


</body>

</html>