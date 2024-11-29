<?php
$sName = 'localhost';
$uName = 'root';
$uPass = '';
$dbName = 'db';

$conn = new mysqli($sName, $uName, $uPass, $dbName);
mysqli_set_charset($conn, "utf8");

$sql = "SELECT id, name, count FROM list_pro";
$result = $conn->query($sql);

$options = array();
while ($row = $result->fetch_assoc()) {
  $options[] = $row;
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Insert</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Insert.php">เพิ่ม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list.php">รายการ</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <h2 class="text-center">รายการที่ต้องซื้อ</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <!-- <button type="button" class="btn btn-primary" onclick="insertDropdown()"><i class="bi bi-plus"></i> เพิ่มรายการที่ต้องซื้อ</button> -->
        <!-- <div id="insertDropdown"></div> -->


        <?php
        $con1 = new PDO("mysql:host=localhost;dbname=db;charset=utf8", "root", "");
        $sql1 = "SELECT id,name , count,status  FROM list_pro";
        foreach ($con1->query($sql1) as $row) {
        ?>
          <div class="d-flex align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-2">
              <input type="checkbox" <?php if($row[3] == 1) echo 'checked';?>>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
              <input type="text" value="<?= $row[1] ?>" disabled>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 ">
              <input type="text" value="<?= $row[2] ?>" >
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
              <button class="btn btn-danger" onclick="deleteList(this)"><i class="bi bi-trash"></i></button>
            </div>
          </div>



        <?php }
        $conn = null;
        ?>



      </div>


    </div>
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
  </div>
  </div>


  <script>
    // ฟังก์ชันลบแถวที่กด
    function deleteList(button) {
      // ใช้ parentElement เพื่อไปหาผู้ปกครองที่อยู่ในระดับเดียวกัน (แถว)
      if (confirm('คุณต้องการลบใช่หรือไม่')) {
        const row = button.closest('.d-flex'); // ค้นหา div ที่มี class "d-flex" ที่เป็นแถว
        row.remove(); // ลบแถว
      }

    }
  </script>

</body>

</html>