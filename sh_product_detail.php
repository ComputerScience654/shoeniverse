<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOENIVERSE - Product Details</title>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        background-color: #ffffff; /* พื้นหลังสีขาว */
        color: #000000; /* ตัวหนังสือสีดำ */
        font-family: 'Poppins', sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .product-image {
        width: 100%; 
        height: 600px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .product-details {
        background-color: #ffffff; /* พื้นหลังกล่องเป็นสีขาว */
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: 700;
        color: #000000; /* ตัวหนังสือสีดำ */
    }

    .price {
        font-size: 1.8rem;
        font-weight: 600;
        color: #dc3545; /* ราคาสีแดง */
    }

    .btn-outline-success {
        font-size: 1.2rem;
        padding: 12px;
        border-radius: 30px;
        color: #000000; /* ปุ่มตัวหนังสือสีดำ */
        border-color: #000000; /* ขอบปุ่มสีดำ */
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: #000000; /* เมื่อ hover พื้นหลังเป็นดำ */
        color: #ffffff; /* ข้อความเป็นขาว */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    }

    .detail-info p {
        font-size: 1rem;
        line-height: 1.6;
        color: #000000; /* ตัวหนังสือคำอธิบายสีดำ */
    }
</style>


    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row align-items-center">
            <?php
            $ids = $_GET['id'];
            $sql = "SELECT * FROM product, type WHERE product.type_id = type.type_id AND product.pro_id = '$ids'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <div class="col-md-6">
                <img src="img/<?=$row['image']?>" class="product-image" alt="<?=$row['pro_name']?>" />
            </div>

            <div class="col-md-6">
                <div class="product-details">
                    <h2 class="text-success"><?=$row['pro_name']?></h2>
                    <p><strong>Product ID:</strong> <?=$row['pro_id']?></p>
                    <p><strong>Category:</strong> <?=$row['type_name']?></p>
                    <div class="detail-info">
                        <p><strong>Description:</strong> <?=$row['detail']?></p>
                    </div>
                    <p class="price text-danger">฿<?=number_format($row['price'], 2)?></p>
                    <a class="btn btn-outline-success mt-4 w-100" href="order.php?id=<?=$row['pro_id']?>">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>

    <?php mysqli_close($conn); ?>
</body>

</html>
