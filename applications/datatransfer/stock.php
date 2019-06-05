<?php
    check_user($_SESSION['user_type'], array(1,2));
    $search = (empty($_POST['search']))?"":$_POST['search'];

    $result = select_db("
        SELECT
            *
        FROM
            products_tb
        WHERE
            products_tb.products_status != '3'
    ");
?>

<div class="detail">
    <p class="title">ตรวจสอบข้อมูลการสั่งซื้อสินค้า</p>

    <form action="" class="form-inline" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="search" value="<?=$search?>" class="form-control form-control-sm">&nbsp;
            <button type="submit" class="btn btn-secondary btn-sm">ค้นหา</button>
        </div>
    </form>

    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 80px;">#</th>
                <th class="text-center">วันที่สั่งซื้อสินค้า</th>
                <th class="text-center" style="width: 200px;">จำนวนคงเหลือ (กก.)</th>
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
                <td><?=$row['products_name']?></td>
                <td class="text-right"><?=number_format($row['products_stock'], 2)?></td>
            </tr>
        <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="3">ไม่มีข้อมูล</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>