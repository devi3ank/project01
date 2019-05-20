<?php
  check_user($_SESSION['user_type'], array(4));
  $store = $_SESSION['store_id'];
  $result = select_db("
    SELECT
      *
    FROM
      quotation_tb
    INNER JOIN products_tb ON quotation_tb.products_id = products_tb.products_id
    WHERE
      quotation_tb.quotation_store = '$store' AND
      quotation_tb.quotation_status != '3'
  ");
?>

<div class="detail">
  <p class="title">รายการเสนอขาย</p>
  <a href="?app=order&action=order_quotation" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-user-plus"></i> เสนอขายสินค้า</a>
  <table class="table table-bordered table-sm table-hover">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" style="width: 80px">#</th>
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
            <td><?=$row['products_name']?></td>
            <td class="text-right"><?=number_format($row['quotation_weight'],2)?></td>
            <td class="text-right"><?=number_format($row['quotation_price'],2)?></td>
            <td class="text-right"><?=number_format($row['quotation_weight']*$row['quotation_price'],2)?></td>
            <td class="text-center"><?=$statusQuotation[$row['quotation_status']]?></td>
            <td class="text-center">
              <?php if ($row['quotation_status'] == 1) { ?>
              <a href="?app=order&action=order_cancel_sale&id=<?=$row['quotation_id']?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล');"><i class="far fa-trash-alt"></i></a>
              <?php } ?>
            </td>
        </tr>
      <?php $i++;}} else { ?>
        <tr>
            <td class="text-center" colspan="7">ไม่มีรายการเสนอขาย</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>