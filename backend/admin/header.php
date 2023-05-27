<?php require_once('../../connect.php');
    $cls_conn=new class_conn;
?>
<!doctype html>
<html class="no-js" lang="en-GB">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservations</title>
    <meta name="description" content="Reservations">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="images/x-icon" href="market.png" /> 
    <!-- <link rel="shortcut icon" href="../template/favicon.ico"> -->

    <link rel="stylesheet" href="../template/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../template/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../template/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../template/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../template/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../template/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
        <style>
        h1{font-family: 'Prompt', sans-serif;}
        h3,h5{font-family: 'Prompt', sans-serif;}
        
        div,ul,li,p,a{font-family: 'Prompt', sans-serif;}

            .tp{
                margin-top: auto;
                margin-top: 5px;
            }
      
        </style>
</head>

<body>

<?php if (!defined('HEADER') && !defined('INNER')) : ?>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="../template/images/logo101.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="../template/images/logo2.0.png" alt="Logo"></a>
                <a class="navbar-brand" href="./"  style="font-size: 18px;"><?php echo $_SESSION['admin_fullname'];?></a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i> ข้อมูลผู้ดูแลระบบ</a>
                        <ul class="sub-menu children dropdown-menu" >
                            <li><i class="fa fa-file-text-o"></i><a href="show_admin.php">แสดงข้อมูลผู้ดูแลระบบ</a></li>
                            <li><i class="fa fa-address-card"></i><a href="insert_admin.php"> เพิ่มข้อมูลผู้ดูแลระบบ</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ข้อมูลผู้เช่า</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="show_renter.php">แสดงข้อมูลผู้เช่า</a></li>
                            <li><i class="fa fa-table"></i><a href="insert_renter.php">เพิ่มข้อมูลผู้เช่า</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>ข้อมูลพื้นที่ตลาด</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="market.php">ดูพื้นที่เช่า/จอง</a></li>
                            <li><i class="fa fa-table"></i><a href="insert_booking.php">เพิ่มข้อมูลการจอง</a></li>
                            <!-- <li><i class="menu-icon fa fa-th"></i><a href="manage.php">จัดการพื้นที่ตลาด</a></li> -->
                            <li><i class="menu-icon fa fa-th"></i><a href="show_location.php">แสดงข้อมูลล็อต</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="show_type.php">แสดงข้อมูลประเภทร้าน</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>ข้อมูลการเช่า/จอง</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa ti-themify-logo"></i><a href="show_booking.php">แสดงข้อมูลการจอง</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="show_rent.php">แสดงข้อมูลการเช่า</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>ข้อมูลการชำระเงิน</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!--<li><i class="menu-icon fa fa-street-view"></i><a href="ส่ง">------</a></li>-->
                            <li><i class="menu-icon fa fa-map-o"></i><a href="show_payment.php">แสดงข้อมูลการแจ้งชำระเงิน</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>รายงาน</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="show_reports.php">รายงานการชำระเงิน</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="show_reporta.php">รายงานการจองของผู้เช่า</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="show_reportf.php">รายงานการเช่าร้านค้าในตลาด</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="show_reportp.php">รายงานร้านค้าที่ว่างในตลาด</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="show_reportg.php">รายงานยอดรวมของผู้เช่า</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="reportest.php">รายงานสรุปยอดการชําระเงินของร้านค้าแตละประเภท</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="reportest1.php">รายงาน</a></li>
                        
                        
                        </ul>
                   
                    </li>

                    <li >
                        <a href="../../logout.php" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Log out</a>
                    </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                   
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" id="tp" src="../../image/user.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

<?php define('HEADER', true) ?>
<?php endif ?>

