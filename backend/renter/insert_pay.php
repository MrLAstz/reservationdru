<?php include('header.php'); ?>
<?php
    $TablePage = "show_payment.php";

    $TbName = "tb_payment";
    $TbPrimaryKey = "pay_id";

    $type = $_REQUEST['type'];
    if ($type == '')
        $type = 'pledge';

    if ($type == 'pledge')
        $TablePage = "show_booking.php";
    else if ($type == 'rental')
        $TablePage = "show_rent.php";
        
        
    $mode = $_REQUEST['mode'];
    $func = $_REQUEST['func'];
    $Id = intval($_REQUEST['id']);
    $errors = array();

    if ($type == 'pledge')
    {
        $Booking = DynDb_SelectTableRow("SELECT *
        , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_booking.market_id) AS numberbox
        , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_booking.renter_id) AS renter_fullname
        FROM tb_booking 
        WHERE bk_id = {$Id}");
        
        $market_id = $Booking['market_id'];
        $renter_id = $Booking['renter_id'];                
    }
    else if ($type == 'rental')
    {
        $rent_id = intval( $_REQUEST['rent_id'] );
        
        $Rent = DynDb_SelectTableRow("SELECT *
        , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_rent.market_id) AS numberbox
        , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_rent.renter_id) AS renter_fullname
        FROM tb_rent 
        WHERE rent_id = {$rent_id}");
        
        $market_id = $Rent['market_id'];
        $renter_id = $Rent['renter_id'];             
        $pay_money = $Rent['rent_rental'];        
    }

    if ($func == 'submit' && $type != '')
    {
        $bk_id = intval( $_REQUEST['bk_id'] );
        $rent_id = intval( $_REQUEST['rent_id'] );
        
        $pay_money = floatval( $_REQUEST['pay_money'] );
        $day_transfer = trim( $_REQUEST['day_transfer'] );
        $time_transfer = trim( $_REQUEST['time_transfer'] );
        $admin_id = 0;
        $status_id = 1;
        
        $Files = Get_UploadedFiles('pay_slip');
        if (count($Files) > 0) 
        {            
            $Pictures = Save_UploadedFiles($Files, '../../../uploads/' . date('U'));
            
            $pay_silp = $Pictures[0];
        }
        
        if ($pay_money <= 0)
            $errors[] = "โปรดใส่จำนวนเงินที่ถูกต้อง";
        
        if ($day_transfer == '' || $time_transfer == '')
            $errors[] = "โปรรดใส่เวลาให้ถูกต้อง";
        
            
        if (count($errors) == 0)
        {
            $res = DynDb_Insert($TbName, array(
                'renter_id', $User_Id,
                'market_id', $market_id,
                'bk_id', $bk_id,
                'rent_id', $rent_id,                
                'day_transfer', $day_transfer,
                'time_transfer', $time_transfer,
                'admin_id', $admin_id,
                'status_id', $status_id,
                'pay_money', $pay_money,
                'pay_silp', $pay_silp,

                " WHERE {$TbPrimaryKey} = {$Id} "
            ));

            if ($res > 0)
            {
                $cls_conn = new class_conn;
                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                echo $cls_conn->goto_page(0,$TablePage);
            }
            else
            {
                $cls_conn = new class_conn;
                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
            }
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
                
            <?php if (($mode == 'update') && ($res > 0)) : ?>
            <div class="alert alert-success">
              ทำการอัพเดทรายการเรียบร้อยแล้ว
            </div>
            <?php endif;?>

            <?php if (count($errors)) : ?>
            <div class="alert alert-warning">
                <?php foreach($errors as $error) : ?>
                <li><?php echo $error ?></li>
                <?php endforeach ?>
            </div>
            <?php endif;?>                 

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header"><strong>แจ้งชำระเงิน</strong></div>
                        <div class="card-body card-block">

                        <form id="addperson" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="func" value="submit" />
                            <input type="hidden" name="id" value="<?php echo $Id ?>" />
                            
                                <div class="row form-group">
                                    <div class="col col-md-2"><label for="select" class=" form-control-label">ประเภท</label></div>
                                    <div class="col-6 col-md-10">
                                        <?php
                                        echo MakeSelect("type", 
                                            array(
                                                'pledge' => 'ค่ามัดจำ',
                                                'rental' => 'ค่าเช่า',
                                            ), 
                                            $_REQUEST['type']);                                        
                                        ?>
                                    </div>
                                </div>
                                <?php if ($type == 'rental') : ?>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label for="select" class=" form-control-label">แผงที่จอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <?php
                                        $TbRent = DynDb_SelectTable("
                                            SELECT rent_id
                                            , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_rent.market_id) AS numberbox
                                            FROM tb_rent
                                            WHERE renter_id = {$User_Id} ");
                                        echo MakeSelectTable("rent_id", $TbRent, "rent_id", "numberbox", $Id);
                                        ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label for="select" class=" form-control-label">แผงที่เช่า</label></div>
                                    <div class="col-6 col-md-10">
                                        <?php
                                        $TbBooking = DynDb_SelectTable("
                                            SELECT bk_id
                                            , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_booking.market_id) AS numberbox
                                            FROM tb_booking
                                            WHERE renter_id = {$User_Id} ");
                                        echo MakeSelectTable("bk_id", $TbBooking, "bk_id", "numberbox", $Id);
                                        ?>
                                    </div>
                                </div>
                                <?php endif ?>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ยอดเงินทั้งหมด</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-home"></i></div>
                                            <input type="text" id="pay_money" name="pay_money" placeholder="ยอดเงินที่ชำระ" class="form-control"
                                                   value="<?php echo $pay_money ?>" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">วันที่ชำระเงิน</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" id="day_transfer" name="day_transfer" placeholder="เดือน/วัน/ปี" class="form-control " required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">เวลาที่ชำระเงิน</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <?php
                                            echo MakeSelect("time_transfer", $Times, $_REQUEST['time_transfer']);
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">หลักฐานการโอน</label></div>
                                    <div class="col-6 col-md-10">
                                        <input type="file" id="pay_slip" name="pay_slip" placeholder="เลือกไฟล์"  required="">                                        
                                    </div>
                                </div>

                                <div class="card-body nav nav-pills nav-justified" id="hh">

                                    <button type="summit" name="submit" class="btn btn-success btn-sm btn-save nav-link">ยืนยัน</button>
                                    &nbsp;<a href="<?php echo $TablePage ?>" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
                                </div>
                            </form>

                            <script>
                                document.getElementById('type').onchange = function() {
                                    window.location = "insert_pay.php?type="+this.value
                                }
                                
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>