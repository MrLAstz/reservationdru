<?php 
    require_once('configs.php');
    include('header.php');


    if ($User)
    {

        $dest = ($User['user_type'] == 'admin') ?
                'backend/admin/market.php' :
                'backend/renter/market.php';
    }
    else
        $dest = "market.php";

    $cls_conn=new class_conn;
    echo $cls_conn->goto_page(0, $dest);

?>

<div class="right_col" role="main">
         
 
</div>
<?php include('footer.php');?>