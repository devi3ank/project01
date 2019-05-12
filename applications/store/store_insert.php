<?php
    check_user($_SESSION['user_type'], array(1));
    $data = $_POST;
    $data['store_status'] = 1;
    insert_db("store_tb", $data);
    echo "<script>window.location.href='$domain?app=store&action=store_list';</script>";
?>