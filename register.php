<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .register-container {
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
    <div class="register-container">
        <h2 class="mb-4"><i class="fa-solid fa-user-plus"></i> สมัครสมาชิก</h2>
        <form method="POST" action="insert_register.php">
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="firstname" class="form-control" required placeholder="ชื่อ">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="lastname" class="form-control" required placeholder="นามสกุล">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                <input type="number" name="phone" class="form-control" required placeholder="เบอร์โทรศัพท์">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="username" maxlength="10" class="form-control" required placeholder="Username">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" maxlength="10" class="form-control" required placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-dark"><i class="fa-solid fa-save"></i> บันทึก</button> 
            <br> 
            <!-- <button type="reset" name="cancel" class="btn btn-secondary"><i class="fa-solid fa-times"></i> ยกเลิก</button>-->
        </form>
        <br>
        <a href="login.php" class="btn btn-link"><i class="fa-solid fa-sign-in-alt"></i> มีบัญชีแล้ว? Login</a>
    </div>
</body>
</html>
