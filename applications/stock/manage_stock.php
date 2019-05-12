<?php
    check_user($_SESSION['user_type'], array(1,2));
    $result = select_db("
        SELECT
            products_tb.*,
            COUNT(lot_tb.lot_id) AS cntLot
        FROM
            products_tb
        LEFT JOIN lot_tb ON products_tb.products_id = lot_tb.products_id
        WHERE
            products_status = '1'
        GROUP BY products_tb.products_id
    ");

    if ($result->num_rows == 0) {
        alert_msg('ไม่มีข้อมูล');
        exit();
    }
?>

<div class="detail">
    <p class="title">จัดการข้อมูลสินค้าในคลัง</p>
    
    <div class="row mt-2">
        <div class="col-sm-12">
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
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center" style="width: 100px;">รหัสสินค้า</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center" style="width: 200px;">จำนวน</th>
                <th class="text-center" style="width: 100px;"></th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td class="text-center"><?=$i?></td>
                <td class="text-center"><?=$row['products_code']?></td>
                <td><?=$row['products_name']?></td>
                <td class="text-center"><?=$row['cntLot']?></td>
                <td class="text-center">
                    <a href="?app=stock&action=manage_stock_list&id=<?=$row['products_id']?>" class="btn btn-danger btn-sm" title="รายการสต๊อก"><i class="fas fa-list-ul"></i></a>
                </td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>

    
</div>