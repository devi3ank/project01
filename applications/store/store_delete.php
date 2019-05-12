<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id'];
    update_db("store_tb", array('store_status'=>3), "store_id = '$id'");
    echo "
        <script>
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=store&action=store_list';
        </script>
    ";
?>