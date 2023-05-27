<?php include('header.php');?>
<?php

    $cls_conn = new class_conn;
    echo $cls_conn->goto_page(0, 'market.php');
?>
<?php include('footer.php');?>