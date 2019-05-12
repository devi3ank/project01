<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id'];
    update_db("store_tb", $_POST, "store_id = '$id'");
    echo "
        <script>
            alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=store&action=store_edit&id=$id';
        </script>
    ";
?>