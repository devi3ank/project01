<?php
    check_user($_SESSION['user_type'], array(1,4));
    $id                   = $_GET['id'];
    $status_buy           = $_GET['status'];
    $data['order_status'] = $status_buy;

    if ($status_buy == 3) {
      $data['order_price_buy'] = $_POST['order_price_buy'];
      $data['order_price_sale'] = $_POST['order_price_sale'];
      $resultOrder = select_db("
        SELECT
          *
        FROM
          order_tb
        INNER JOIN products_tb ON order_tb.products_id = products_tb.products_id
        WHERE
          order_tb.order_id = '$id'
      ");
      $order = $resultOrder->fetch_assoc();
      $products_stock = $order['products_stock'] - $order['order_weight'];
      //dieArray($products_stock);
      update_db("products_tb", array('products_stock'=> $products_stock), "products_id = '".$order['products_id']."'");
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