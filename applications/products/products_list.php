<?php
    check_user($_SESSION['user_type'], array(1));
    $result = select_db("
        SELECT
            *
        FROM
            products_tb
        WHERE
            products_status != '3'
    ");
?>

<div class="detail">
    <p class="title">จัดการข้อมูลสินค้า</p>
    <a href="?app=products&action=products_add" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-user-plus"></i> เพิ่มข้อมูลสินค้า</a>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center">ชื่อสินค้า</th>
                <th class="text-center" style="width: 150px;">สถานะ</th>
                <th class="text-center" style="width: 150px;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($result->num_rows > 0) {
                $i=1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?=$i?></td>
                    <td><?=$row['products_name']?></td>
                    <td class="text-center"><?=$status[$row['products_status']]?></td>
                    <td class="text-center">
                        <a href="?app=products&action=products_edit&id=<?=$row['products_id']?>" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="?app=products&action=products_delete&id=<?=$row['products_id']?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล');"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php $i++; }} else { ?>
                <tr>
                    <td class="text-center" colspan="4">ไม่มีข้อมูล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>