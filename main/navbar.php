<nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="<?=$domain?>">หจก. สืบ เกษตรไท</a>
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
                <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar">
    <ul class="sidebar-list">
        <li class="<?php if($action == 'user_list' || $action == 'user_add' || $action == 'user_edit'){echo "active";}?>">
            
            <a href="?app=user&action=user_list"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลผู้ใช้งาน</a>
        </li>
        <li>
            <a href="#" class="text-danger"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลเว็ปไซต์</a>
        </li>
        <li class="<?php if($action == 'products_list' || $action == 'products_add' || $action == 'products_edit'){echo "active";}?>">
            <a href="?app=products&action=products_list"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลสินค้า</a>
        </li>
        <li class="<?php if($action == 'manage_stock' || $action == 'manage_stock_sale'){echo "active";}?>">
            <a href="?app=stock&action=manage_stock"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลสินค้าในคลัง</a>
        </li>
        <li>
            <a href="#" class="text-danger"><i class="fas fa-angle-double-right"></i> ตรวจสอบสินค้าในคลัง</a>
        </li>
        <li>
            <a href="#" class="text-danger"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลการเงิน</a>
        </li>
        <li>
            <a href="#" class="text-danger"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการเงิน</a>
        </li>
        <li>
            <a href="?app=datatransfer&action=buy"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการสั่งซื้อสินค้า</a>
        </li>
        <li>
            <a href="?app=datatransfer&action=sale"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการขายสินค้า</a>
        </li>
        <li>
            <a href="#" class="text-danger"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการส่งสินค้า</a>
        </li>
        <li>
            <a href="#" class="text-danger"><i class="fas fa-angle-double-right"></i> พิมพ์รายงาน</a>
        </li>
    </ul>
</div>