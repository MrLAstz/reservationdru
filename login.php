<?php require_once('configs.php');

    if(isset($_POST['submit']))
    {
        
    }

?>
<?php include('connect.php');
$cls_conn=new class_conn;
?>
<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
<meta name="apple-mobile-web-app-title" content="CodePen">
  <title>LOGIN</title>
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
  
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300);
body {
  background: linear-gradient(135deg, #4D4E63, #333342);
  height: 100vh;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
}

.login {
  width: 420px;
  background: #ffffff;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  overflow: hidden;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.login:before {
  content: "";
  position: absolute;
  background: transparent;
  bottom: 45px;
  right: 40px;
  width: 55px;
  height: 55px;
  z-index: 5;
  transition: all 0.6s ease-in-out, background 0s ease;
}
.login .form {
  display: block;
  position: relative;
}
.login .form h2 {
  background: #f5f5fa;
  display: block;
  box-sizing: border-box;
  width: 100%;
  margin: 0 0 30px 0;
  padding: 40px;
  font-weight: 200;
  color: #9596A2;
  font-size: 19px;
}
.login .form .form-field {
  display: flex;
  align-items: center;
  height: 55px;
  margin: 0 40px 30px 40px;
  border-bottom: 1px solid #9596A2;
}
.login .form .form-field label {
  width: 10px;
  padding: 0 15px 0 0;
  color: #9596A2;
}
.login .form .form-field input {
  width: 100%;
  background: transparent;
  color: #9596A2;
  padding: 15px;
  border: 0;
  margin: 0;
}
.login .form .form-field input + svg {
  width: 35px;
  width: 35px;
  fill: none;
  stroke: #00FCD1;
  stroke-width: 7;
  stroke-linecap: round;
  stroke-dasharray: 1000;
  stroke-dashoffset: -100;
  transition: all 0.3s ease-in-out;
}
.login .form .form-field input:valid + svg {
  stroke-dashoffset: 0;
}
.login .form .form-field input:focus {
  outline: none;
}
.login .form .form-field *::placeholder {
  color: #9596A2;
}
.login .form .button {
  width: 100%;
  position: relative;
  cursor: pointer;
  box-sizing: border-box;
  padding: 0 40px 45px 40px;
  margin: 0;
  border: 0;
  background: transparent;
  outline: none;
}
.login .form .button .arrow-wrapper {
  transition: all 0.45s ease-in-out;
  position: relative;
  margin: 0;
  width: 100%;
  height: 55px;
  right: 0;
  float: right;
  background: linear-gradient(90deg, #04DFBD, #00FCD1);
  box-shadow: 0 3px 20px rgba(0, 252, 209, 0.4);
  border-radius: 12px;
}
.login .form .button .arrow-wrapper .arrow {
  position: absolute;
  top: 50%;
  margin: auto;
  transition: all 0.45s ease-in-out;
  right: 35px;
  width: 15px;
  height: 2px;
  background: none;
  transform: translateY(-50%);
}
.login .form .button .arrow-wrapper .arrow:before {
  position: absolute;
  content: "";
  top: -4px;
  right: 0;
  width: 8px;
  height: 8px;
  border-top: 2px solid #fff;
  border-right: 2px solid #fff;
  transform: rotate(45deg);
}
.login .form .button .button-text {
  transition: all 0.45s ease-in-out;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  padding: 0;
  margin: 0;
  color: #fff;
  line-height: 55px;
  text-align: center;
  text-transform: uppercase;
}
.login .finished {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 7;
}
.login .finished svg {
  width: 100px;
  width: 100px;
  fill: none;
  stroke: #fff;
  stroke-width: 7;
  stroke-linecap: round;
  stroke-dasharray: 1000;
  stroke-dashoffset: -100;
  transition: all 0.3s ease-in-out 0.5s;
}
.login.loading .form .button .arrow-wrapper {
  width: 55px;
  animation: sk-rotateplane 1.2s infinite ease-in-out 0.5s;
}
.login.loading .form .button .arrow-wrapper .arrow {
  background: #fff;
  transform: translate(15px, 0);
  opacity: 0;
  transition: opacity 0.3s ease-in-out 0.5s;
}
.login.loading .form .button .button-text {
  color: #9596A2;
}
.login.active:before {
  bottom: 0;
  right: 0;
  background: linear-gradient(90deg, #04DFBD, #00FCD1);
  border-radius: 12px;
  height: 100%;
  width: 100%;
}
.login.active .form .button .arrow-wrapper {
  animation-iteration-count: 1;
}
.login.active .finished svg {
  stroke-dashoffset: 0;
}

</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >
    <form method="POST">
      <div class="login">
      <div class="form">
      <a href="market.php">
      <h2>ยินดีต้อนระบบ</h2> </a>
        <div class="form-field">
          <label for="username"><i class="fa fa-user"></i></label>
             <input id="username" type="text" name="username" placeholder="User"  required>
          <svg>
            <use href="#svg-check" />
          </svg>
        </div>
        <div class="form-field">
          <label for="password"><i class="fa fa-lock"></i></label>
          <input id="password" type="password" name="password" placeholder="Password"  required>
          <svg>
            <use href="#svg-check" />
          </svg>
        </div>
        <button type="submit" name="submit" class="button">
          <div class="arrow-wrapper">
            <span class="arrow"></span>
          </div>
          <p class="button-text">เข้าสู่ระบบ</p>
        </button>
          <div class="form-field">
          <p class="text-center center">
              <a href="market.php" class="btn btn-warning">ย้อนกลับ</a>
          </p>
          </div>
      </div>
     
    </div>
    </form>
    <?php 
                if(isset($_POST['submit']))
                {
                    $user=$_POST['username'];
                    $password=$_POST['password'];
                    
                    $sql=" select * from tb_admin";
                    $sql.=" where";
                    $sql.=" admin_user='$user'";
                    $sql.=" and";
                    $sql.=" admin_password='$password'";
                    //$num3=$cls_conn->select_numrows($sql);
                            //$result_admin = $cls_conn->select_base($sql);
                            //if ($num3>=1) {
                    
                    $row_admin = DynDb_SelectTableRow($sql);
                    if ($row_admin)
                    {
                        
                        //while ($row_admin = mysqli_fetch_array($result_admin)) {
                                    $admin_id = $row_admin['admin_id'];
                                    $admin_fullname = $row_admin['admin_fullname'];
                                    $admin_tel = $row_admin['admin_tel'];
                                    $status_id = $row_admin['status_id'];
                                    $position_id = $row_admin['position_id'];
                                    
                                    $adminname = $admin_fullname ;
                                //}
                                if ($status_id == 11) {
                                    echo $cls_conn->show_message('สถานะท่านถูกไล่ออก');
                                } else {
                                    $_SESSION['admin_id'] = $admin_id;
                                    $_SESSION['admin_fullname'] = $admin_fullname;
                                    $_SESSION['admin_name'] = $adminname;
                                    $_SESSION['user_type'] = 'admin';
                                                        
                                    if ($position_id == 1) {
                        echo $cls_conn->show_message('Login Success');
                        echo $cls_conn->goto_page(0,'backend/admin/index.php');
                        // echo $sql;
                          
                                }
                              }
                    }
                    else
                    {
                            $sql2=" select * from tb_renter";
                            $sql2.=" where";
                            $sql2.=" renter_user='$user'";
                            $sql2.=" and";
                            $sql2.=" renter_password='$password'";
                            //$num2=$cls_conn->select_numrows($sql2);
                            //if($num2>=1)  
                        
                            $row_owner = DynDb_SelectTableRow($sql2);
                            if ($row_owner)
                            {
                              //$result_owner = $cls_conn->select_base($sql2);
                                    //while ($row_owner = mysqli_fetch_array($result_owner)) {
                                        $owner_name = $row_owner['renter_fullname'];
                                        $owner_surname = $row_owner['renter_tel'];
                    
                                        $oowname = $owner_name . ' ' . $owner_surname;
                                    //}
                                   
                                    $_SESSION['renter_id'] = $row_owner['renter_id'];
                                    $_SESSION['renter_fullname'] = $owner_name;
                                    $_SESSION['renter_tel'] = $oowname;
                                    $_SESSION['user_type'] = 'user';
                                echo $cls_conn->show_message('Login Success');
                                echo $cls_conn->goto_page(0,'backend/renter/index.php');
                            }
                            else
                            {
                                echo $cls_conn->show_message('Login Fail');
                                return;
                            }
                        
                        
                    }
                }
                
                
                ?>

<!-- //--- ## SVG SYMBOLS ############# -->
<svg style="display:none;">
  <symbol id="svg-check" viewBox="0 0 130.2 130.2">
    <polyline points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
  </symbol>
</svg>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
      <!-- <script id="rendered-js" >
$('.button').on('click', function () {
  $('.login').addClass('loading').delay(2200).queue(function () {
    $(this).addClass('active');
  });
});
//# sourceURL=pen.js
    </script> -->

  

</body>

</html>
 
