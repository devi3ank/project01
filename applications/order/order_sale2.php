<?php
  check_user($_SESSION['user_type'], array(4));
  $store = $_SESSION['store_id'];
  $result = select_db("
    SELECT
      *
    FROM
      order_tb
    INNER JOIN products_tb ON order_tb.products_id = products_tb.products_id
    WHERE
      order_tb.store_buy_id = '$store' AND
      order_tb.order_status >= '3'
  ");
?>

<div class="detail">
  <p class="title">รายการสั่งซื้อ</p>
  <table class="table table-bordered table-sm table-hover">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" style="width: 80px">#</th>
        <th class="text-center">ชื่อสินค้า</th>
        <th class="text-center" style="width: 100px">น้ำหนัก</th>
        <th class="text-center" style="width: 120px">ราคา</th>
        <th class="text-center" style="width: 120px">ยอดจริง</th>
        <th class="text-center" style="width: 180px">สถานะ</th>
        <th style="width: 80px"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        if ($result->num_rows > 0) {
            $i = 1; 
        while ($row = $result->fetch_assoc()) {    
        ?>
        <tr>
            <td class="text-center"><?=$i?></td>
            <td><?=$row['products_name']?></td>
            <td class="text-right"><?=number_format($row['order_weight'],2)?></td>
            <td class="text-right"><?=number_format($row['order_price_buy'],2)?></td>
            <td class="text-right"><?=number_format($row['order_weight']*$row['order_price_buy'],2)?></td>
            <td class="text-center"><?=($row['order_status']==3)?'ยังไม่ได้ยืนยันการขาย':'ยืนยันการขายแล้ว'?></td>
            <td class="text-center">
              <?php if ($row['order_status']==3) { ?>
              <a href="?app=order&action=order_confirm_buy&id=<?=$row['order_id']?>&status=4" class="btn btn-success btn-sm" onclick="return confirm('ยืนยันขายสินค้า');"><i class="fas fa-calendar-check"></i></a>
              <?php } ?>
            </td>
        </tr>
      <?php $i++;}} else { ?>
        <tr>
            <td class="text-center" colspan="7">ไม่มีรายการสั่งซื้อ</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>