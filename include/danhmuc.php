<?php
    if(isset($_GET['id'])){
        $id= $_GET['id'];
    }else{
        $id="";
    }
    //phantrang
    if(isset($_GET['trang'])){
      $page=$_GET['trang'];
    }
    else{
      $page ='1';
    }
    if($page=='' ||$page == 1){
      $begin=0;
    }
    else{
      $begin=($page * 8)-8;
    }
    //phantrang 
    $sqll_cate = mysqli_query($mysqli,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id 
    AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id ASC LIMIT $begin,8");

    $sqll_category = mysqli_query($mysqli,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id 
    AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id ASC");
    $row_title = mysqli_fetch_array($sqll_category);
    $title= $row_title['category_name'];
    
    
?>

<section>
<div class="body-product-list" >
    <h2 class="heading_title" >
        <a href=""style="color: unset; font-size: 50px;";><?php echo $title ?></a>
      </h2>

    <div class="slide_product">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/slide8.jpg" class="d-block w-100" alt="ảnh Adidas">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/slide6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/slide7.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <!-- card danh muc san pham -->
    <div class="card_product">
        <ul class="list_product">
            <li><a href="?quanli=danhmuc&id=<?php echo $row_title['category_id'] ?>" class="text-reset">Tất Cả</a></li>
            <li><a href="?quanli=sapxep_moinhat&id=<?php echo  $row_title['category_id'] ?>" class="text-reset">Sản Phẩm Mới Nhất</a></li>
            <li><a href="?quanli=sapxep_cunhat&id=<?php echo  $row_title['category_id'] ?>" class="text-reset">Sản Phẩm Cũ Nhất</a></li>
            <li><a href="?quanli=sapxep_tangdan&id=<?php echo  $row_title['category_id'] ?>" class="text-reset">Giá từ thấp tới cao</a></li>
            <li ><a href="?quanli=sapxep&id=<?php echo  $row_title['category_id'] ?>" class="text-reset">Giá từ cao tới thấp</a></li>
        
        </ul>
        
        <div class="cart_adidas">
            <div class="container">
                <div class="row row-cols-4">
                    <?php
                    while($row_sanpham = mysqli_fetch_array($sqll_cate)){
                     ?>
                    <div class="col">
                    
                        <div class="card" style="width: 20rem;">
                            <img src="images/<?php echo $row_sanpham['sanpham_images'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row_sanpham['sanpham_name'] ?> </h5>
                                <div class="card-text">
                                    <p class="card-text_gach"><?php echo number_format($row_sanpham['sanpham_gia']).'vnđ'?> </p>
                                    <p class="card-text_chinh"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ'?></p>
                                </div>
                                <a href="?quanli=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="btn btn-primary">Mua Ngay</a>
                            </div>
                        </div>
       
                    </div>
                    <?php
                     }
                    ?>
                </div>
            </div>
            
       
      
      
            

    </div>
    <!-- <div class="cart_adidas">
        <div class="card" style="width: 18rem;">
          <img src="images/giay1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Air Force 1 Low "Supreme"</h5>
            <div class="card-text">
              <p class="card-text_gach"> 6.990.000 vnd</p>
              <p class="card-text_chinh"> 5.990.000 vnd</p>
            </div>
            <a href="#" class="btn btn-primary">Mua Ngay</a>
          </div>
        </div>
  
  
        <div class="card" style="width: 18rem;">
          <img src="images/giay1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Air Force 1 Low "Supreme"</h5>
            <div class="card-text">
              <p class="card-text_gach"> 6.990.000 vnd</p>
              <p class="card-text_chinh"> 5.990.000 vnd</p>
            </div>
            <a href="#" class="btn btn-primary">Mua Ngay</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="images/giay1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Air Force 1 Low "Supreme"</h5>
            <div class="card-text">
              <p class="card-text_gach"> 6.990.000 vnd</p>
              <p class="card-text_chinh"> 5.990.000 vnd</p>
            </div>
            <a href="#" class="btn btn-primary">Mua Ngay</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="images/giay1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Air Force 1 Low "Supreme"</h5>
            <div class="card-text">
              <p class="card-text_gach"> 6.990.000 vnd</p>
              <p class="card-text_chinh"> 5.990.000 vnd</p>
            </div>
            <a href="#" class="btn btn-primary">Mua Ngay</a>
          </div>
      </div>
</div>  -->
<!-- so trang-chuyen trang -->
<?php
$sql_trang=mysqli_query($mysqli,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id 
AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id ASC");
$row_count= mysqli_num_rows($sql_trang);
$trang=ceil($row_count/8);

?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link"<?php if($page==1){?>href="#" <?php } else {?>href="?quanli=danhmuc&id=<?php echo $row_title['category_id'] ?>&trang=<?php echo $page-1 ?>" <?php } ?>  aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <?php 
      for($i=1;$i<=$trang;$i++){
        ?>
        <li class="page-item" ><a <?php if($i==$page){echo 'style = "background: #f2f2f2;"';}else{echo'';} ?> class="page-link" href="?quanli=danhmuc&id=<?php echo $row_title['category_id'] ?>&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        
        <?php 
      }
      ?>
      
      
      <li class="page-item">
        <a   class="page-link "<?php if($page == $trang){?> href="#" <?php } else{?>href="?quanli=danhmuc&id=<?php echo $row_title['category_id'] ?>&trang=<?php echo $page+1 ?>" <?php } ?>  aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- so trang-chuyen trang -->
</section>
