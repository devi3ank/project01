<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id']; // products_id
    $data['quotation_status'] = 2;

    update_db("quotation_tb", $data, "quotation_id = '$id'");
    echo "
      <script>
      window.location.href='$domain?app=order&action=order_list_sale';
      </script>
    ";
?>