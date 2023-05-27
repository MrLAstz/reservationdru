<?php include('header.php');?>
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
                                <strong class="card-title">แสดงข้อมูลชำระเงิน</strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสชำระเงิน</th>
                                            <th>ประเภท</th>
                                            <!-- <th>รหัสจอง/เช่า</th> -->
                                            <th>ชื่อแผง</th>
                                            <th>วันเวลาชำระเงิน</th>
                                            <th>จำนวนเงิน</th>
                                            <th>ชื่อแอดมิน</th>
                                            <th>การตรวจสอบ</th>
                                            <th>หลักฐานการโอน</th>
                                        </tr>
                                    </thead>
                        <?php
                        $a='1';
                        $sql="SELECT *
                        , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_payment.market_id) AS numberbox
                        , (SELECT admin_fullname FROM tb_admin WHERE tb_admin.admin_id = tb_payment.admin_id) AS admin_fullname
                        FROM tb_payment
                        WHERE renter_id = {$User_Id}
                        ";

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
                                <!-- <td>
                                    <?=$id;?>
                                </td> -->
                                <td>
                                    <?=$row['numberbox'];?>
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
                                    <?=$row['admin_id'] ? 'ตรวจสอบแล้ว' : '-';?>
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
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
</div>
<?php include('footer.php');?>