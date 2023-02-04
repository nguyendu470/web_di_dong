<?php 
    session_start();
    include_once('../db/connect.php');

?>
<?php
   //session_destroy();
    if(isset($_POST['dangnhap'])){
        $taikhoan=$_POST['taikhoan'];
        $matkhau=md5($_POST['matkhau']);
        if($taikhoan==''||$matkhau==''){

            echo '<p>xin nhap du</p>';
        }
        else{
            $sql_select_admin=mysqli_query($mysqli,"SELECT *FROM tbl_admin WHERE email='$taikhoan' AND password_admin='$matkhau'  LIMIT 1 ");
            $count=mysqli_num_rows($sql_select_admin);
            $row_dangnhap=mysqli_fetch_array($sql_select_admin);
            if($count>0){
                $_SESSION['dangnhap']=$row_dangnhap['admin_name'];
                $_SESSION['admin_id']=$row_dangnhap['admin_id'];
                header('Location: xulydonhang.php');
            }
            else{
                echo '<p>tai khoan hoac mat khau sai</p>';
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    <link rel="stylesheet" href="../scss/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="../images/logo-Bulldog.png" alt="">
         
        </div>
        <div class="text-center mt-4 name">
            Bulldog-Admin
        </div>
        <form action="" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="taikhoan" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="matkhau" id="pwd" placeholder="Password">
            </div>
            <input type="submit" name="dangnhap" class="btn mt-3" value="Login">
            <!-- <button class="btn mt-3">Login</button> -->
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
    </div>
    
</body>
</html>