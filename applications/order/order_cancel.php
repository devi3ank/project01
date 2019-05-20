<?php
    check_user($_SESSION['user_type'], array(3));
    $id = $_GET['id'];

    $result = select_db("
      SELECT
        *
      FROM
        lot_tb
      WHERE 
        lot_id = '$id' AND
        lot_status = '4'
    ");
    
    $data['lot_status'] = 1;
    $data['store_order'] = 0;
    $data['lot_order_date'] = '0000-00-00 00:00:00';

    update_db("lot_tb", $data, "lot_id = '$id'");
    echo "
      <script>
      alert('ยกเลิกการสั่งซื้อเรียบร้อยแล้ว');
      window.location.href='$domain?app=order&action=order_list';
      </script>
    ";
?>