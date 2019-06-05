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
    <?php if ($_SESSION['user_type'] == 1) { ?>
        <li class="<?php if($action == 'list'){echo "active";}?>">
            <a href="?app=detail&action=list"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลเว็ปไซต์</a>
        </li>
        <li class="<?php if($action == 'products_list' || $action == 'products_add' || $action == 'products_edit'){echo "active";}?>">
            <a href="?app=products&action=products_list"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลสินค้า</a>
        </li>
        <!-- <li class="<?php if($action == 'manage_stock' || $action == 'manage_stock_sale'){echo "active";}?>">
            <a href="?app=stock&action=manage_stock"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลสินค้าในคลัง</a>
        </li> -->
        <li class="<?php if($action == 'list_buy'){echo "active";}?>">
            <a href="?app=orderbuy&action=list_buy"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลรับซื้อสินค้า</a>
        </li>
        <li class="<?php if($action == 'order_list_advance_admin'){echo "active";}?>">
            <a href="?app=order&action=order_list_advance_admin"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลการสั่งซื้อสินค้า</a>
        </li>
        <li class="<?php if($action == 'stock'){echo "active";}?>">
            <a href="?app=datatransfer&action=stock"><i class="fas fa-angle-double-right"></i> ตรวจสอบสินค้าในคลัง</a>
        </li>
        <li class="<?php if($action == 'finance'){echo "active";}?>">
            <a href="?app=datatransfer&action=finance"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการเงิน</a>
        </li>
        <li class="<?php if($action == 'buy'){echo "active";}?>">
            <a href="?app=datatransfer&action=buy"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการสั่งซื้อสินค้า</a>
        </li>
        <li class="<?php if($action == 'sale'){echo "active";}?>">
            <a href="?app=datatransfer&action=sale"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการขายสินค้า</a>
        </li>
        <li class="<?php if($action == 'transfer'){echo "active";}?>">
            <a href="?app=datatransfer&action=transfer"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการส่งสินค้า</a>
        </li>
        <li class="<?php if($action == 'order_list_sale'){echo "active";}?>">
            <a href="?app=order&action=order_list_sale"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการเสนอขาย</a>
        </li>
        <li class="<?php if($action == 'report_list'){echo "active";}?>">
            <a href="?app=reports&action=report_list"><i class="fas fa-angle-double-right"></i> พิมพ์รายงาน</a>
        </li>
        <li class="<?php if($action == 'store_list' || $action == 'store_add' || $action == 'store_edit'){echo "active";}?>">
            <a href="?app=store&action=store_list"><i class="fas fa-angle-double-right"></i> จัดการร้านค้า</a>
        </li>
        <li class="<?php if($action == 'user_list' || $action == 'user_add' || $action == 'user_edit'){echo "active";}?>">
            <a href="?app=user&action=user_list"><i class="fas fa-angle-double-right"></i> จัดการข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="<?php if($action == 'document'){echo "active";}?>">
            <a href="?app=documents&action=document"><i class="fas fa-angle-double-right"></i> เอกสารข้อมูลต่าง ๆ</a>
        </li>
    <?php } elseif($_SESSION['user_type'] == 2) { ?>
        <li class="<?php if($action == 'stock'){echo "active";}?>">
            <a href="?app=datatransfer&action=stock"><i class="fas fa-angle-double-right"></i> ตรวจสอบสินค้าในคลัง</a>
        </li>
        <li class="<?php if($action == 'finance'){echo "active";}?>">
            <a href="?app=datatransfer&action=finance"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการเงิน</a>
        </li>
        <li class="<?php if($action == 'buy'){echo "active";}?>">
            <a href="?app=datatransfer&action=buy"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการสั่งซื้อสินค้า</a>
        </li>
        <li class="<?php if($action == 'sale'){echo "active";}?>">
            <a href="?app=datatransfer&action=sale"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการขายสินค้า</a>
        </li>
        <li class="<?php if($action == 'transfer'){echo "active";}?>">
            <a href="?app=datatransfer&action=transfer"><i class="fas fa-angle-double-right"></i> ตรวจสอบข้อมูลการส่งสินค้า</a>
        </li>
    <?php } elseif($_SESSION['user_type'] == 3) { ?>
        <li class="<?php if($action == 'order_list_advance' || $action == 'order_buy2'){echo "active";}?>">
            <a href="?app=order&action=order_list_advance"><i class="fas fa-angle-double-right"></i> สั่งซื้อสินค้า</a>
        </li>
        <li class="<?php if($action == 'document'){echo "active";}?>">
            <a href="?app=documents&action=document"><i class="fas fa-angle-double-right"></i> เอกสารข้อมูลต่าง ๆ</a>
        </li>
    <?php } elseif($_SESSION['user_type'] == 4) { ?>
        <li class="<?php if($action == 'order_sale'){echo "active";}?>">
            <a href="?app=order&action=order_sale2"><i class="fas fa-angle-double-right"></i> ขายสินค้า</a>
        </li>
        <li class="<?php if($action == 'document'){echo "active";}?>">
            <a href="?app=documents&action=document"><i class="fas fa-angle-double-right"></i> เอกสารข้อมูลต่าง ๆ</a>
        </li>
    <?php } ?>
    </ul>
</div>