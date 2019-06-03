<?php
    check_user($_SESSION['user_type'], array(1,2));
    if (empty($_POST['date_start']) && empty($_POST['date_end'])) {
        $dateStart = date('Y-m-d');
        $dateEnd = date('Y-m-d');
    } else {
        $dateStart = $_POST['date_start'];
        $dateEnd = $_POST['date_end'];
    }
    

    $result = select_db("
        SELECT
            order_tb.*,
            store_tb.store_name
        FROM
            order_tb
        INNER JOIN store_tb ON order_tb.store_id = store_tb.store_id
        WHERE
            order_tb.order_status  >= '2' AND
            order_tb.order_fitdate BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
        ORDER BY 
            order_tb.order_fitdate ASC
    ");
?>

<div class="detail">
    <p class="title">ตรวจสอบข้อมูลการส่งสินค้า</p>

    <form action="" class="form-inline" method="POST">
        <div class="input-group mb-3">
            <div class="mt-1"> วันที่ขายสินค้า &nbsp;</div>
            <input type="date" name="date_start" value="<?=$dateStart?>" class="form-control form-control-sm">
            <div class="mt-1">&nbsp; ถึงวันที่ &nbsp;</div>
            <input type="date" name="date_end" value="<?=$dateEnd?>" class="form-control form-control-sm">&nbsp;
            <button type="submit" class="btn btn-secondary btn-sm">ค้นหา</button>
        </div>
    </form>

    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 80px;">#</th>
                <th class="text-center" style="width: 200px;">ส่งสินค้าให้กับ</th>
                <th class="text-center" style="width: 150px;">วันที่ขายสินค้า</th>
                <th class="text-center" style="width: 80px;">ราคาขาย</th>
                <th class="text-center" style="width: 100px;">น้ำหนัก</th>
                <th class="text-center" style="width: 150px;">ยอดการขาย</th>
                <th class="text-center" style="width: 150px;">วันที่ส่งสินค้า</th>
                <th class="text-center" style="width: 180px;">สถานะการส่งสินค้า</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) { 
                $i = 1;
                while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td class="text-center"><?=$i?></td>
                <td><?=$row['store_name']?></td>
                <td class="text-center"><?=date_format(date_create($row['order_fitdate']),"d/m/Y")?></td>
                <td class="text-right"><?=number_format($row['order_price_sale'],2)?></td>
                <td class="text-right"><?=number_format($row['order_weight'],2)?></td>
                <td class="text-right"><?=number_format($row['order_weight']*$row['order_price_sale'],2)?></td>
                <td class="text-center"><?=($row['order_date_transfer']!="0000-00-00")?date_format(date_create($row['order_date_transfer']),"d/m/Y"):""?></td>
                <td class="text-center <?php if($row['order_status'] >= 4){echo "alert-success";}?>"><?=($row['order_status']>=4)?"ส่งสินค้าเรียบร้อย":"ยังไม่ได้ส่งสินค้า"?></td>
            </tr>
        <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="6">ไม่มีข้อมูล</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>