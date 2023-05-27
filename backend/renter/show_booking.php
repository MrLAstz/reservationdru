<?php include('header.php');?>
<?php
    if (!$User)
    {
        $cls_conn=new class_conn;
        echo $cls_conn->show_message('โปรดทำการเข้าระบบก่อน');
        echo $cls_conn->goto_page(0,'../../login.php');
        exit;
    }
?>

<header>
<style>
    #pp{
        padding-left: 1%;

    }
    

</style>
</header>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title" >แสดงข้อมูลการจอง</strong>
                            </div>
                            <div class="card-body">
                            <center>   
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered nav-pills nav-justified" style="width: 80%;">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <!-- <th>รหัสการจอง</th> -->
                                            <th>ชื่อแผง</th>
                                            <th>ชื่อผู้จอง</th>
                                            <th>วันที่เริ่มจอง</th>
                                            <!-- <th>วันที่สิ้นสุด</th> -->
                                            <th style="text-align: center;" >สถานะ</th>
                                            <!-- <th style="text-align: center;" >หมายเหตุ</th> -->
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
                          WHERE rent_id IS NULL AND renter_id = {$User_Id}
                            ";

                             $Tb = DynDb_SelectTable($sql);
                             foreach($Tb as $row)
                             {
                                 ?>
                                    <tr>
                                       <td>
                                            <?=$a++;?>
                                        </td>
                                       <!-- <td>
                                            <?=$row['bk_id'];?>
                                        </td> -->
                                       <td>
                                            <?=$row['numberbox'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_fullname'];?>
                                        </td>
                                        <td>
                                            <?=FormatDate( $row['bk_datetime'] );?>
                                        </td>
                                        <!-- <td>
                                            <?=FormatDate( $row['bk_end'] );?>
                                        </td> -->

                                        <td id="pp" style="text-align: center"> 
                                            <a href="insert_pay.php?id=<?=$row['bk_id'];?>"
                                                class="btn btn-warning btn-xs nav-link" ><i class="ti-info-alt"></i> แจ้งชำระเงิน
                                            </a>
                                        </td>
                                        <!-- <td id="pp" style="text-align: center">
                                       
                                            <a href="delete_booking.php?id=<?=$row['bk_id'];?>"
                                                class="btn  btn-danger btn-xs nav-link" ><i class="fa fa-trash-o"></i> ยกเลิก
                                            </a>
                                        </td> -->

                                    </tr>
                                    <?php
                             }
                             ?>
                                </table>
                            </center>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
</div>
<?php include('footer.php');?>