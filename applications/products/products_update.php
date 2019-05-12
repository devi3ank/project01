<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id'];
    update_db("products_tb", $_POST, "products_id = '$id'");
    echo "
        <script>
            alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=products&action=products_edit&id=$id';
        </script>
    ";
?>