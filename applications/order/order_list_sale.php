<?php
  check_user($_SESSION['user_type'], array(1));
  $result = select_db("
    SELECT
      *
    FROM
      quotation_tb
    INNER JOIN products_tb ON quotation_tb.products_id = products_tb.products_id
    INNER JOIN store_tb ON quotation_tb.quotation_store = store_tb.store_id
    WHERE
      quotation_tb.quotation_status != '3'
  ");
?>

<div class="detail">
  <p class="title">รายการเสนอขาย</p>
  <table class="table table-bordered table-sm table-hover">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" style="width: 80px">#</th>
        <th class="text-center">ชื่อร้านที่เสนอขาย</th>
        <th class="text-center">ชื่อสินค้า</th>
        <th class="text-center" style="width: 100px">น้ำหนัก</th>
        <th class="text-center" style="width: 120px">ราคา</th>
        <th class="text-center" style="width: 120px">ยอดจริง</th>
        <th class="text-center" style="width: 100px">สถานะ</th>
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
            <td><?=$row['store_name']?></td>
            <td><?=$row['products_name']?></td>
            <td class="text-right"><?=number_format($row['quotation_weight'],2)?></td>
            <td class="text-right"><?=number_format($row['quotation_price'],2)?></td>
            <td class="text-right"><?=number_format($row['quotation_weight']*$row['quotation_price'],2)?></td>
            <td class="text-center"><?=$statusQuotation[$row['quotation_status']]?></td>
            <td class="text-center">
              <?php if ($row['quotation_status'] == 1) { ?>
              <a href="?app=order&action=order_confirm_sale&id=<?=$row['quotation_id']?>" class="btn btn-info btn-sm" onclick="return confirm('ยืนยันการรับซื้อสินค้า');" title="รับซื้อสินค้า"><i class="fas fa-check-square"></i></a>
              <?php } ?>
            </td>
        </tr>
      <?php $i++;}} else { ?>
        <tr>
            <td class="text-center" colspan="8">ไม่มีรายการเสนอขาย</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>