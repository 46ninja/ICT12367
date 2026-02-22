<?php
require('L5dbconnect.php');

$sql = "SELECT * FROM employees ORDER BY fname ASC";
$result=mysqli_query($connect,$sql);

$count=mysqli_num_rows($result);
$order=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="L5style.css">
    <title>ข้อมูลพนักงาน</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="L5about.php" class="navbar-brand">Technology Co., Ltd.</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbar1" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">เกี่ยวกับเรา</a>
                    </li>
                    </ul>
            </div>
        </div>
    </nav>
<!-- การสร้าง Slider -->
<section id="slider">
        <div class="carousel slide" data-bs-ride="carousel" id="mySlider">
            <ol class="carousel-indicators">
                <button data-bs-target="#mySlider" data-bs-slide-to="0" class="active"></button>
                <button data-bs-target="#mySlider" data-bs-slide-to="1"></button>
                <button data-bs-target="#mySlider" data-bs-slide-to="2" ></button>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-image-1 active">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block active">
                            <h1 class="display-1">ยินดีต้อนรับเข้าสู่ระบบ admin</h1>
                    </div>
                    </div>
                </div>
                <div class="carousel-item carousel-image-2">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block">
                        <h1 class="display-1">ยินดีต้อนรับเข้าสู่ระบบ admin</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-image-3">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block ">
                        <h1 class="display-1">ยินดีต้อนรับเข้าสู่ระบบ admin</h1>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" data-bs-target="#mySlider" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                 </button>
                <button class="carousel-control-next" data-bs-target="#mySlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>
<div class="container">
        <table class="table table-striped table-hover">
            <h1 class="text-center my-3">แสดงข้อมูลพนักงานทั้งหมด</h1>
            <br>
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เพศ</th>
                <th>ทักษะความสามารถ</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
            <td><?php echo $order++ ;?></td>
                <td><?php echo $row["fname"] ;?></td>
                <td><?php echo $row["lname"] ;?></td>
                <td><?php echo $row["gender"] ;?></td>
                <td><?php echo $row["skills"] ;?></td>
            </tr>
        <?php }?>
        </tbody>   
  </table> 
      <a href="L5insertform.php" class="btn btn-primary">บันทึกข้อมูลพนักงาน</a>
      <!-- <a href="L5insertform.php" class="btn btn-success">กลับหน้าแรก</a> -->
      </div>        
    <!-- <a href="L5insertform.php">บันทึกข้อมูลพนักงาน</a> -->
     
</body>
</html>

