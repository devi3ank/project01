<?php
    check_user($_SESSION['user_type'], array(4));
    $resultProducts = select_db("
      SELECT
        *
      FROM
        products_tb
      WHERE
        products_status = '1'
    ");
?>
<div class="detail">
    <p class="title">เพิ่มข้อมูลสินค้า</p>
    <form action="?app=order&action=order_quotation_insert" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">สินค้า : </label>
            <div class="col-sm-5">
              <select name="products_id" class="form-control">
                <option value="">-- เลือกสินค้า --</option>
                <?php if ($resultProducts->num_rows > 0) { 
                  while($p = $resultProducts->fetch_assoc()){  
                ?>
                <option value="<?=$p['products_id']?>"><?=$p['products_name']?></option>
                <?php }} ?>
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">น้ำหนัก(กก.) : </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" name="quotation_weight" class="form-control" autofocus required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ราคา/กก. : </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" name="quotation_price" class="form-control" autofocus required>
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