<?php
  check_user($_SESSION['user_type'], array(1));
  $id = $_GET['id'];
  $resultOrder = select_db("
    SELECT
      *
    FROM
      order_tb
    WHERE
      order_id = '$id'
  ");
  $order = $resultOrder->fetch_assoc();

  $products_id = $order['products_id'];
  $resultProduct = select_db("
    SELECT
      *
    FROM
      products_tb
    WHERE
      products_id = '$products_id'
  ");
  $product = $resultProduct->fetch_assoc();
?>
<div class="detail">
  <p class="title">ยืนยันการสั่งซื้อสินค้า</p>

  <?php
    if ($product['products_stock'] < $order['order_weight']) {
  ?>
    <span class="text-danger font-weight-bold" style="font-size: 28px;">ไม่สามารถสั่งซื้อสินค้าได้ เนื่องสินค้าในคลังมีน้อยกว่าความต้องการของลูกค้า <br>
    กรุณาสั่งซื้อสินค้าจากผู้ขายก่อน</span> <a href="?app=orderbuy&action=list_buy">คลิก !!</a>
  <?php } else { ?>
    <form action="?app=order&action=order_confirm_buy&id=<?=$id?>&status=3" method="POST">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label text-right">ราคาซื้อ(บาท) : </label>
        <div class="col-sm-5">
          <input type="number" step="0.01" name="order_price_buy" class="form-control" required>
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
  <?php } ?>
</div>