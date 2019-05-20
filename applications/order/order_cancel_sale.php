<?php
    check_user($_SESSION['user_type'], array(4));
    $id = $_GET['id']; // products_id
    $data['quotation_status'] = 3;

    update_db("quotation_tb", $data, "quotation_id = '$id'");
    echo "
      <script>
      alert('ลบข้อมูลเสนอขายเรียบร้อยแล้ว');
      window.location.href='$domain?app=order&action=order_sale';
      </script>
    ";
?>