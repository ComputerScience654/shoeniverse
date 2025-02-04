<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- เพิ่มโลโก้ -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="img/logo.png" alt="Logo" class="logo me-2">
      SHOENIVERSE
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="show_product.php">หน้าหลัก</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ตะกร้าสินค้า
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cart.php">ไปที่ตะกร้าสินค้า</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">0809902729</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">สมัครสมาชิก/เข้าสู่ระบบ</a>
        </li>
      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Custom CSS -->
<style>
  .logo {
    width: 55px; /* ปรับขนาดความกว้างของโลโก้ */
    height: auto; /* รักษาอัตราส่วนของภาพ */
  }
</style>
