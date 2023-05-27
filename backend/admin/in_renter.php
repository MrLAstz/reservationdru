<?php require_once("../../connect.php");

    $boxname = trim($_REQUEST['name']);
    $sql = "SELECT * FROM tb_market WHERE numberbox = '{$boxname}' ";
    $Market = DynDb_SelectTableRow($sql);

    $status_id = $Market['status_id'];
        
    if ($status_id == 2 || $status_id == 3)
    {
        header("Location: in_view_renter.php?name={$Market['numberbox']}");
        exit;
    }

    if (isset($_POST['func']) && $_POST['func'] == 'submit') {
        if ($_POST['action'] == 'add') {
            $market_id              = $_POST['market_id'];
            $renter_id              = $_POST['renter_id'];
            $bk_datetime            = $_POST['bk_datetime'];
            $bk_end                  = $_POST['bk_end'];
            $contract_id             = 0;

            $sql = "INSERT INTO tb_booking (market_id,renter_id,bk_datetime,bk_end)
                VALUES ('$market_id ', '$renter_id', '$bk_datetime ','$bk_end')";
            //$insert = new class_conn();
            //if ($insert->write_base($sql)) {
            
            $res = DynDb_Insert("tb_booking", array(
                'market_id', $market_id,
                'renter_id', $renter_id,
                'bk_datetime', $bk_datetime,
                'bk_end', $bk_end,
                'contract_id', $contract_id,
            ));
            
            if ($res > 0) 
            {
                
                $res = DynDb_Update('tb_market', array(
                    'status_id', 3,
                    " WHERE market_id = {$market_id} "
                ));
                
                header("Location: index.php");
                exit;
            }
        }
    }

    define('INNER', true);
    require('header.php');

?>

    <div class="">
        <div class="card">
            <div class="card-header"><strong>จองพื้นที่</strong></div>
            <div class="card-body card-block">

                <form id="addbooking" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="func" value="submit" />
                    <input type="hidden" name="action" value="add" />
                    <!--<div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">รหัสการจอง</label></div>
                        <div class="col-6 col-md-10">
                            <?php
                                $sqld=" select * from tb_status";
                                $Tb = DynDb_SelectTable($sqld);
                                //var_dump($Tb);
                                echo MakeSelectTable("status_id", $Tb, "status_id", "status_name", $_REQUEST['status_id']);
                            ?>
                        </div>
                    </div>-->

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">หมายเลขแผง</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                <input type="hidden" id="market_id" name="market_id" value="<?php echo $Market['market_id'] ?>" />
                                <input type="text" id="numberbox" name="numberbox" placeholder="หมายเลขแผง" class="form-control" required="" 
                                       value="<?php echo $Market['numberbox'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้จอง</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <?php
                                $sqld=" select * from tb_renter";
                                $Tb = DynDb_SelectTable($sqld);
                                //var_dump($Tb);
                                echo MakeSelectTable("renter_id", $Tb, "renter_id", "renter_fullname", $_REQUEST['renter_id']);
                            ?>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">วันเวลาที่จอง</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" id="bk_datetime" name="bk_datetime" placeholder="วัน/เดือน/ปีเกิด" class="form-control " required="">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">วันเวลาสิ้นสุดการจอง</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" id="bk_end" name="bk_end" placeholder="ที่อยู่" class="form-control" required="">
                            </div>
                        </div>
                    </div>

                    <div class="card-body nav nav-pills nav-justified" id="hh">

                        <button type="summit" name="submit" class="btn btn-success btn-sm btn-save nav-link">ยืนยัน</button>
                        &nbsp;<a href="index.php" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
<?php           
    require('footer.php');
?>