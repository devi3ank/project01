<?php
    check_user($_SESSION['user_type'], array(1,2));
    $id = $_GET['id']; // products_id
    $lot_id = $_GET['lot_id']; // lot_id
    $data['lot_status'] = 5;
    $data['lot_payment'] = date("Y-m-d");

    update_db("lot_tb", $data, "lot_id = '$lot_id'");
    echo "<script>window.location.href='$domain?app=stock&action=manage_stock_list&id=$id';</script>";
?>