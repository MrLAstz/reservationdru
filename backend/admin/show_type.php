<?php include('header.php');?>
<header>
    
<style>
        #ip{
            margin-left: 40%;
        }
        
    </style>
</header>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header nav nav-pills nav-justified">
                                <strong class="card-title mt-2" style="padding-left: 20%;">แสดงข้อมูลประเภท  </strong>
                                
                                <button id="ip" type="button" class="btn btn-info btn-xl nav-link " data-toggle="modal" data-target="#modal_boxtype">เพิ่มประเภท</button>
                            </div>
                            <div  class="card-body" >
                                <center>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered nav-pills nav-justified" style="width: 60%;">
                                    <thead >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th >ชื่อประเภท</th>
                                            <th style="text-align: center;">Option</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            $a='1';
                                        $sql="SELECT * FROM tb_type";
                                        $result=$cls_conn->select_base($sql);
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?=$a++;?>
                                                </td>
                                                <td>
                                                        <?=$row['name_type'];?>
                                                </td>
                                                <td style="text-align: center;width: 40%;">
                                                
                                                        <a href="update_type.php?id=<?=$row['id_type'];?>"
                                                            class="btn btn-info btn-xs nav-link" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><i class="fa fa-pencil"></i> Edit </a>
                                                        <a href="delete_type.php?id=<?=$row['id_type'];?> "
                                                            class="btn btn-danger btn-xs nav-link" onclick="return confirm('คุณต้องการลบหรือไม่?')"><i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                </td>
                                            </tr>
                                                <?php } ?>

                                </table>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

                           <!-- Button trigger modal -->


<!-- Modal -->
            <div class="modal fade" id="modal_boxtype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <a > <img src="../template/images/logo2.0.png" alt="Logo"></a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php include('insert_type.php');?>
                </div>
            
                
                </div>
                </div>
            </div>
            </div>


<?php include('footer.php');?>