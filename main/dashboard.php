<?php
    $app = (!empty($_GET['app']))?$_GET['app']:'main';

    include './main/navbar.php';
?>
<div class="content">
<?php 
    include './applications/'.$app.'.php';
?>
</div>