
<?php include('../../connect.php');
if (isset($_POST['function']) && $_POST['function']) {
    if ($_POST['action'] == 'add') {
        $market_id              = $_POST['market_id '];
        $renter_id              = $_POST['renter_id '];
        $bk_datetime            = $_POST['bk_datetime'];
        $bk_end                  = $_POST['bk_end'];

        $sql = "INSERT INTO tb_booking (market_id,renter_id,bk_datetime,bk_end)
            VALUES ('$market_id ', '$renter_id', '$bk_datetime ','$bk_end')";
        $insert = new class_conn();
        if ($insert->write_base($sql)) {
            echo 1;
        }
    }
}
