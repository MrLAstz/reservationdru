<?php include('header.php');?>
<style>
  .cls-avail {
    background: #60ff94;
  }
  .cls-reserved {
    background: #ff3737;
  }
  .cls-booking {
    background: #ffe713;
  }
</style>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">แสดงข้อมูลล็อต</strong>
                            </div>
                            <div class="card-body nav nav-pills nav-justified">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>สถานะ</th>
                                            <th>ประเภท</th>
                                            <th>หมายเลขล็อค</th>
                                            <th style="text-align: center;">รายละเอียด</th>
                                            <th style="text-align: center;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                $a='1';
                             $sql="SELECT
                             tb_market.market_id,
                             tb_type.name_type,
                             tb_market.status_id,
                             tb_market.numberbox,
                                 
                             
                             tb_status.status_name
                             FROM
                             tb_market
                    
                             INNER JOIN tb_status ON tb_market.status_id = tb_status.status_id
                             INNER JOIN tb_type   ON tb_market.id_type   = tb_type.id_type
                             ";
                             
                             $Tb = DynDb_SelectTable($sql);
                             foreach($Tb as $row)
                             {
                                 $status_id = intval($row['status_id']);
                                $cls = 'cls-avail';
                                if ($status_id == 2 || $status_id == 11)
                                    $cls = 'cls-reserved';
                                if ($status_id == 3)
                                    $cls = 'cls-booking';

                                 ?>
                                    <tr>
                                       <td>
                                           <?=$a++;?>
                                        </td>
                                        <td  style="text-align: center"  >
                                            <a class="btn <?php echo $cls ?>"> <?=$row['status_name'];?> </a>
                                        </td>
                                        <td>
                                            <?=$row['name_type'];?> 
                                        </td>
                                        <td>
                                            <?=$row['numberbox'];?>
                                        </td>

                                       
                                       
                                        
                                        <td style="text-align: center" >
                                       
                                            <a href="update_market.php?id=<?=$row['market_id'];?>"
                                                class="btn btn-info btn-xs nav-link" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><i class="fa fa-pencil"></i> รายละเอียด </a>
                                        </td>
                                        <td style="text-align: center" >
                                            <a href="delete_market.php?id=<?=$row['market_id'];?>"
                                                class="btn btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการลบหรือไม่?')"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>

                                        <!-- <td> -->
                                       
                                            <!-- <a href="update_admin.php?id=<?=$row['admin_id'];?>"
                                                class="btn btn-info btn-xs" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                        <td>
                                            <a href="delete_admin.php?id=<?=$row['admin_id'];?>"
                                                class="btn btn-danger btn-xs" onclick="return confirm('คุณต้องการลบหรือไม่?')"><i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td> -->
                                        
                                        
                                      
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