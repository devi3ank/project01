<?php
    check_user($_SESSION['user_type'], array(1));
    
    $id = $_GET['id'];
    update_db("detail_tb", array('detail_status'=>3), "detail_id = '$id'");
    echo "
        <script>
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=detail&action=list';
        </script>
    ";
?>