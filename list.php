<?php
$sName = 'localhost';
$uName = 'root';
$uPass = '';
$dbName = 'db';

$conn = new mysqli($sName, $uName, $uPass, $dbName);
mysqli_set_charset($conn, "utf8");

$sql = "SELECT id, name FROM list_pro";
$result = $conn->query($sql);

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
      <div class="col-lg-1 col-md-1 col-sm-1"></div>
      <div class="col-lg-10 col-md-10 col-sm-10">
        <button type="button" class="btn btn-primary" onclick="insertDropdown()"><i class="bi bi-plus"></i> เพิ่มรายการที่ต้องซื้อ</button>
        <div id="insertDropdown"></div>

      </div>


    </div>
    <div class="col-lg-1 col-md-1 col-sm-1"></div>
  </div>
  </div>

  <script>
    function insertDropdown() {
      const mainContainer = document.createElement('div');
      mainContainer.classList.add('field', 'item', 'form-group');

      const checkbox = document.createElement('input');
      checkbox.setAttribute('for', 'checkbox');
      checkbox.classList.add('form-check-input');
      checkbox.type = 'checkbox';

      mainContainer.appendChild(checkbox);

      const colKPIMain = document.createElement('div');
      colKPIMain.classList.add('col-md-6', 'col-sm-6');

      const nameDropdown = document.createElement('select');
      nameDropdown.classList.add('form-control');
      nameDropdown.name = 'name';

      <?php
      while ($row = $result->fetch_assoc()) {
        echo "const option = document.createElement('option');";
        echo "option.value = '" . $row['id'] . "';";
        echo "option.textContent = '" . $row['name'] . "';";
        echo "nameDropdown.appendChild(option);";
      }
      ?>


      colKPIMain.appendChild(nameDropdown);
      mainContainer.appendChild(colKPIMain);

      const deleteButton = document.createElement('button');
      deleteButton.type = 'button';
      deleteButton.classList.add('btn', 'btn-danger', 'ml-2'); // เพิ่มคลาส Bootstrap
      deleteButton.textContent = 'ลบ';
      deleteButton.onclick = function() {
        mainContainer.remove(); // ลบ mainContainer เมื่อคลิกปุ่ม
      };

      // เพิ่มปุ่มลบลงใน mainContainer
      mainContainer.appendChild(deleteButton);



      document.getElementById('insertDropdown').appendChild(mainContainer);
    }
  </script>

</body>

</html>