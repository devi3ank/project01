<?php
    if (empty($_POST['date_start']) && empty($_POST['date_end'])) {
        $typeReport = 1;
        $dateStart = date('Y-m-d');
        $dateEnd = date('Y-m-d');
    } else {
        $typeReport = $_POST['type_report'];
        $dateStart = $_POST['date_start'];
        $dateEnd = $_POST['date_end'];
    }

    if ($typeReport == 1) {
        $sql = "
            SELECT
                lot_tb.*,
                store_tb.store_name
            FROM
                lot_tb
            INNER JOIN store_tb ON lot_tb.store_buy_id = store_tb.store_id
            WHERE
                lot_tb.lot_status != '3' AND
                lot_tb.lot_date BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
            ORDER BY 
                lot_tb.lot_id ASC
        ";
    } elseif($typeReport == 2) {
        $sql = "
            SELECT
                lot_tb.*,
                store_tb.store_name
            FROM
                lot_tb
            INNER JOIN store_tb ON lot_tb.store_sale_id = store_tb.store_id
            WHERE
                lot_tb.lot_transfer = '2' AND
                lot_status != '3' AND
                lot_tb.lot_transfer_date BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
            ORDER BY 
                lot_tb.lot_id ASC
        ";
    } elseif($typeReport == 3) {
        $sql = "
            SELECT
                lot_tb.*,
                store_tb.store_name
            FROM
                lot_tb
            INNER JOIN store_tb ON lot_tb.store_sale_id = store_tb.store_id
            WHERE
                lot_tb.lot_transfer = '2' AND
                lot_status = '5' AND
                lot_tb.lot_payment BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
            ORDER BY 
                lot_tb.lot_id ASC
        ";
    }
    
    //dieArray($sql);

    $result = select_db($sql);
?>

<div class="detail">
    <p class="title">รายงาน</p>

    <form action="" class="form-inline" method="POST">
        <div class="input-group mb-3">
            <select name="type_report" class="form-control form-control-sm">
                <option value="1" <?php if ($typeReport == 1) {echo "selected";}?>>ใบสั่งซื้อ</option>
                <option value="2" <?php if ($typeReport == 2) {echo "selected";}?>>ใบส่งสินค้า/ใบแจ้งหนี้</option>
                <option value="3" <?php if ($typeReport == 3) {echo "selected";}?>>ใบเสร็จรับเงิน</option>
            </select>
            &nbsp;
            <input type="date" name="date_start" value="<?=$dateStart?>" class="form-control form-control-sm">
            <div class="mt-1">&nbsp; ถึงวันที่ &nbsp;</div>
            <input type="date" name="date_end" value="<?=$dateEnd?>" class="form-control form-control-sm">&nbsp;
            <button type="submit" class="btn btn-secondary btn-sm">ค้นหา</button>
        </div>
    </form>

    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">lot</th>
                <th class="text-center" style="width: 150px;">วันที่สั่งซื้อสินค้า</th>
                <th class="text-center">ซื้อสินค้ากับ</th>
                <th class="text-center" style="width: 150px;">ราคาซื้อ</th>
                <th class="text-center" style="width: 150px;">น้ำหนัก</th>
                <th class="text-center" style="width: 150px;">ยอดจริง</th>
                <th class="text-center" style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) { 
                $i = 1;
                while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td class="text-center"><?=$row['lot_id']?></td>
                <td class="text-center"><?=date_format(date_create($row['lot_date']),"d/m/Y")?></td>
                <td><?=$row['store_name']?></td>
                <td class="text-right"><?=number_format($row['lot_price_buy'],2)?></td>
                <td class="text-right"><?=number_format($row['lot_weight'],2)?></td>
                <td class="text-right"><?=number_format($row['lot_weight']*$row['lot_price_buy'],2)?></td>
                <td class="text-center">
                    <?php if ($typeReport == 1) { ?>
                    <a href="<?=$domain?>/report/report_buy.php?id=<?=$row['lot_id']?>" title="พิมพ์รายงานใบสั่งสินค้า" class="btn btn-warning btn-sm" target="_blank">
                        <i class="fas fa-print"></i>
                    </a>
                    <?php } elseif($typeReport == 2) { ?>
                    <a href="<?=$domain?>/report/report_transfer.php?id=<?=$row['lot_id']?>" title="พิมพ์รายงานใบส่งสินค้า/ใบแจ้งหนี้" class="btn btn-warning btn-sm" target="_blank">
                        <i class="fas fa-print"></i>
                    </a>
                    <?php } elseif($typeReport == 3) { ?>
                    <a href="<?=$domain?>/report/report_payment.php?id=<?=$row['lot_id']?>" title="พิมพ์รายงานใบส่งสินค้า/ใบแจ้งหนี้" class="btn btn-warning btn-sm" target="_blank">
                        <i class="fas fa-print"></i>
                    </a>
                    <?php } ?>
                </td>
            </tr>
        <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="6">ไม่มีข้อมูล</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>