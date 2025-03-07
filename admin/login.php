<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
            width: 500px;
        }
        .btn-dark {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            margin-top: 10px;
        }
        .form-control {
            font-size: 18px;
            padding: 10px;
        }
        .input-group-text {
            background: none;
            border: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="mb-4"><i class="fa-solid fa-user-lock"></i> Login</h2>
        <form method="POST" action="login_check.php">
            <div class="mb-4 input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="username" class="form-control" required placeholder="Username">
            </div>
            <div class="mb-4 input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" class="form-control" required placeholder="Password">
            </div>
            <?php if(isset($_SESSION["Error"]) && $_SESSION["Error"] != ""): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION["Error"]; ?>
                </div>
                <?php $_SESSION["Error"] = ""; ?>
            <?php endif; ?>
            <button type="submit" class="btn btn-dark" name="submit"><i class="fa-solid fa-sign-in-alt"></i> Login</button>
        </form>
        <br>
        
    </div>
</body>
</html>
