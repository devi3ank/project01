<?php
check_user($_SESSION['user_type'], array(3));
  $result = select_db("
    SELECT
      *
    FROM
      products_tb
    WHERE
      products_status = '1'
  ");
?>

<div class="detail">
  <p class="title">สั่งซื้อสินค้า</p>
  <form action="?app=order&action=order_buy2_insert" method="POST">
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label text-right">สินค้า</label>
      <div class="col-sm-5">
        <select name="products_id" class="form-control">
        <?php while($row = $result->fetch_assoc()) { ?>
          <option value="<?=$row['products_id']?>"><?=$row['products_name']?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label text-right">น้ำหนัก (กก.)</label>
      <div class="col-sm-5">
        <input type="number" step="0.01" class="form-control" name="order_weight" required>
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