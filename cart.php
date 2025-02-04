<?php
session_start();
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            background-color: #f4f7fa; /* Soft background color */
            font-family: 'Poppins', sans-serif; /* Modern font for a clean look */
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff; /* White background for the container */
            padding: 30px;
            border-radius: 15px; /* More rounded corners for a softer look */
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        .table th, .table td {
            vertical-align: middle; /* Center align the table content */
        }
        .alert {
            margin-bottom: 30px; /* Space below alerts */
            border-radius: 10px; /* Rounded corners for alerts */
        }
        .btn {
            transition: background-color 0.3s, color 0.3s; /* Smooth button transition */
            border-radius: 30px; /* Rounded button */
        }
        .btn:hover {
            background-color: #007bff; /* Button hover color */
            color: white; /* Text color on hover */
        }
        .product-image {
            max-width: 80px; /* Fixed width for images */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Rounded corners for product images */
        }
        .subtotal {
            font-size: 1.5rem; /* Increase font size for subtotal */
            font-weight: bold; /* Make subtotal bold */
        }
        .form-control {
            border-radius: 30px; /* Rounded input fields */
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, .5); /* Focus effect */
            border-color: #007bff; /* Border color on focus */
        }
    </style>
    <!-- Bootstrap JS Bundle -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
            <div class="alert alert-success h4 text-center" role="alert">
                การสั่งซื้อสินค้า
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th>เพิ่ม - ลด</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Total = 0;
                    $sumPrice = 0;
                    $m = 1;
                    for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                        if ($_SESSION["strProductID"][$i] != "") {
                            $sql1 = "SELECT * FROM product WHERE pro_id = '" . $_SESSION["strProductID"][$i] . "'";
                            $result1 = mysqli_query($conn, $sql1);
                            $row_pro = mysqli_fetch_array($result1);
                            
                            $_SESSION["price"] = $row_pro['price'];
                            $Total = $_SESSION["strQty"][$i];
                            $sum = $Total * $row_pro['price'];
                            $sumPrice += $sum;
                            $_SESSION["sum_price"] = $sumPrice;
                    ?>
                    <tr>
                        <td><?=$m?></td>
                        <td>
                            <img src="img/<?=$row_pro['image']?>" class="product-image border" alt="<?=$row_pro['pro_name']?>">
                            <?=$row_pro['pro_name']?>
                        </td>
                        <td><?=number_format($row_pro['price'], 2)?></td>
                        <td><?=$_SESSION["strQty"][$i]?></td>
                        <td><?=number_format($sum, 2)?></td>
                        <td>
                            <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">+</a>
                            <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                            <a href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">-</a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="pro_delete.php?Line=<?=$i?>" class="text-danger" title="Remove">
                                <img src="img/cross.png" width="30" alt="Delete">
                            </a>
                        </td>
                    </tr>
                    <?php
                        $m++;
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="4" class="text-end">รวมเป็นเงิน</td>
                        <td class="text-center subtotal"><?=number_format($sumPrice, 2)?></td>
                        <td>บาท</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end">
                <a href="show_product.php" class="btn btn-outline-secondary">เลือกสินค้า</a>
                <button type="submit" class="btn btn-outline-primary">ยืนยันการสั่งซื้อ</button>
            </div>

            <div class="alert alert-success mt-4" role="alert">
                ข้อมูลสำหรับจัดส่งสินค้า
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="cus_name" class="form-control mb-3" required placeholder="ชื่อ-นามสกุล...">
                    <textarea class="form-control mb-3" required placeholder="ที่อยู่..." name="cus_add" rows="3"></textarea>
                    <input type="number" name="cus_tel" class="form-control mb-3" required placeholder="เบอร์โทรศัพท์...">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
