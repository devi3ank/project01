<?php
    check_user($_SESSION['user_type'], array(1,2));
    $id = $_GET['id']; // products_id
    $lot_id = $_POST['lot_id']; // lot_id
    $data['lot_transfer_date'] = $_POST['lot_transfer_date'];
    $data['lot_other'] = $_POST['lot_other'];
    $data['lot_transfer'] = 2;
    $data['lot_note_transfer'] = $_POST['lot_note_transfer'];
    
    update_db("lot_tb", $data, "lot_id = '$lot_id'");
    //dieArray($data);
    echo "<script>window.location.href='$domain?app=stock&action=manage_stock_list&id=$id';</script>";
?>