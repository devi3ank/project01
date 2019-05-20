<?php 
    check_user($_SESSION['user_type'], array(1,2));
    $id = $_GET['id'];
    
    $result = select_db("
        SELECT
            *
        FROM
            lot_tb
        WHERE
            products_id = '$id' AND
            lot_status != '3'
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
                <th class="text-center" style="width: 180px"></th>
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
                <td class="text-center"><?=$row['lot_id']?></td>
                <td class="text-center"><?=date_format(date_create($row['lot_date']),"d/m/Y")?></td>
                <td class="text-center"><?=$statusLot[$row['lot_status']]?></td>
                <td class="text-right"><?=number_format($row['lot_weight'],2)?></td>
                <td class="text-right"><?=number_format($row['lot_price_buy'],2)?></td>
                <td class="text-right"><?=number_format($row['lot_weight']*$row['lot_price_buy'],2)?></td>
                <td class="text-center <?php if ($row['lot_transfer'] == 2) {echo "alert-success";}?>">
                    <?php if (($row['lot_status'] == 1 || $row['lot_status'] == 4) && $row['lot_transfer'] == 1) { ?>
                        <a href="?app=stock&action=manage_stock_sale&id=<?=$id?>&lot_id=<?=$row['lot_id']?>" class="btn btn-sm btn-secondary" title="ขายสินค้า"><i class="fas fa-hand-holding-usd"></i></a>
                    <?php } elseif($row['lot_status'] == 2 && $row['lot_transfer'] == 1) { ?>
                        <!-- <a href="?app=stock&action=manage_stock_transfer&id=<?=$id?>&lot_id=<?=$row['lot_id']?>" class="btn btn-sm btn-success" title="ส่งสินค้า" onclick="return confirm('ยืนยันการส่งสินค้า ?')"><i class="fas fa-exchange-alt"></i></a> -->
                        <button type="button" class="btn btn-sm btn-success" title="ส่งสินค้า" data-lotid="<?=$row['lot_id']?>" data-toggle="modal" data-target="#transfer"><i class="fas fa-exchange-alt"></i></a>
                    <?php } else {
                        echo "ส่งสินค้าเรียบร้อย";
                    } ?>
                </td>
                <td class="text-center">
                    <?php if ($row['lot_status'] != '5') { ?>
                    <a href="?app=stock&action=manage_stock_confirm_pay&id=<?=$id?>&lot_id=<?=$row['lot_id']?>" class="btn btn-success btn-sm" onclick="return confirm('ยืนยันการชำระเงิน');" title="ยืนยันการชำระเงิน"><i class="fas fa-money-bill-wave"></i></a>
                    <?php } ?>
                    <a href="?app=stock&action=manage_stock_delete&id=<?=$id?>&lot_id=<?=$row['lot_id']?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล');" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลการส่งสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?app=stock&action=manage_stock_transfer&id=<?=$id?>" method="POST">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label text-right">วันที่ส่งสินค้า</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="lot_transfer_date" required>
                    <input type="hidden" class="form-control" name="lot_id">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label text-right">ค่ากรรมกร/ค่าโอน</label>
                <div class="col-sm-8">
                    <input type="number" step="0.01" class="form-control" name="lot_other" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label text-right">หมายเหตุ</label>
                <div class="col-sm-8">
                    <input type="number" step="0.01" class="form-control" name="lot_note_transfer" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label text-right"></label>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $('#transfer').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('lotid')
        var modal = $(this)
        modal.find('input[name=lot_id]').val(id)
    })
</script>