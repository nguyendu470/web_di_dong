<?php
    if(isset($_POST['seach_button'])){
        $tukhoa= $_POST['seach_product'];

 

    $sql_product = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$tukhoa%' ORDER BY tbl_sanpham.sanpham_id ASC");
    //$row_title = mysqli_fetch_array($sqll_category);
    $title= $tukhoa;
    
    }   
?>
<section>
<div class="body-product-list" >
    <h2 class="heading_title" >
        <a href=""style="color: unset; font-size: 50px;";>Từ khóa tìm kiếm '<?php echo $title ?>'</a>
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
            <li>Tất Cả</li>
            <li>Sản Phẩm Mới Nhất</li>
            <li>Sản phẩm Cũ Nhất</li>
            <li>Giá Từ Thấp tới Cao</li>
            <li>Giá Từ Cao tới Thấp</li>
        </ul>
        
        <div class="cart_adidas">
            <div class="container">
                <div class="row row-cols-4">
                    <?php
                    while($row_sanpham = mysqli_fetch_array($sql_product)){
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
<nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- so trang-chuyen trang -->
</section>
