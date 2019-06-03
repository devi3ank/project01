<?php
    check_user($_SESSION['user_type'], array(1,4));
    $id                   = $_GET['id']; // products_id
    $status_buy           = $_GET['status'];
    $data['order_status'] = $status_buy;

    if ($status_buy == 3) {
      $data['store_buy_id']     = $_POST['store_id'];
      $data['order_price_buy']  = $_POST['order_price_buy'];
      $data['order_date_buy']   = date("Y-m-d H:i:s");
      $data['order_price_sale'] = $_POST['order_price_sale'];
    } elseif ($status_buy == 4) {
      $data['order_price_transfer'] = $_POST['order_price_transfer'];
      $data['order_date_transfer']  = $_POST['order_date_transfer'];
    }

    update_db("order_tb", $data, "order_id = '$id'");

    if ($_SESSION['user_type'] == 1) {
      echo "
        <script>
        window.location.href='$domain?app=order&action=order_list_advance_admin';
        </script>
      ";
    } else {
      echo "
        <script>
        window.location.href='$domain?app=order&action=order_sale2';
        </script>
      ";
    }
    
?>