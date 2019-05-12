<?php
    check_user($_SESSION['user_type'], array(1));

    $id = $_GET['id'];

    $data = $_POST;

    if ($_SESSION['user_type'] == 1) {
        $data['user_type'] = 1;
    }

    update_db("user_tb", $data, "user_id = '$id'");
    echo "
        <script>
            alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=user&action=user_edit&id=$id';
        </script>
    ";
?>