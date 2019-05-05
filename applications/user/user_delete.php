<?php
    $id = $_GET['id'];
    update_db("user_tb", array('user_status'=>3), "user_id=$id");
    echo "
        <script>
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=user&action=user_list';
        </script>
    ";
?>