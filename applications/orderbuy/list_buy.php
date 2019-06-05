<?php 
    check_user($_SESSION['user_type'], array(1));
    $result = select_db("    
        SELECT 
          *
        FROM 
          order_buy_tb
        INNER JOIN store_tb ON order_buy_tb.store_id = store_tb.store_id
        INNER JOIN products_tb ON order_buy_tb.products_id = products_tb.products_id
        WHERE 
          order_buy_tb.ob_status != '0'
    ");
?>
<div class="detail">
    <p class="title">จัดการรับซื้อสินค้า</p>
    <a href="?app=orderbuy&action=orderbuy_add" class="btn btn-secondary btn-sm mb-2">สั่งซื้อสินค้า</a>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center">ร้านที่ซื้อสินค้า</th>
                <th class="text-center">สินค้า</th>
                <th class="text-center" style="width: 150px;">จำนวน</th>
                <th class="text-center" style="width: 150px;">ราคา</th>
                <th class="text-center" style="width: 150px;">ยอดจริง</th>
                <th class="text-center" style="width: 80px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) { 
                $i = 1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['store_name']; ?></td>
                    <td class="text-center"><?=$row['products_name']?></td>
                    <td class="text-right"><?=number_format($row['ob_weight'],2)?></td>
                    <td class="text-right"><?=number_format($row['ob_price'],2)?></td>
                    <td class="text-right"><?=number_format($row['ob_weight']*$row['ob_price'],2)?></td>
                    <td class="text-center">
                        <?php if ($row['ob_status'] < 2) { ?>
                            <a href="?app=orderbuy&action=orderbuy_delete&id=<?=$row['ob_id']?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ')">ลบ</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php
                $i++; 
                } 
            } else { 
            ?>
                <tr>
                    <td class="text-center" colspan="7">ไม่มีข้อมูล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>