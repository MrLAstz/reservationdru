<?php include('header.php');?>

<style>
        
    
        #pp{
           padding-left: 3%;
           
        }
    </style>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">แสดงข้อมูลผู้ดูแลระบบ</strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>เบอร์โทร</th>
                                            <th>Email</th>
                                            <th>สถานะ</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                $a='1';
                             $sql="SELECT
                             tb_admin.admin_id,
                             tb_admin.admin_fullname,
                             tb_admin.admin_email,
                             tb_admin.admin_tel,

                             tb_status.status_name
                             FROM
                             tb_admin
                    
                             INNER JOIN tb_status ON tb_admin.status_id = tb_status.status_id";
                             //$result=$cls_conn->select_base($sql);
                             //while($row=mysqli_fetch_array($result))
                             $results = DynDb_SelectTable($sql);
                             foreach($results as $row)
                             {
                                 ?>
                                    <tr>
                                       <td>
                                           <?=$a++;?>
                                        </td>
                                        <td>
                                            <?=$row['admin_fullname'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_tel'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_email'];?>
                                        </td>
                                        <td>
                                            <?=$row['status_name'];?>
                                        </td>
                                       
                                        
                                        <td id="pp">
                                       
                                            <a href="update_admin.php?id=<?=$row['admin_id'];?>"
                                                class="btn btn-info btn-xs nav-link" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                        <td  id="pp">
                                            <a href="delete_admin.php?id=<?=$row['admin_id'];?>"
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
        </div><!-- .content -->

<?php include('footer.php');?>