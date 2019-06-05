<?php
  check_user($_SESSION['user_type'], array(4));
  $store = $_SESSION['store_id'];
  $result = select_db("
    SELECT
      *
    FROM
      order_buy_tb
    INNER JOIN products_tb ON order_buy_tb.products_id = products_tb.products_id
    WHERE
      order_buy_tb.store_id = '$store' AND
      order_buy_tb.ob_status > '0'
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
            <td class="text-right"><?=number_format($row['ob_weight'],2)?></td>
            <td class="text-right"><?=number_format($row['ob_price'],2)?></td>
            <td class="text-right"><?=number_format($row['ob_weight']*$row['ob_price'],2)?></td>
            <td class="text-center"><?=($row['ob_status']==1)?'ยังไม่ได้ยืนยันการขาย':'<span class="text-success">ยืนยันการขายแล้ว</span>'?></td>
            <td class="text-center">
              <?php if ($row['ob_status']==1) { ?>
              <a href="?app=orderbuy&action=orderbuy_confirm&id=<?=$row['ob_id']?>" class="btn btn-success btn-sm" onclick="return confirm('ยืนยันขายสินค้า');"><i class="fas fa-calendar-check"></i></a>
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