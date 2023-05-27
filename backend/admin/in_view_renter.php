<?php require_once("../../connect.php");

    $TitleText = "ข้อมูลพื้นที่";

    $boxname = trim($_REQUEST['name']);
    $sql = "SELECT * FROM tb_market WHERE numberbox = '{$boxname}' ";
    $Market = DynDb_SelectTableRow($sql);

    $market_id = $Market['market_id'];
    $status_id = $Market['status_id'];
        
    if ($status_id == 3) // จอง
    {
        $sql = "SELECT *
            , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_booking.renter_id) AS renter_fullname
            FROM tb_booking WHERE market_id = {$market_id}
            ORDER BY bk_id DESC 
            LIMIT 1
        ";
        
        $Renter = DynDb_SelectTableRow($sql);
        
        $Renter['start_date'] = $Renter['bk_datetime'];
        $Renter['end_date'] = $Renter['bk_end'];
        
        $TitleText = "ข้อมูลผู้จอง";
    } 
    else if ($status_id == 2) // เช่า
    {
        $sql = "SELECT *
            , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_rent.renter_id) AS renter_fullname
            FROM tb_rent WHERE market_id = {$market_id}
            ORDER BY rent_id DESC 
            LIMIT 1
        ";
        
        $Renter = DynDb_SelectTableRow($sql);
        
        $Renter['start_date'] = $Renter['rent_dtime'];
        $Renter['end_date'] = $Renter['rent_end'];
        
        $TitleText = "ข้อมูลผู้เช่า";
    }


    

    define('INNER', true);
    require('header.php');

?>

    <div class="">
        <div class="card">
            <div class="card-header"><strong><?php echo $TitleText ?></strong></div>
            <div class="card-body card-block">

                <form id="addbooking" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="func" value="submit" />
                    <input type="hidden" name="action" value="add" />
                    
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
                        <div class="col col-md-2"><label class=" form-control-label">ชื่อ-สกุล</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="numberbox" name="numberbox" placeholder="หมายเลขแผง" class="form-control" required="" 
                                       value="<?php echo $Renter['renter_fullname'] ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">วันเวลาเริ่ม</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" id="numberbox" name="numberbox" placeholder="หมายเลขแผง" class="form-control" required="" 
                                       value="<?php echo FormatDate($Renter['start_date']) ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label">วันเวลาสิ้นสุด</label></div>
                        <div class="col-6 col-md-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" id="numberbox" name="numberbox" placeholder="หมายเลขแผง" class="form-control" required="" 
                                       value="<?php echo FormatDate($Renter['end_date']) ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="card-body nav nav-pills nav-justified" id="hh">
                        <a href="in_view_renter_info.php?id=<?php echo $Renter['renter_id'] ?>" 
                           type="button" class="btn btn-info btn-sm nav-link">รายละเอียดผู้เช่า</a>
                        &nbsp;

                        <?php if ($status_id == 3) : ?>
                        <a href="delete_booking.php?id=<?php echo $market_id ?>" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิกการจอง</a>
                        <?php endif ?>
                    </div>
                </form>


            </div>
        </div>
    </div>
<?php           
    require('footer.php');
?>