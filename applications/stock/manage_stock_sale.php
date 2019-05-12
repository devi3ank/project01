<?php
    check_user($_SESSION['user_type'], array(1,2));
    $id = $_GET['id']; // products_id
    $lot_id = $_GET['lot_id']; // lot_id
    $result = select_db("
        SELECT
            lot_tb.*,
            products_tb.products_name
        FROM
            lot_tb
        INNER JOIN products_tb ON lot_tb.products_id = products_tb.products_id
        WHERE
            lot_id = '$lot_id' AND
            lot_status = '1'
    ");

    if ($result->num_rows == 0) {
        alert_msg('สินค้าไม่มีข้อมูล หรือ สินค้าที่ท่านเลือกได้ขายไปแล้ว');
        exit();
    }

    $row = $result->fetch_assoc();

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
    <p class="title">จัดการข้อมูลสินค้าในคลัง > ฟอร์มการขายสินค้า</p>
    
    <form action="?app=stock&action=manage_stock_sale_insert&id=<?=$id?>&lot_id=<?=$lot_id?>" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รหัส Lot</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="lot_id" value="<?=$row['lot_id']?>" required readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ชื่อสินค้า</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="<?=$row['products_name']?>" required readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">น้ำหนัก (กก.)</label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" value="<?=$row['lot_weight']?>" required readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ราคาขาย</label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" name="lot_price_sale" value="" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">วันที่ขาย</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="lot_date_sale" value="lot_date_sale" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ขายสินค้าให้กับ</label>
            <div class="col-sm-5">
                <select name="store_sale_id" class="form-control" required>
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