<?php
    check_user($_SESSION['user_type'], array(1,3,4));
    $id = $_GET['id'];
    update_db("document_tb", array('doc_status'=>3), "doc_id = '$id'");
    echo "
        <script>
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=documents&action=document';
        </script>
    ";
?>