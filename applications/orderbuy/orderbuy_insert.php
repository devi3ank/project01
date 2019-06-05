<?php
  check_user($_SESSION['user_type'], array(1));

  $data['store_id']     = $_POST['store_id'];
  $data['products_id']  = $_POST['products_id'];
  $data['ob_weight']    = $_POST['ob_weight'];
  $data['ob_price']     = $_POST['ob_price'];
  $data['ob_status']    = 1;
  $data['ob_fitdate']   = date("Y-m-d H:i:s");
  $data['ob_fitby']     = $_SESSION['user_id'];

  insert_db('order_buy_tb', $data);
  echo "<script>window.location.href='$domain?app=orderbuy&action=list_buy';</script>";
?>