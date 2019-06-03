<?php
    check_user($_SESSION['user_type'], array(3));
    $store = $_SESSION['store_id'];
    $result = select_db("
        SELECT
          *
        FROM
          order_tb
        INNER JOIN products_tb ON order_tb.products_id = products_tb.products_id
        WHERE
          store_id = '$store'
    ");
?>

<div class="detail">
    <p class="title">รายการสั่งซื้อสินค้าล่วงหน้า</p>
    <a href="?app=order&action=order_buy2" class="btn btn-secondary btn-sm mb-2">สั่งซื้อสินค้าล่วงหน้า</a>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width:80px;">#</th>
                <th class="text-center" style="width:120px;">วันที่สั่งซื้อสินค้า</th>
                <th class="text-center">ชื่อสินค้า</th>
                <th class="text-center" style="width:120px;">น้ำหนัก(กก.)</th>
                <th class="text-center" style="width:120px;">ราคาขาย(บาท)</th>
                <th class="text-center" style="width:120px;">ยอดจริง(บาท)</th>
                <th class="text-center" style="width:150px;">สถานะ</th>
                <th class="text-center" style="width:80px;"></th>
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
                <td class="text-center"><?=date_format(date_create($row['order_fitdate']),"d/m/Y")?></td>
                <td><?=$row['products_name']?></td>
                <td class="text-right"><?=number_format($row['order_weight'], 2)?></td>
                <td class="text-right"><?=number_format($row['order_price_sale'], 2)?></td>
                <td class="text-right"><?=number_format($row['order_price_sale']*$row['order_weight'], 2)?></td>
                <td class="text-center"><?=$orderStatus[$row['order_status']]?></td>
                <td class="text-center">
                    <?php if ($row['order_status'] == 1) {?>
                    <a href="?app=order&action=order_cancel_advance&id=<?=$row['order_id']?>" onclick="return confirm('ยืนยันการยกเลิก')" class="btn btn-danger btn-sm" title="ยกเลิกการสั่งซื้อ"><i class="fas fa-window-close"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="7">ไม่มีรายการสั่งซื้อ</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>