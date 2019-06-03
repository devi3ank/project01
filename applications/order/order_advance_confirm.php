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
  <p class="title">ยืนยันการสั่งซื้อสินค้า</p>
  <form action="?app=order&action=order_confirm_buy&id=<?=$id?>&status=3" method="POST">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label text-right">ร้านที่ขายสินค้า : </label>
      <div class="col-sm-5">
        <select name="store_id" class="form-control">
        <?php while ($store = $result->fetch_assoc()) { ?>
          <option value="<?=$store['store_id']?>"><?=$store['store_name']?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label text-right">ราคาซื้อ(บาท) : </label>
      <div class="col-sm-5">
        <input type="number" step="0.01" name="order_price_buy" class="form-control" autofocus required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label text-right">ราคาขาย(บาท) : </label>
      <div class="col-sm-5">
        <input type="number" step="0.01" name="order_price_sale" class="form-control" required>
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