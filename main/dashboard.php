<?php
    $app = (!empty($_GET['app']))?$_GET['app']:'main';
    include './applications/connect_db.php';
    include './main/navbar.php';
?>
<div class="content">
<?php 
    include './applications/'.$app.'.php';
?>
</div>

<?php $conn->close(); ?>