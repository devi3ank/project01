<?php
  check_user($_SESSION['user_type'], array(1));
  $id = $_GET['id'];

  $result = select_db("
    SELECT
      *
    FROM
      store_tb
    WHERE
      store_type = '3'
  ");
?>
<div class="detail">
  <p class="title">ยืนยันการส่งสินค้า<p>
  <form action="?app=order&action=order_confirm_buy&id=<?=$id?>&status=4" method="POST">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label text-right">วันที่ส่งสินค้า : </label>
      <div class="col-sm-5">
        <input type="date" name="order_date_transfer" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label text-right">ค่าส่งสินค้า : </label>
      <div class="col-sm-5">
        <input type="number" step="0.01" name="order_price_transfer" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label text-right"></label>
      <div class="col-sm-5">
        <button type="submit" class="btn btn-secondary btn-sm"><i class="far fa-save"></i> บันทึกข้อมูล</button>
      </div>
    </div>
  </form>
</div>