<?php include('header.php');?>
<style>
   
       
   .topp{
       margin-top: 40%;
   }
   .back{
       background-color: #e2e2e2;
   }
   p,li{font-family: 'Prompt', sans-serif;}
   hr{
       border-top: 1px solid #c0c0c0;
       width: 90%;
   }
   #rl{
       padding-left: 5%;
       padding-right: 5%;
   }
   .btn-info{
      background-color: #4a4aff;
  }
span,button,th,td,h5,h3{font-family: 'Prompt', sans-serif;}
th{
   text-align: center;
   color: #000;
   background-color: #dadada;
}
td{
   color: #000;
}
/* .sol{
   border: 2px solid black;
   border-collapse: collapse;
    } */

.col1{
   background-color: #fffaf7;
}
.col2{
   background-color: #fff1ec;
}
.col3{
   background-color: #ffe7dd;
}
.col4{
   background-color: #ff9999;
}
@media print {
.hpp{
   display:none;
 
}
#dr{
 display: none;

/* size: A4 landscape; */
}
 }
</style>

</head>
<?php
$a='1';
$sql="SELECT DISTINCT
tb_market.numberbox,
tb_type.name_type,
tb_status.status_name
FROM
tb_market
INNER JOIN tb_type ON tb_market.id_type = tb_type.id_type ,
tb_status
WHERE
tb_market.status_id = 1
HAVING
tb_status.status_name = 'ว่าง'
";

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
                        <strong class="card-title">รายงานร้านค้าที่ว่างในตลาด</strong>
                       </div>
                        <div class="card-body nav nav-pills nav-justified">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>หมายเลขแผง</th>
                                    <th>ประเภทร้านค้า</th>                                            
                                    <th>สถานะร้านค้า</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
              
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
                            <?=$row['name_type'];?>
                        </td>
                        <td>
                            <?=$row['status_name'];?>
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