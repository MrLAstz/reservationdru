
<?php include('connect.php');
if (isset($_POST['function']) && $_POST['function'] == 'check_password') {
    if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['password2']) && !empty($_POST['password2'])) {

        if ($_POST['password'] == $_POST['password2']) {
            echo 1; //ผ่าน
        } else {
            echo 2; //ไม่ผ่าน
        }
    } else {
        echo 0; //รอ
    }
} else {
    if ($_POST['action'] == 'add') {
        $renter_fullname    = $_POST['renter_fullname'];
        $renter_birth        = $_POST['renter_birth'];
        $renter_id_card        = $_POST['renter_id_card'];
        $renter_detail          = $_POST['renter_detail'];
        $renter_address        = $_POST['renter_address'];
        $renter_tel            = $_POST['renter_tel'];
        $renter_email        = $_POST['renter_email'];
        $renter_user        = $_POST['renter_user'];
        $renter_password    = $_POST['renter_password'];
        $renter_password2    = $_POST['renter_password2'];

        $sql = "INSERT INTO tb_renter (renter_fullname,renter_birth,renter_id_card,renter_detail,renter_address,renter_tel,renter_email,renter_user,renter_password)
            VALUES ('$renter_fullname', '$renter_birth', '$renter_id_card ','$renter_detail','$renter_address ','$renter_tel','$renter_email ','$renter_user ','$renter_password')";
        $insert = new class_conn();
        if ($insert->write_base($sql)) {
            echo 1;
        }
    }
}
