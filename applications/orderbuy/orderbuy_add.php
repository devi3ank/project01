<?php
  check_user($_SESSION['user_type'], array(1));
  $resultStore = select_db("
    SELECT
      *
    FROM
      store_tb
    WHERE
      store_type = '3' AND 
      store_status = '1'
  ");

  $resultProduct = select_db("
    SELECT
      *
    FROM
      products_tb
    WHERE
      products_status = '1'
  ");
?>
<div class="detail">
  <p class="title">จัดการรับซื้อสินค้า</p>
  <form action="?app=orderbuy&action=orderbuy_insert" method="POST">
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label text-right">ผู้ขายสินค้า : </label>
      <div class="col-sm-5">
        <select name="store_id" class="form-control">
          <?php while ($store = $resultStore->fetch_assoc()) { ?>
          <option value="<?=$store['store_id']?>"><?=$store['store_name']?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label text-right">สินค้า : </label>
      <div class="col-sm-5">
        <select name="products_id" class="form-control">
          <?php while ($product = $resultProduct->fetch_assoc()) { ?>
          <option value="<?=$product['products_id']?>"><?=$product['products_name']?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label text-right">จำนวน(กก.) : </label>
      <div class="col-sm-5">
        <input type="number" step="0.01" class="form-control" name="ob_weight" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label text-right">ราคาซื้อ : </label>
      <div class="col-sm-5">
        <input type="number" step="0.01" class="form-control" name="ob_price" required>
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