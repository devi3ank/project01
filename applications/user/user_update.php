<?php
    $id = $_GET['id'];
    update_db("user_tb", $_POST, "user_id = '$id'");
    echo "
        <script>
            alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=user&action=user_edit&id=$id';
        </script>
    ";
?>