<?php
                        if (isset($_POST['submit'])) {
                            $emname=$_POST['username'];
                            $emppassword=sha1(MD5($_POST['password']));
                                            
                            $sql=" select * from tb_employee";
                            $sql.=" where";
                            $sql.=" employee_username='$emname'";
                            $sql.=" and";
                            $sql.=" employee_password='$emppassword'";
                            // $sql3.=" and status_id not in ('2')";
                            $num3=$cls_conn->select_numrows($sql);
                            $result_employee = $cls_conn->select_base($sql);
                            if ($num3>=1) {
                                while ($row_employee = mysqli_fetch_array($result_employee)) {
                                    $employee_id = $row_employee['employee_id'];
                                    $employee_name = $row_employee['employee_fullname'];
                                    $employee_surname = $row_employee['employee_tel'];
                                    $status_id = $row_employee['status_id'];
                                    $position_id = $row_employee['position_id'];
                                    
                                    $empname = $employee_name . ' ' . $employee_surname;
                                }
                                if ($status_id == 2) {
                                    echo $cls_conn->show_message('สถานะท่านถูกไล่ออก');
                                } else {
                                    $_SESSION['employee_id'] = $employee_id;
                                    $_SESSION['employee_fullname'] = $employee_name;
                                    $_SESSION['emp_name'] = $empname;
                                                        
                                    if ($position_id == 3) {
                                        echo $cls_conn->show_message('แอดมินเข้าสู้ระบบ');
                                        echo $cls_conn->goto_page(0, '../frontend/home.php');
                                    }
                                }
                            } else {
                                $owname=$_POST['username'];
                                // $owpassword=sha1(MD5($_POST['password']));
                                $owpassword=sha1(MD5($_POST['password']));
                            
                                $sql2=" select * from tb_owner";
                                $sql2.=" where";
                                $sql2.=" owner_username='$owname'";
                                $sql2.=" and";
                                $sql2.=" owner_password='$owpassword'";
                                $num2=$cls_conn->select_numrows($sql2);
                                if ($num2>=1) {
                                    $result_owner = $cls_conn->select_base($sql2);
                                    while ($row_owner = mysqli_fetch_array($result_owner)) {
                                        $owner_name = $row_owner['owner_fullname'];
                                        $owner_surname = $row_owner['owner_tel'];
                    
                                        $oowname = $owner_name . ' ' . $owner_surname;
                                    }
                                    $_SESSION['owner_fullname'] = $owner_name;
                                    $_SESSION['oowner_name'] = $oowname;
                                        
                                    echo $cls_conn->show_message('ยินดีตอนรับเจ้าของร้าน');
                                    echo $cls_conn->goto_page(0, '../frontend/home.php');
                                } else {
                                    echo $cls_conn->show_message('รหัสของท่านไม่ถูกต้อง');
                                }
                            }
                        }?>