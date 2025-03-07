<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOENIVERSE - Product Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffffff;
            color: #333;
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
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .product-details {
            background-color: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: 700;
            color: #000;
        }

        .price {
            font-size: 1.8rem;
            font-weight: 600;
            color: #000;
        }

        .btn-outline-dark {
            font-size: 1.2rem;
            padding: 12px;
            border-radius: 30px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-outline-dark:hover {
            background-color: #000;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        .detail-info p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        .icon {
            color: #000;
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .product-image {
                height: auto;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                    <h2><i class="fa-solid fa-tag icon"></i><?=$row['pro_name']?></h2>
                    <p><strong><i class="fa-solid fa-barcode icon"></i>Product ID:</strong> <?=$row['pro_id']?></p>
                    <p><strong><i class="fa-solid fa-list icon"></i>Category:</strong> <?=$row['type_name']?></p>
                    <div class="detail-info">
                        <p><strong><i class="fa-solid fa-circle-info icon"></i>Description:</strong> <?=$row['detail']?></p>
                    </div>
                    <p class="price"><i class="fa-solid fa-coins icon"></i>฿<?=number_format($row['price'], 2)?></p>
                    <a class="btn btn-outline-dark mt-4 w-100" href="order.php?id=<?=$row['pro_id']?>"><i class="fa-solid fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </div>

    <?php mysqli_close($conn); ?>
</body>

</html>
