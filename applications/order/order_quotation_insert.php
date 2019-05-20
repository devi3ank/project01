<?php
    check_user($_SESSION['user_type'], array(4));
    $data                       = $_POST;
    $data['quotation_status']   = 1;
    $data['quotation_store']    = $_SESSION['store_id'];
    $data['quotation_fitby']    = $_SESSION['user_id'];
    $data['quotation_fitdate']  = date("Y-m-d H:i:s");

    
    insert_db("quotation_tb", $data);
    echo "<script>window.location.href='$domain?app=order&action=order_sale';</script>";
?>