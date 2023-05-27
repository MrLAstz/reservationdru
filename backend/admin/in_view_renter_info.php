<?php require_once("../../connect.php");

    $renter_id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM tb_renter WHERE renter_id = '{$renter_id}' ";
    $Renter = DynDb_SelectTableRow($sql);
    

    define('INNER', true);
    require('header.php');

?>

    <div class="">
        <div class="card">
            <div class="card-header"><strong>รายละเอียดข้อมูลผู้เช่า</strong></div>
            <div class="card-body card-block">

                <form id="addbooking" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="func" value="submit" />
                    <input type="hidden" name="action" value="add" />
                    
                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">ชื่อ-สกุล</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa ti-id-badge"></i></div>
                                <input type="text" id="numberbox" name="numberbox" placeholder="หมายเลขแผง" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_fullname'] ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">วันเกิด</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" id="numberbox" name="numberbox" placeholder="" class="form-control" required="" 
                                       value="<?php echo FormatDate($Renter['renter_birth']) ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">เลขบัตรประชาชน</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="renter_birth" name="renter_birth" placeholder="" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_id_card'] ?>" readonly />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">ที่อยู่</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                <input type="text" id="renter_address" name="renter_address" placeholder="" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_address'] ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label class="form-control-label">เบอร์โทร </label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="text" id="renter_tel" name="renter_tel" placeholder="" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_tel'] ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">Email </label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                <input type="text" id="renter_birth" name="renter_birth" placeholder="" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_email'] ?>" readonly />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">รายละเอียดการขาย</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class=" fa fa-home"></i></div>
                                <input type="text" id="renter_detail" name="renter_detail" placeholder="" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_detail'] ?>" readonly />
                            </div>
                        </div>
                    </div>

                  <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ใช้งาน </label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="renter_user" name="renter_user" placeholder="" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_user'] ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="card-body nav nav-pills nav-justified" id="hh">
                        <!--<a href="index.php" type="button" class="btn btn-danger btn-sm nav-link">ปิด</a>-->
                    </div>
                </form>


            </div>
        </div>
    </div>
<?php           
    require('footer.php');
?>