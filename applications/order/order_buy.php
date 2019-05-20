<?php
check_user($_SESSION['user_type'], array(3));
  $result = select_db("
    SELECT
      *
    FROM
      lot_tb
    INNER JOIN products_tb ON lot_tb.products_id = products_tb.products_id
    WHERE
      lot_tb.lot_status = '1'
  ");
?>

<div class="detail">
  <p class="title">รายการสินค้า</p>
  <table class="table table-bordered table-hover table-sm">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" style="width:80px;">#</th>
        <th class="text-center">ชื่อสินค้า</th>
        <th class="text-center" style="width:120px;">น้ำหนัก(กก.)</th>
        <th class="text-center" style="width:120px;">ราคาขาย(บาท)</th>
        <th class="text-center" style="width:120px;">ยอดจริง(บาท)</th>
        <th style="width:80px;"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        $i = 1;
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td class="text-center"><?=$i?></td>
        <td><?=$row['products_name']?></td>
        <td class="text-right"><?=number_format($row['lot_weight'], 2)?></td>
        <td class="text-right"><?=number_format($row['lot_price_sale'], 2)?></td>
        <td class="text-right"><?=number_format($row['lot_weight']*$row['lot_price_sale'], 2)?></td>
        <td class="text-center">
          <a href="?app=order&action=order_buy_confirm&id=<?=$row['lot_id']?>" class="btn btn-info btn-sm" title="สั่งซื้อสินค้า" onclick="return confirm('ยืนยันการสั่งสินค้า')"><i class="fas fa-shopping-cart"></i></a>
        </td>
      </tr>
      <?php $i++;}} else { ?>
      <tr>
        <td class="text-center" colspan="6">ไม่มีสินค้าให้สั่งซื้อ</td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>