<?php 
    $id = $_GET['id'];
    
    $result = select_db("
        SELECT
            *
        FROM
            lot_tb
        WHERE
            products_id = '$id'
    ");
?>
<div class="detail">
    <p class="title">จัดการข้อมูลสินค้าในคลัง > รายการสต๊อกสินค้า</p>
    <div class="row mt-2">
        <div class="col-sm-6"><a href="?app=stock&action=manage_stock_buy&id=<?=$id?>" class="btn btn-secondary btn-sm">สั่งซื้อสินค้า</a></div>
        <div class="col-sm-6">
            <form action="" class="form-inline float-right">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" placeholder="ค้นหา" aria-label="ค้นหา" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn-sm" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px">Lot</th>
                <th class="text-center" >วันที่</th>
                <th class="text-center" style="width: 150px">สถานะ</th>
                <th class="text-center" style="width: 150px">น้ำหนัก</th>
                <th class="text-center" style="width: 150px">ราคาซื้อ</th>
                <th class="text-center" style="width: 150px">ยอดจริง</th>
                <th class="text-center" style="width: 100px"></th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            // $row = $result->fetch_assoc();
            // dieArray($row);
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td class="text-center"><?=$i?></td>
                <td class="text-center"><?=date_format(date_create($row['lot_date']),"d/m/Y")?></td>
                <td class="text-center"><?=$statusLot[$row['lot_status']]?></td>
                <td class="text-right"><?=number_format($row['lot_weight'],2)?></td>
                <td class="text-right"><?=number_format($row['lot_price_buy'],2)?></td>
                <td class="text-right"><?=number_format($row['lot_weight']*$row['lot_price_buy'],2)?></td>
                <td class="text-center">
                    <a href="?app=stock&action=manage_stock_sale&id=<?=$id?>&lot_id=<?=$row['lot_id']?>" class="btn btn-sm btn-secondary" title="ขายสินค้า"><i class="fas fa-hand-holding-usd"></i></a>
                </td>
            </tr>
        <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="7">ไม่มีข้อมูล</td>
            </tr>
        <?php } ?> 
        </tbody>
    </table>
</div>