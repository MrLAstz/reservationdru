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
                                <strong class="card-title">แสดงข้อมูลการเช่า</strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสผู้เช่า</th>
                                            <th>หมายเลขล็อต</th>
                                            <th>ค่าเช่า</th>
                                            <th>ค่ามัดจำ</th>
                                            <th>วันเวลาที่เริ่มเช่า</th>
                                            <th>วันเวลาที่สิ้นสุด</th>
                                            <th style="text-align: center;" >สถานะการเช่า</th>
                                            <th style="text-align: center;" >หมายเหตุ</th>
                                        </tr>
                                    </thead>
                        <?php
                        $a='1';
                        $sql="
                    SELECT *
                    , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_rent.market_id) AS numberbox
                    , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_rent.renter_id) AS renter_fullname
                    , IF( (CURDATE() BETWEEN rent_dtime AND rent_end) AND (rent_cancel_date IS NULL) , 1, 0) AS active
                    FROM tb_rent 
                    WHERE renter_id = {$User_Id}
                    ORDER BY active DESC, rent_dtime DESC, rent_end DESC
                        ";

                             $Tb = DynDb_SelectTable($sql);
                             foreach($Tb as $row)
                             {
                                 ?>
                                    <tr>
                                       <td >
                                           <?=$a++;?>
                                        </td>
                                        <td>
                                            <?=$row['renter_id'];?>
                                        </td>
                                        <td>
                                            <?=$row['numberbox'];?>
                                        </td>
                                        <td>
                                            <?=FormatMoney($row['rent_rental']);?>
                                        </td>
                                        <td>
                                            <?=FormatMoney($row['rent_pledge']);?>
                                        </td>
                                        <td>
                                            <?=FormatDate($row['rent_dtime']);?>
                                        </td>
                                        <td>
                                            <?=FormatDate($row['rent_end']);?>
                                        </td>
                                        
                                    


                                        <td id="pp" style="text-align: center"> 
                                            <?=$row['active'] ? 'อยู่ในการเช่า' : 'สิ้นสุด' ?>
                                        </td>
                                       
                                        
                                        <td id="pp" style="text-align: center">
                                       
                                            <a href="insert_pay.php?type=rental&id=<?=$row['rent_id'];?>"
                                                class="btn btn-warning btn-xs nav-link"><i class="ti-info-alt"></i> แจ้งชำระเงิน
                                            </a>
                                            <!--<a 
                                                class="btn  btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการลบหรือไม่?')"><i class="fa fa-trash-o"></i> ยกเลิก
                                            </a>-->
                                            
                                            <?php if ($row['active']) : ?>
                                            <a href="cancel_rent.php?id=<?=$row['rent_id'];?>"
                                                class="btn  btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการยกเลิกหรือไม่?')"><i class="fa fa-trash-o"></i> ยกเลิก
                                            </a>
                                            <?php endif ?>                                            
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