<?php 
    check_user($_SESSION['user_type'], array(1,2));
    $id = $_GET['id']; 
    $resultStore = select_db("
        SELECT
            *
        FROM
            store_tb
        WHERE
            store_status = '1'
    ");
?>
<div class="detail">
    <p class="title">จัดการข้อมูลสินค้าในคลัง</p>
    <form action="?app=stock&action=manage_stock_buy_insert&id=<?=$id?>" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">วันที่สั่งซื้อ</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="lot_date" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">น้ำหนัก (กก.)</label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" name="lot_weight" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ราคา</label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" name="lot_price_buy" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ซื้อสินค้ากับ</label>
            <div class="col-sm-5">
                <select name="store_buy_id" id="" class="form-control" required>
                    <option value="">-- เลือกลูกค้า --</option>
                    <?php
                        while($rowStore = $resultStore->fetch_assoc()) {
                    ?>
                    <option value="<?=$rowStore['store_id']?>"><?=$rowStore['store_name']?></option>
                    <?php } ?>
                </select>
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