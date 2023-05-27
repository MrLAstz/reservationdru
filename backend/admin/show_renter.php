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
                                <strong class="card-title">แสดงรายการข้อมูลผู้เช่า</strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>วัน/เดือน/ปีเกิด</th>
                                            <th>ที่อยู่</th>
                                            <th>เบอร์โทร</th>
                                            <th>เลขบัตรประชาชน</th>
                                            <th>Email</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                $a='1';
                             $sql="SELECT * FROM  tb_renter ";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                       <td>
                                           <?=$a++;?>
                                        </td>
                                        <td>
                                            <?=$row['renter_fullname'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_birth'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_address'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_tel'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_id_card'];?>
                                        </td>
                                        <td>
                                            <?=$row['renter_email'];?>
                                        </td>
                                       
                                        
                                        <td id="pp">
                                       
                                            <a href="update_renter.php?id=<?=$row['renter_id'];?>"
                                                class="btn btn-info btn-xs nav-link" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                        <td id="pp">
                                            <a href="delete_renter.php?id=<?=$row['renter_id'];?>"
                                                class="btn btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการลบหรือไม่?')"><i class="fa fa-trash-o"></i> Delete
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