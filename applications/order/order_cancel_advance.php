<?php
    check_user($_SESSION['user_type'], array(3));
    $id = $_GET['id'];

    $result = select_db("
      SELECT
        *
      FROM
        order_tb
      WHERE 
        order_id = '$id' AND
        order_status = '1'
    ");
    
    if ($result->num_rows == 1) {
      $data['order_status']         = 0;
      $data['order_fitdate_cancel'] = date("Y-m-d H:i:s");

      update_db("order_tb", $data, "order_id = '$id'");
      echo "
        <script>
        alert('ยกเลิกการสั่งซื้อเรียบร้อยแล้ว');
        window.location.href='$domain?app=order&action=order_list_advance';
        </script>
      ";
    } else {
      echo "
        <script>
        alert('สินค้าไม่ได้อยู่ในสถานะการยกเลิกได้ กรุณาติดต่อผู้ขายสินค้า');
        window.location.href='$domain?app=order&action=order_list_advance';
        </script>
      ";
    }
    
?>