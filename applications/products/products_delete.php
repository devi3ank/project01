<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id'];
    update_db("products_tb", array('products_status'=>3), "products_id = '$id'");
    echo "
        <script>
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=products&action=products_list';
        </script>
    ";
?>