<?php 
    include_once('db/connect.php');

?>
<?php 
if(isset($_POST['dangnhap_home'])) {
    $taikhoan = $_POST['email_login'];
    $matkhau = $_POST['password_login'];
    if($taikhoan=='' || $matkhau ==''){
        echo '<script>alert("Làm ơn không để trống")</script>';
    }else{
        $sql_select_admin = mysqli_query($mysqli,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password_kh='$matkhau' LIMIT 1");
        $count = mysqli_num_rows($sql_select_admin);
        $row_dangnhap = mysqli_fetch_array($sql_select_admin);
        if($count>0){
            $_SESSION['dangnhap_home'] = $row_dangnhap['khachhang_ten'];
            $_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
            
            // header('Location: cart.php');
        }else{
            echo '<script>alert("Tài khoản mật khẩu sai")</script>';
        }
    }
}elseif(isset($_POST['dangky'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $note = $_POST['note'];
    $address = $_POST['address'];
    $giaohang = $_POST['giaohang'];

    $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name_khachhang,phone,email,address_khachhang,note,khachhang_giaohang,password_kh) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
    $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
    $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
    $_SESSION['dangnhap_home'] = $name;
    $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
    
    // header('Location:cart.php');
}elseif(isset($_GET['dangxuat'])){
$id = $_GET['dangxuat'];
if($id==1){
    unset($_SESSION['dangnhap_home']);
}
}
?>
<header>
    <div class="header">
            <div class="logo">
                <a href="demo.php">
                    <img src="images/logo-Bulldog.png" alt="logo" style="width: 75px;">
                </a>

            </div>

            
            <nav class="navbar navbar-expand-lg bg-light " style="background-color: #333 !important;">
                  
                <div class="menu">
                <?php
                    $sql_category_danhmuc = mysqli_query($mysqli,'SELECT * FROM tbl_category ORDER BY category_id ASC');
                    while($row_category_danhmuc= mysqli_fetch_array($sql_category_danhmuc)){
     
                ?> 
                    <a class="navbar-brand color_header" style="color: white !important;font-size:23px;"
                        href="?quanli=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>"><?php echo $row_category_danhmuc['category_name'] ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                      }

                    ?>
                    
                     

                    <!-- <a class="navbar-brand color_header " style="color: white !important;" href="#">Nike</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <!-- <a class="navbar-brand color_header" style="color: white !important;" href="#">Vans</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <!-- <a class="navbar-brand color_header" style="color: white !important;" href="#">New Balance</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <!-- <a class="navbar-brand color_header" style="color: white !important;" href="#">Reebok</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <!-- <a class="navbar-brand color_header" style="color: white !important;" href="#">Converse</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <a class="navbar-brand color_header" style="color: white !important;font-size:23px;" href="#">Khuyến Mãi</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                

                <div class="others">
                    <form class="d-flex" role="search" action="demo.php?quanli=timkiem" method="POST">
                        <input class="form-control me-2" name="seach_product" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="seach_button" type="submit">Search</button>
                        <!-- <i class="fa-solid fa-cart-shopping icon_shopping"></i> -->
                        <!-- nhúng icon shopping -->
                        <a href="?quanli=giohang">
                            <lord-icon src="https://cdn.lordicon.com/slkvcfos.json" trigger="loop"
                                colors="primary:#ffffff,secondary:#ffffff" style="width:100px;height:40px">

                            </lord-icon>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#dangnhap">
                              <img src="images/user.png" alt="icon1" style="width: 35px;">
                        </a>
                        
                    </form>
                </div>

        </div>
        </div>
        </nav>

 </header>
 <section class="vh-100 modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="container py-5 h-100 modal-dialog modal-dialog-centered" role="document"style="margin-left: 180px;">
  <div class="modal-content" style="width: 0%;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;width: 1000px;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../images/slide4.jpeg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%; " />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black" >

                <form action="#" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">BullDog</span>
                    
                  </div>
                      
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng Nhập Tài Khoản Khách Hàng</h5>

                  <div class="form-outline mb-4">
                  <input type="text" class="form-control form-control-lg" placeholder=" " name="email_login" required="">
                    <label class="form-label" for="form2Example17">Địa Chỉ Email</label>
                  </div>

                  <div class="form-outline mb-4">
                  <input type="password" class="form-control form-control-lg" placeholder=" " name="password_login" required="">
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <input type="submit" class="form-control btn btn-dark btn-lg btn-block" name="dangnhap_home" value="Đăng nhập">
                    <!-- <button class="btn btn-dark btn-lg btn-block" type="button">Đăng Nhập</button> -->
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? 
                    <a href="#!"style="color: #393f81;"data-toggle="modal" data-target="#dangky">Đăng Kí Ngay</a>
                  </p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<section class="vh-100 modal fade"id="dangky" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="container h-100 modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11" style="width:84%;">
        <div class="card text-black" style="border-radius: 25px;margin-left: -350px;width: 1000px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Kí</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" />
                      <label class="form-label" for="form3Example1c">Tên Của Bạn</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" />
                      <label class="form-label" for="form3Example3c">Email của Bạn</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Mật Khẩu</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Nhập Lại mật Khẩu</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      
                    Tôi đồng ý tất cả các tuyên bố trong <a href="#!">Điều khoản dịch vụ</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="button" class="btn btn-primary btn-lg">Đăng Kí Ngay</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>
</section>

<!-- a -->
<!-- Modal -->
<div class="modal fade" id="dangnhap1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ĐĂNG NHẬP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
        <form action="#" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="text" class="form-control" placeholder=" " name="email_login" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="password_login" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
                        </div>
                        
                        <p class="text-center dont-do mt-3">Chưa có tài khoản?
                            <a href="#" data-toggle="modal" data-target="#dangky">
                                Đăng ký</a>
                        </p>
                    </form>
      </div> -->
      
    </div>
  </div>
</div>