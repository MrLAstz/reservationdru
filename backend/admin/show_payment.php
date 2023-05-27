<?php include('header.php');?>
<?php

$sql="SELECT *
, (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_payment.market_id) AS numberbox
, (SELECT admin_fullname FROM tb_admin WHERE tb_admin.admin_id = tb_payment.admin_id) AS admin_fullname
, (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_payment.renter_id) AS renter_fullname
FROM tb_payment
";

    if (isset($_REQUEST['renter_id'])) 
    {   
        $renter_id = intval($_REQUEST['renter_id']);
        $Renter = DynDb_SelectTableRow("SELECT * FROM tb_renter WHERE renter_id = {$renter_id}");
        
        //var_dump($Renter)
        
        $renter_fullname = $Renter['renter_fullname'];
        
        $sql .= " WHERE renter_id = {$renter_id} ";
        
    }
    else
    {
        $renter_id = null;
        $renter_fullname = '';
    }
?>
<style>
    #pp{
        padding-left: 1%;

    }


</style>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">แสดงข้อมูลชำระเงิน <?php echo $renter_fullname ?></strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสชำระเงิน</th>
                                            <th>ประเภท</th>                                            
                                            <th>รหัสจอง/เช่า</th>
                                            <th>ชื่อแผง</th>
                                            <th>ผู้ชำระ</th>
                                            <th>วันเวลาชำระเงิน</th>
                                            <th>จำนวนเงิน</th>
                                            <th>ชื่อแอดมิน</th>
                                            <th>การตรวจสอบ</th>
                                            <th>หลักฐานการโอน</th>
                                        </tr>
                                    </thead>
                        <?php
                        $a='1';
                        

                         $Tb = DynDb_SelectTable($sql);
                         foreach($Tb as $row)
                         {
                            $type = ($row['bk_id'] > 0) ? 'pledge' : 'rental';
                            $type_name = ($type == 'pledge') ? 'ค่ามัดจำ' : 'ค่าเช่า';
                             
                            $id = ($type == 'pledge') ? $row['bk_id'] : $row['rent_id'];
                        ?>
                            <tr>
                               <td >
                                   <?=$a++;?>
                                </td>
                                <td>
                                    <?=$row['pay_id'];?>
                                </td>
                                <td>
                                    <?=$type_name;?>
                                </td>
                                <td>
                                    <?=$id;?>
                                </td>
                                <td>
                                    <?=$row['numberbox'];?>
                                </td>
                                <td>
                                    <?=$row['renter_fullname'];?>
                                </td>
                                <td>
                                    <?=FormatDate($row['day_transfer']);?>
                                </td>
                                <td>
                                    <?=FormatMoney($row['pay_money']);?>
                                </td>
                                <td>
                                    <?=$row['admin_id'] > 0 ? $row['admin_fullname'] : '';?>
                                </td>
                                <td>
                                    <?php if ($row['admin_id']) : ?>
                                        <span>
                                        ตรวจสอบแล้ว
                                        </span>
                                    <?php else: ?>
                                    <a href="update_payment.php?mode=update&func=submit&id=<?=$row['pay_id'];?>"
                                        class="btn btn-info btn-xs" onclick="return confirm('คุณต้องการอนุมัติหรือไม่?')"><i class="fa fa-pencil"></i> อนุมัติ </a>                                    
                                    <?php endif ?>

                                </td>
                                <td>
                                    <a href="<?=$row['pay_silp'];?>" target="_blank">
                                    <img src="<?=$row['pay_silp'];?>" height="128" />
                                    </a>
                                </td>



                            </tr>
                            <?php
                             }
                             ?>
                                </table>
                            </div>
                            
                    <!--<p class="text-center">
                        <a href="show_payment.php?renter_id=<?=$renter_id;?>&action=cancel"
                           class="btn btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการยกเลิกหรือไม่?')">ยกเลิกการเช่า</a>
                    </p>-->

                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
</div>
<?php include('footer.php');?>