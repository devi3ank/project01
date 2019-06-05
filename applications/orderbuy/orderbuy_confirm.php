<?php
  check_user($_SESSION['user_type'], array(4));
  update_db('order_buy_tb', array('ob_status'=>2), "ob_id = '".$_GET['id']."'");

  $resultProduct = select_db("
    SELECT
      *
    FROM
      order_buy_tb
    INNER JOIN products_tb ON order_buy_tb.products_id = products_tb.products_id
    WHERE
      order_buy_tb.ob_id = '".$_GET['id']."'
  ");
  $product = $resultProduct->fetch_assoc();
  $products_stock =  $product['products_stock'] + $product['ob_weight'];

  update_db('products_tb', array('products_stock'=>$products_stock), "products_id = '".$product['products_id']."'");

  echo "<script>window.location.href='$domain?app=order&action=order_sale2';</script>";
?>