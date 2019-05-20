<?php
    check_user($_SESSION['user_type'], array(3));
    $id = $_GET['id']; // products_id
    $data['lot_status'] = 4;
    $data['store_order'] = $_SESSION['store_id'];
    $data['lot_order_date'] = date('Y-m-d H:i:s');

    update_db("lot_tb", $data, "lot_id = '$id'");
    echo "
      <script>
      alert('สั่งซื้อสินค้าเรียบร้อยแล้ว');
      window.location.href='$domain?app=order&action=order_list';
      </script>
    ";
?>