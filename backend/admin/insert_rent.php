<?php include('header.php'); ?>
<?php
    $TablePage = "show_booking.php";

    $TbName = "tb_rent";
    $TbPrimaryKey = "rent_id";

    $mode = $_REQUEST['mode'];
    $func = $_REQUEST['func'];
    $Id = intval($_REQUEST['id']);

    $Booking = DynDb_SelectTableRow("SELECT *
        , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_booking.market_id) AS numberbox
        , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_booking.renter_id) AS renter_fullname
        FROM tb_booking 
        WHERE bk_id = {$Id}");

    if ($func == 'submit' && $Booking)
    {
        $market_id = $Booking['market_id'];
        $renter_id = $Booking['renter_id'];
        
        $rent_dtime = trim( $_REQUEST['rent_dtime'] );
        $rent_end = trim( $_REQUEST['rent_end'] );
        $rent_rental = floatval( $_REQUEST['rent_rental'] );
        $rent_pledge = floatval( $_REQUEST['rent_pledge'] );
        
        $res = DynDb_Insert($TbName, array(
            
            'bk_id', $Id,
            'market_id', $market_id,
            'renter_id', $renter_id,
            'rent_dtime', $rent_dtime,
            'rent_end', $rent_end,
            'rent_rental', $rent_rental,
            'rent_pledge', $rent_pledge,
                            
            " WHERE {$TbPrimaryKey} = {$Id} "
        ));
        
        if ($res > 0)
        {
            $rent_id = $res;
            
            DynDb_Update('tb_booking', array(                
                'rent_id', $rent_id,
                
                " WHERE bk_id = {$Id} "
            ));
            
            DynDb_Update('tb_market', array(
                'status_id', 2,
                
                " WHERE market_id = {$market_id} "
            ));
            
            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
            echo $cls_conn->goto_page(0,$TablePage);
        }
        else
        {
            echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
        }
    }

    $sql = "SELECT * FROM {$TbName} WHERE {$TbPrimaryKey} = {$Id}";
    $row = DynDb_SelectTableRow($sql);


?>
<header>
    <style>
        .le {
            margin-left: 100px;
            margin-right: -100px;
        }

        #hh {
            padding-left: 17%;

        }
    </style>
    <script>
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;

        }
    </script>
</header>
<div class="le">
    <div class="content mt-2">
        <div class="animated fadeIn">


            <div class="">

                <!--/.col-->

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header"><strong>สร้างสัญญาเช่า</strong></div>
                        <div class="card-body card-block">

                            <form action="#" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="func" value="submit" />
                                <input type="hidden" name="mode" value="update" />
                                <input type="hidden" name="id" value="<?php echo $Id ?>" />
                                
                                <div class="row form-group">
                                    <div class="col col-md-2"><label for="select" class=" form-control-label">รหัสการจอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <input type="text" id="bk_id" name="bk_id" placeholder="หมายเลขแผง" class="form-control" value="<?php echo $Booking['bk_id'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">หมายเลขแผง</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-home"></i></div>
                                            <input type="text" id="market_id" name="market_id" placeholder="หมายเลขแผง" class="form-control" value="<?php echo $Booking['numberbox'] ?>" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้จอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="renter_id" name="renter_id" placeholder="ชื่อ-นามสกุล" class="form-control"  value="<?php echo $Booking['renter_fullname'] ?>" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">วันเวลาเริ่มต้นการเช่า</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" id="	rent_dtime" name="rent_dtime" placeholder="วัน/เดือน/ปี" class="form-control " required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">วันเวลาสิ้นสุดการเช่า</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" id="rent_end" name="rent_end" placeholder="dd/mm/yyyy" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ค่าเช่า</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-home"></i></div>
                                            <input type="text" id="rent_rental" name="rent_rental" placeholder="" class="form-control" value="" required="" />
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ค่ามัดจำ</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-home"></i></div>
                                            <input type="text" id="rent_pledge" name="rent_pledge" placeholder="" class="form-control" value="" required="" />
                                        </div>
                                    </div>
                                </div>                                

                                <div class="card-body nav nav-pills nav-justified" id="hh">

                                    <button type="summit" name="submit" class="btn btn-success btn-sm btn-save nav-link">ยืนยัน</button>
                                        <a href="<?php echo $TablePage ?>" class="btn btn-danger btn-sm" >ยกเลิก</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>