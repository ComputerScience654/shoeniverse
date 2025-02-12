<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOENIVERSE</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffffff;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-brand {
            margin: 5px;
        }
        .card-img-top {
            height: 200px;
            width: 100%;
            object-fit: contain;
            padding: 10px;
        }
        .container {
            margin-top: 20px;
        }
        .logo {
            height: 100px; /* Adjust logo height */
            margin-right: 5px; /* Space between logo and text */
            vertical-align: middle; /* Align logo vertically with text */
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Filtering -->
    <script>
        function filterBrand(brand) {
            const cards = document.querySelectorAll('.product-card');
            cards.forEach(card => {
                if (brand === 'all' || card.dataset.brand === brand) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</head>
<body>

    <?php include 'menu.php'; ?>

    <!-- Header Section -->
    <div class="container text-center mt-5">
        <h1>
            <!--<img src="img/logo.png" alt="Logo" class="logo">  Add your logo here -->
            SHOENIVERSE
        </h1>
    </div>

    <!-- Brand Buttons -->
     
    <div class="container text-center mt-3">
    <button class="btn btn-outline-dark btn-brand" onclick="filterBrand('all')">All</button>
    <button class="btn btn-outline-dark btn-brand" onclick="filterBrand('nike')">NIKE</button>
    <button class="btn btn-outline-dark btn-brand" onclick="filterBrand('adidas')">ADIDAS</button>
    <button class="btn btn-outline-dark btn-brand" onclick="filterBrand('puma')">PUMA</button>
    <button class="btn btn-outline-dark btn-brand" onclick="filterBrand('new balance')">NEW BALANCE</button>
</div>

    <!-- Product Section -->
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <?php
            $sql = "SELECT * FROM product ORDER BY pro_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $brand = strtolower($row['brand']);
            ?>

            <div class="col product-card" data-brand="<?= $brand ?>">
                <div class="card h-100 text-center">
                    <img src="img/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['pro_name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title text-dark"><?= $row['pro_name'] ?></h5>
                        <p class="card-text price text-dark">฿<?= number_format($row['price'], 2) ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="sh_product_detail.php?id=<?= $row['pro_id'] ?>" class="btn btn-outline-dark w-100">รายละเอียด</a>
                    </div>
                </div>
            </div>

            <?php
            }
            mysqli_close($conn);
            ?>

        </div>
    </div>

</body>
</html>
