<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
    header('Location: admin.php');
 } 
?>
<?php
    if(isset($_GET['login'])){
        $dangxuat=$_GET['login'];
    }
    else{
        $dangxuat='';
    }
    if($dangxuat=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location: admin.php');
    } 
?>
<?php 
    include_once('../db/connect.php');
?>
<?php
 if(isset($_POST['themsanpham'])){
     $tensanpham=$_POST['tensanpham'];
     $hinhanh=$_FILES['hinhanh']['name'];
     $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
     $soluong=$_POST['soluong'];
     $gia=$_POST['giasanpham'];
     $giakhuyenmai=$_POST['giakhuyenmai'];
     $danhmuc=$_POST['danhmuc'];
     $chitiet=$_POST['chitiet'];
     $mota=$_POST['mota'];

     $path='../uploads/';
     $sql_insert_product=mysqli_query($mysqli,"INSERT INTO tbl_sanpham(category_id,sanpham_name,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_images,sanpham_chitiet,sanphan_mota)
      VALUES ('$danhmuc','$tensanpham','$gia','$giakhuyenmai','$soluong','$hinhanh','$chitiet','$mota')"); 
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
 }
 elseif(isset($_POST['capnhatsanpham'])){
    $id_update=$_POST['id_update'];
    $tensanpham=$_POST['tensanpham'];
    $hinhanh=$_FILES['hinhanh']['name'];
    $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
    $soluong=$_POST['soluong'];
    $gia=$_POST['giasanpham'];
    $giakhuyenmai=$_POST['giakhuyenmai'];
    $danhmuc=$_POST['danhmuc'];
    $chitiet=$_POST['chitiet'];
    $mota=$_POST['mota'];

    $path='../uploads/';
    if($hinhanh==''){
        $sql_update_images="UPDATE tbl_sanpham SET category_id ='$danhmuc',sanpham_name='$tensanpham',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_chitiet='$chitiet',sanphan_mota='$mota' WHERE sanpham_id='$id_update' ";
        header('Location: xulysanpham.php');
    }
    else{
        move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
        $sql_update_images="UPDATE tbl_sanpham SET category_id ='$danhmuc',sanpham_name='$tensanpham',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_images='$hinhanh',sanpham_chitiet='$chitiet',sanphan_mota='$mota' WHERE sanpham_id='$id_update' ";
        header('Location: xulysanpham.php');
    }
    mysqli_query($mysqli,$sql_update_images);
 }

?>
<?php
if(isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    $sql_xoa=mysqli_query($mysqli,"DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S???n Ph???m</title>
    <link rel="stylesheet" href="../scss/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="xulydonhang.php">????n H??ng <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulydanhmuc.php">Danh M???c</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulysanpham.php">S???n Ph???m</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulykhachhang.php">Kh??ch H??ng</a>
            </li>
            </ul>
        </div>
</nav><br><br> -->

<!-- header -->
<header>
   <div class="header" >
    <div class="logo" >
        <a href="xulydonhang.php">
            <img src="../images/logo-Bulldog.png" alt="logo" style="width: 75px;">
          </a>
    </div>
    <nav class="navbar navbar-expand-lg bg-light " style="background-color: #333 !important;">

    <div class="menu">
      <a class="navbar-brand color_header" style="color: white !important;margin-right: 65px;" href="xulydonhang.php">????n H??ng</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand color_header " style="color: white !important;margin-right: 65px;" href="xulydanhmuc.php">Danh M???c</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand color_header" style="color: white !important;margin-right: 65px;" href="xulysanpham.php">S???n Ph???m</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand color_header" style="color: white !important;margin-right: 65px;" href="xulykhachhang.php">Kh??ch H??ng</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      
    </div>

    <div class="others">
        <form class="d-flex" role="search">
          
          <!-- <i class="fa-solid fa-cart-shopping icon_shopping"></i> -->
          <!-- nh??ng icon shopping -->
          <!-- <p>Xin Chao: </p> -->
          <a class="navbar-brand color_header" style="color: white !important;margin-left:150px" href=""><?php echo $_SESSION['dangnhap'] ?></a>
          <a href="admin/admin.php">
                 <img src="../images/user.png" alt="icon1" style="width: 35px;">
         </a>
         <a class="navbar-brand color_header" style="color: white !important;margin-left: 10px;font-size: 14px;" href="?login=dangxuat">????ng Xu???t</a>
        </form>
    </div>
        
      </div>
    </div>
  </nav>
  
  </header>


    <div class="container">
    <h2 class="heading_title"style="font-size: 40px; text-align: center;
        color: #333333 !important;
        padding: 10px 15px;" >
         S???n Ph???m
      </h2>
        <div class="row" style="margin-top:25px;">

            <?php
            if(isset($_GET['quanli'])=='capnhat'){
                $id_capnhat=$_GET['capnhat_id'];
                $sql_capnhat=mysqli_query($mysqli,"SELECT *FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
                $row_capnhat=mysqli_fetch_array($sql_capnhat);
                $id_category_1=$row_capnhat['category_id'];
            ?>
            <div class="col-md-4">
                <h4>C???p Nh???t S???n Ph???m</h4>
                
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>T??n S???n Ph???m</label>
                    <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>"><br>
                    <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>"><br>
                    <label>H??nh ???nh</label>
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <img src="../uploads/<?php echo $row_capnhat['sanpham_images'] ?>" height="80" width="80"><br>
                    <label>Gi??</label>
                    <input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br>
                    <label>Gi?? Khuy???n M??i</label>
                    <input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>"><br>
                    <label>S??? L?????ng</label>
                    <input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>"><br>
                    <label>M?? T???</label>
                    <textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['sanphan_mota'] ?></textarea><br>
                    <label>Chi ti???t</label>
                    <textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea><br>
                    <label>Danh M???c</label>
                    <?php
                    $sql_danhmuc=mysqli_query($mysqli,"SELECT *FROM tbl_category ORDER BY category_id ASC"); 
                    ?>
                    <select name="danhmuc" class="form-control" >
                        <option value="0">---ch???n danh m???c---</option>
                        <?php 
                        while($row_danhmuc=mysqli_fetch_array($sql_danhmuc)){
                            if($id_category_1==$row_danhmuc['category_id']){

                            

                        
                        ?>

                        <option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>

                        <?php
                            }else{
                        ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                        <?php        
                            }
                        } 
                        ?>
                    </select><br>
                    <input type="submit" name="capnhatsanpham" value="C???p Nh???t S???n Ph???m" class="btn btn-success">
                </form>
            </div>
           
            <?php         
            }else{
            ?>
            <div class="col-md-4">
                <h4>Th??m S???n Ph???m</h4>
                
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>T??n S???n Ph???m</label>
                    <input type="text" class="form-control" name="tensanpham" placeholder="T??n S???n Ph???m"><br>
                    <label>H??nh ???nh</label>
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <label>Gi??</label>
                    <input type="text" class="form-control" name="giasanpham" placeholder="Gi?? S???n Ph???m"><br>
                    <label>Gi?? Khuy???n M??i</label>
                    <input type="text" class="form-control" name="giakhuyenmai" placeholder="Gi?? Khuy???n M??i"><br>
                    <label>S??? L?????ng</label>
                    <input type="text" class="form-control" name="soluong" placeholder="S??? L?????ng s???n ph???m"><br>
                    <label>M?? T???</label>
                    <textarea class="form-control" name="mota"></textarea><br>
                    <label>Chi ti???t</label>
                    <textarea class="form-control" name="chitiet"></textarea><br>
                    <label>Danh M???c</label>
                    <?php
                    $sql_danhmuc=mysqli_query($mysqli,"SELECT *FROM tbl_category ORDER BY category_id ASC"); 
                    ?>
                    <select name="danhmuc" class="form-control" >
                        <option value="0">---ch???n danh m???c---</option>
                        <?php 
                        while($row_danhmuc=mysqli_fetch_array($sql_danhmuc)){

                        
                        ?>

                        <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>

                        <?php
                        } 
                        ?>
                    </select><br>
                    <input type="submit" name="themsanpham" value="Th??m S???n Ph???m" class="btn btn-success">
                </form>
            </div>
            <?php
                }
            ?>
            
            <div class="col-md-8">
                <h4>Li???t K?? S???n Ph???m</h4>
                <?php
               $sql_select_sp= mysqli_query($mysqli,"SELECT *FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id=tbl_category.category_id ORDER BY tbl_sanpham.sanpham_id ASC") ;
                ?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Th??? T???</th>
                        <th>T??n S???n Ph???m</th>
                        <th>H??nh ???nh</th>
                        <th>S??? L?????ng</th>
                        <th>Danh M???c</th>
                        <th>Gi?? S???n Ph???m</th>
                        <th>Gi?? Khuy???n M??i</th>
                        <th>Qu???n L??</th>
                    </tr>
                
                <?php
                $i=0;
                while($row_sp= mysqli_fetch_array($sql_select_sp)){
                    $i ++;

                
                ?>    
                    <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row_sp['sanpham_name'] ?></td>
                            <td><img src="../uploads/<?php echo $row_sp['sanpham_images'] ?>" height="80" width="80"></td>
                            <td><?php echo $row_sp['sanpham_soluong'] ?></td>
                            <td><?php echo  $row_sp['category_name'] ?></td>
                            <td><?php echo number_format($row_sp['sanpham_gia']).'VN??' ?></td>
                            <td><?php echo number_format($row_sp['sanpham_giakhuyenmai']).'VN??'?></td>
                            <td> <a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>"> X??a</a> || <a href="xulysanpham.php?quanli=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>"> C???p Nh???t</a></td>
                    </tr>
                 <?php
                 }
                 ?>   
                </table>
            </div>
        </div>
    </div>
<!-- footer -->
<!-- <section class="sign_up_email">
        <div class="inside_sign_up">
            <h2 class="title">????ng K?? Nh???n Tin T??? BullDog</h2>
            <p>Th??ng tin s???n ph???m m???i nh???t v?? ch????ng tr??nh khuy???n m??i</p>
            <div class="input">
                <div class="input-email">
                    <input type="text" class="form-control" placeholder="abc@gmail.com" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="btn-sign-up">
                    <button class="btn btn-primary" type="submit">????ng K??</button>
                </div>
            </div>

        </div>
    </section> -->
    <footer class="text-center text-lg-start bg-dark text-white ">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>T????ng t??c v???i ch??ng t??i qua m???ng x?? h???i:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="footer_body">
            <div class="container text-center text-md-start mt-5">
                <div class="header">

                    <!-- Grid row -->
                    <div class="row mt-3 ">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 footer_body1">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i><img src="../images/logo-Bulldog.png" alt="logo" style="width: 50px;"></i> BULL DOG
                            </h6>
                            <p>
                                N??m 2020, Bulldog tr??? th??nh ?????i l?? b??n gi??y ch??nh h??ng. Ch??ng t??i ph??t tri???n chu???i c???a
                                h??ng ti??u chu???n v?? nh???m mang ?????n tr???i nghi???m t???t nh???t v??? s???n ph???m cho ng?????i d??ng Vi???t
                                Nam.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer_body2">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                S???n Ph???m
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Adidas</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Nike</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Reebok</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vans</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Converse</a>
                            <p>
                                <a href="#!" class="text-reset">New balance</a>
                            </p>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 footer_body3">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Ch??nh s??ch c???a ch??ng t??i
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Ch??nh s??ch thanh to??n</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Ch??nh S??ch ?????i Tr???</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">H?????ng D???n Mua H??ng</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">K??ch C??? Size</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Ch??nh S??ch Tuy???n D???ng</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 footer_body4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Li??n H???
                            </h6>
                            <p><i class="fas fa-home me-3"></i> 303 Nguy???n Thi???n Thu???t, Ph?????ng 1, Q3, HCM</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                Cskh@Bulldog.Vn
                            </p>
                            <p><i class="fas fa-phone me-3"></i> 1900.6626</p>
                            <p><i class="fas fa-print me-3"></i> 0866.308.688</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>


        </section>

        <!-- Section: Social media -->

        <!-- Section: Social media -->


        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            ?? 2021
            <a class="text-reset fw-bold" href="https://www.facebook.com/nguyendu2508/">B???n Quy???n Thu???c v???
                Bulldog.com.Thi???t k??? website b???i NguyenvanDu</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


</body>
</html>