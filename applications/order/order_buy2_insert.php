<?php
    check_user($_SESSION['user_type'], array(3));
    
    $data['products_id']    = $_POST['products_id'];
    $data['store_id']       = $_SESSION['store_id'];
    $data['order_weight']   = $_POST['order_weight'];
    $data['order_status']   = 1;
    $data['order_fitdate']  = date('Y-m-d H:i:s');
    $data['order_fitby']    = $_SESSION['user_id'];

    insert_db("order_tb", $data);
    echo "
      <script>
      alert('สั่งซื้อสินค้าเรียบร้อยแล้ว');
      window.location.href='$domain?app=order&action=order_list_advance';
      </script>
    ";
?>