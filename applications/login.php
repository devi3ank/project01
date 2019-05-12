<div id="app">
    <div class="container-login">
        <div class="form-login">
            <p class="title">หจก. สืบ เกษตรไท</p>
            <form action="applications/check_login.php" method="POST">
                <div class="form-group">
                    ชื่อผู้ใช้งาน :
                    <input type="text" name="u_username" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    รหัสผ่าน :
                    <input type="password" name="u_password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                </div>
            </form>
        </div>
    </div>
    <div class="detail-login">
        <?php
            $result = select_db("
                SELECT
                    *
                FROM
                    detail_tb
                WHERE
                    detail_status = '1'
            ");

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
        <div class="list-detail">
            <div class="description" style="background-image:url('./uploads/<?=$row['detail_image']?>')">
                <div class="name-detail">
                    <?=$row['detail_name']?><br/>
                    <span><?=$row['detail_description']?></span>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>
</div>