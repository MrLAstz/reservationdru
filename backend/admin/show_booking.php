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
                                <strong class="card-title">แสดงข้อมูลการจอง</strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อแผง</th>
                                            <th>ผู้จอง</th>
                                            <th>วันที่เริ่ม</th>
                                            <th style="text-align: center;" >สถานะ</th>
                                            <th style="text-align: center;" >หมายเหตุ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                $a='1';
                             $sql="SELECT 
                                bk_id,                             
                                bk_datetime,
                                bk_end
                             , (SELECT numberbox FROM tb_market WHERE tb_market.market_id = tb_booking.market_id) AS numberbox
                             , (SELECT renter_fullname FROM tb_renter WHERE tb_renter.renter_id = tb_booking.renter_id) AS renter_fullname
                             
                              FROM  tb_booking
                              WHERE rent_id IS NULL
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
                                            <?=$row['numberbox'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_fullname'];?>
                                        </td>
                                        <td>
                                            <?=FormatDate( $row['bk_datetime'] );?>
                                        </td>

                                        <td id="pp" style="text-align: center"> 
                                        <a href="insert_rent.php?id=<?=$row['bk_id'];?>"
                                                class="btn btn-info btn-xs nav-link" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><i class="fa fa-pencil"></i> อนุมัติ </a>
                                        </td>
                                       
                                        
                                        <td id="pp" style="text-align: center">
                                       
                                            <a href="delete_renter.php?id=<?=$row['bk_id'];?>"
                                                class="btn btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการลบหรือไม่?')"><i class="ti-info-alt"></i> ยกเลิก
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