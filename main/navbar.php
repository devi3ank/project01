<nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="dashboard.html">หจก. สืบ เกษตรไท</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['user_fullname']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?app=logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar">
    <ul class="sidebar-list">
        <li>
            <a href="?app=user_list">จัดการข้อมูลผู้ใช้งาน</a>
        </li>
        <li>
            จัดการข้อมูลเว็ปไซต์
        </li>
        <li>
            <a href="?app=products_list">จัดการข้อมูลสินค้า</a>
        </li>
        <li>
            จัดการข้อมูลสินค้าในคลัง
        </li>
        <li>
            ตรวจสอบสินค้าในคลัง
        </li>
        <li>
            จัดการข้อมูลการเงิน
        </li>
        <li>
            ตรวจสอบข้อมูลการเงิน
        </li>
        <li>
            ตรวจสอบข้อมูลการสั่งซื้อสินค้า
        </li>
        <li>
            ตรวจสอบข้อมูลการขายสินค้า
        </li>
        <li>
            ตรวจสอบข้อมูลการส่งสินค้า
        </li>
        <li>
            พิมพ์รายงาน
        </li>
    </ul>
</div>