
<?php include('header.php') ;?>
<head>
<link rel="stylesheet" type="text/css"  media="print">
    <title>รายงานรายรับ</title>
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
<script>
          function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
      }
    </script>

<body>

   
        </aside>

            <div class="container-fluid">
                <div class="row" style="margin-left: 25%;" >
                    <div class="col-10">
                        <div >
                            <div class="card-body">
                               
                                <form action="" method="POST">
                                    <div class="form-body">
                                        <h3 style="padding-left:15% ; color:#000">รายงานข้อมูลการจองของผู้เช่า</h3><br><br>
                                        <div class="row input-daterange">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <span>วันที่</span>
                                                        <input type="date" class="form-control" name="datestart" placeholder="วันเริ่มต้น">
                                                    </div>
                                                </div>
                                                    <div>
                                                        <br><span class="btn btn-dark" onClick="myFunction()"> ถึง</span> 
                                                    </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <span>วันที่</span>
                                                        <input type="date" class="form-control" name="dateend" placeholder="วันสิ้นสุด">
                                                    </div>
                                                </div>
                                            
                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <br><button type="submit" class="btn btn-info">แสดงรายงาน</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
                <!-- ============================================================== -->

                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->

                <?php
       
                    function DateThai($strDate)
                    {
                        $strYear = date("Y",strtotime($strDate))+543;
                        $strMonth= date("n",strtotime($strDate));
                        $strDay= date("j",strtotime($strDate));
                        
                        
                        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                        $strMonthThai=$strMonthCut[$strMonth];
                        return "$strDay $strMonthThai $strYear";
                    }
                    ?>  
        <?php
        if (isset($_POST['datestart'])&&isset($_POST['dateend'])) {
            // $date=date_create_from_format("j/m/Y", $_POST['datestart']);
            // $datestart=date_format($_POST['datestart'], "Y-m-d");
            $datestart=$_POST['datestart'];
            $dateend=$_POST['dateend'];


            // $date=date_create_from_format("j/m/Y", $_POST['dateend']);
            // $dateend=date_format($date, "Y-m-d");
        ?>                
                <div class="row" >
                
                    <div class="col-12" id="rl">       
                        <div class="card" >
                        
                            <div class="card-body">
                            <!-- <button id="br" onclick="printDiv('printableArea')"class="btn btn-success"> พิมพ์ PDF <i class="fa fa-print"></i></button> -->
                        
                                <h5 class="card-title" style="text-align: center;"><?php echo $_POST['datestart']." ถึง ".$_POST['dateend']."<br>";?></h5>
                              
                                <div class="table-responsive"  id="printableArea">

                    <!-- loop วันที่ ถึง วันที่ -->
                        <?php
                           $sql="SELECT
                           DATE(tb_booking.bk_datetime) AS bill_datetime
                       FROM
                           tb_booking
                       WHERE
                           DATE(bk_datetime) BETWEEN '$datestart'
                       AND '$dateend'
                       GROUP BY
                           DATE(bk_datetime)";
                                $result1 = $cls_conn->select_base($sql);
                                $sum_bill_price_total=0;
                                while ($row1 = mysqli_fetch_array($result1)) { ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>วันที่</th>
                                            <th>ลำดับ</th>
                                            <th>รหัสการจอง</th>
                                            <th>ชื่อผู้จอง</th>
                                            <th>ชื่อแผง</th>
                                            <th>ประเภทร้านค้า</th>
                                         

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center;">
                                        <!-- loop เวลาเรียกใช้ตาราง -->
                                           <?php
                                           $bill_datetime=$row1['bill_datetime'];
                                           $sql2="SELECT
                                           tb_booking.bk_id,
                                           tb_renter.renter_fullname,
                                           tb_market.numberbox,
                                           DATE(tb_booking.bk_datetime) AS bill_datetime,
                                           tb_type.name_type
                                           FROM
                                           tb_booking
                                           INNER JOIN tb_renter ON tb_booking.renter_id = tb_renter.renter_id
                                           INNER JOIN tb_market ON tb_booking.market_id = tb_market.market_id
                                           INNER JOIN tb_type ON tb_market.id_type = tb_type.id_type
                                           WHERE
                                           DATE(bk_datetime) = '$bill_datetime'";
                                            $a=1;
                                            $bill_datetimeold="";
                                            $sum_people_qty=0;
                                            $sum_bill_price=0;
                                                        $result2 = $cls_conn->select_base($sql2);
                                                        while ($row2 = mysqli_fetch_array($result2)) {
                                                            $date=date_create($row2["bill_datetime"]);
                                                            $bill_datetime=date_format($date, "d/m/Y");
                                                            
                                                            if ($bill_datetimeold!=$bill_datetime) {
                                                                echo"<td style='text-align: center;'>";
                                                                echo DateThai($row2["bill_datetime"]);
                                                                echo"</td>";
                                                            } else {
                                                                echo "<td></td>";
                                                            } ?>

                                            <td style="text-align: center;"><?=$a?></td>
                                            <td style="text-align: center;"><?=$row2['bk_id']?></td>
                                            <td style="text-align: center;"><?=$row2['renter_fullname']?></td>
                                            <!-- <td style="text-align: center;"><?=$row2['numberbox']?></td> -->
                                            <td style="text-align: center;"><?=$row2['numberbox']?></td> 
                                            <td style="text-align: center;"><?=$row2['name_type']?></td> 
                                            <!-- <td style="text-align: center;"><?=number_format($row2['pay_money'], 2)?></td> -->

                                        </tr>
                                        <?php
                                        $sum_people_qty+=$row2['people_qty'];
                                        $sum_bill_price+=$row2['pay_money'];
                                        $bill_datetimeold=$bill_datetime;
                                        $a++;
                                                        }
                                        ?>
                                        <tr class="col1" style="text-align: center;">
                                            <td colspan="4">รวมจำนวนรายการ</td>
                                            <td><?=$a-1?></td>
                                            <td>รายการ</td>
                                        </tr>
                                        <!-- <tr class="col2" style="text-align: center;">
                                            <td colspan="5">รวมจำนวนผู้เข้าใช้บริการ</td>
                                            <td><?=$sum_people_qty?></td>
                                            <td>คน</td>
                                        </tr> -->
                                        <!-- <tr class="col3" style="text-align: center;">
                                            <td colspan="4">เงินรวม</td>
                                            <td><?=number_format($sum_bill_price, 2)?></td>
                                            <td>บาท</td>
                                        </tr> -->
                                        <?php
                                        $sum_bill_price_total+=$sum_bill_price;
                                        
                                        }
                                        ?>
                                    </tbody>
                                    <!-- <tr class="col4" style="text-align: center;">
                                            <td colspan="4">เงินรวมทั้งสิ้น</td>
                                            <td><?=number_format($sum_bill_price_total,2)?></td>
                                            <td>บาท</td>
                                    </tr> -->
                                </table>
                               
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<?php
}else{
    echo "<div style='text-align: center;'>กรุณากรอกวันที่ </div>";
}
include('footer.php');
?>