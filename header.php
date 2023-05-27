<?php session_start();?>
<?php include('connect.php');
$cls_conn=new class_conn;
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservations</title>
    <meta name="description" content="Reservations">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="images/x-icon" href="market.png" /> 
    <!-- <link rel="shortcut icon" href=backend/template/favicon.ico"> -->

    <link rel="stylesheet" href="backend/template/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="backend/template/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="backend/template/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="backend/template/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="backend/template/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="backend/template/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="backend/template/assets/css/style.css">

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


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="backend/template/images/logo101.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="backend/template/images/logo2.0.png" alt="Logo"></a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li class="">
                        <a href="market.php" class="dropdown-toggle" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>ดูพื้นที่เช่า/จอง</a>

                    </li>
                    <li class="">
                        <a href="rental.php" class="dropdown-toggle" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>ข้อมูลการจอง/เช่า</a>

                    </li>

                    <li class="">
                        <a href="payment.php" class="dropdown-toggle" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>การชำระเงิน/เช่า</a>

                    </li>
                    <li class="">
                        <a href="insert_renter.php" class="dropdown-toggle" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>สมัครสมาชิก</a>

                    </li>
             
                    <li >
                        <a href="login.php" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Login</a>
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
                            <img class="user-avatar rounded-circle" id="tp" src="image/user.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="login.php"><i class="fa fa-power-off"></i> Login</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->




