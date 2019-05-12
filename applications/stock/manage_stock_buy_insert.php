<?php
    check_user($_SESSION['user_type'], array(1,2));
    $id = $_GET['id'];

    $data = $_POST;
    $data['products_id'] = $id;
    $data['lot_fitby'] = $_SESSION['user_id'];
    $data['lot_fitdate'] = date("Y-m-d H:i:s");

    
    insert_db("lot_tb", $data);
    echo "<script>window.location.href='$domain?app=stock&action=manage_stock_list&id=$id';</script>";
?>