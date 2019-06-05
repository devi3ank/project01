<?php
  check_user($_SESSION['user_type'], array(1));
  update_db('order_buy_tb', array('ob_status'=>0), "ob_id = '".$_GET['id']."'");
  echo "<script>window.location.href='$domain?app=orderbuy&action=list_buy';</script>";
?>