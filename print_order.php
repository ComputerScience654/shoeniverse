<?php 
session_start();
include 'condb.php';
$sql = "SELECT * FROM tb_order WHERE orderID = '" . $_SESSION["order_id"] . "'";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e9ecef; /* Light background for the body */
            font-family: 'Poppins', sans-serif; /* Modern font */
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff; /* White background for the main content */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); /* Softer shadow for depth */
        }
        .alert {
            margin-bottom: 30px; /* Space below alerts */
            border-radius: 10px; /* Rounded corners for alerts */
        }
        .table th, .table td {
            vertical-align: middle; /* Center align the table content */
            text-align: center; /* Center align table content */
        }
        .table thead th {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
        }
        .btn {
            transition: background-color 0.3s, color 0.3s; /* Smooth button transition */
            border-radius: 30px; /* Rounded button */
        }
        .btn:hover {
            background-color: #0056b3; /* Darker hover color */
            color: white; /* Text color on hover */
        }
        .footer-note {
            font-size: 0.9rem; /* Smaller font for footer note */
            color: #555; /* Gray color for footer note */
            margin-top: 30px; /* Margin above the footer note */
            border-top: 1px solid #ddd; /* Top border for separation */
            padding-top: 20px; /* Padding for footer note */
        }
        .no-print {
            margin-top: 20px; /* Margin above buttons */
        }
        @media print {
            .no-print {
                display: none; /* Hide elements that shouldn't print */
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="alert alert-success h4 text-center mt-4" role="alert">
                การสั่งซื้อเสร็จสมบูรณ์
            </div>
            <div class="mb-4">
                <p>เลขที่การสั่งซื้อ: <strong><?=$rs['orderID']?></strong></p>
                <p>ชื่อ-นามสกุล (ลูกค้า): <strong><?=$rs['cus_name']?></strong></p>
                <p>ที่อยู่จัดส่ง: <strong><?=$rs['address']?></strong></p>
                <p>เบอร์โทรศัพท์: <strong><?=$rs['telephone']?></strong></p>
            </div>
            
            <div class="card mb-4"> 
                <div class="card-body">
                    <h5 class="text-center">รายละเอียดสินค้า</h5>
                    <table class="table table-hover"> 
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql1 = "SELECT * FROM order_detail d, product p WHERE d.pro_id = p.pro_id AND d.orderID = '" . $_SESSION["order_id"] . "'";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($result1)) {
                        ?>
                            <tr>
                                <td><?=$row['pro_id']?></td>
                                <td><?=$row['pro_name']?></td>
                                <td><?=number_format($row['orderPrice'], 2)?></td>
                                <td><?=$row['orderQty']?></td>
                                <td><?=number_format($row['Total'], 2)?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <h6 class="text-end">รวมเป็นเงิน <strong><?=number_format($total_price, 2)?></strong> บาท</h6>
                </div>
            </div>
            <div class="footer-note">
                ***กรุณาโอนเงินภายใน 7 วัน หลังจากทำการสั่งซื้อ โอนเงินผ่านธนาคาร กรุงไทย ชื่อบัญชี นายศักดิพันธ์ ชอบนอนหงาย
                ประเภทบัญชีออมทรัพย์ เลขที่บัญชี 99999999999***
            </div>  
            <div class="text-center no-print">
                <a href="show_product.php" class="btn btn-success">กลับไปที่สินค้า</a>
                <button onclick="window.print()" class="btn btn-success">พิมพ์</button>
            </div>
        </div>
    </div>
</div> 
</body>
</html>
