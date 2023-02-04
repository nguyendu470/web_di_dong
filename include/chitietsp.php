<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id="";
} 
$sql_chitiet_sp=mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");
while($row_chitiet=mysqli_fetch_array($sql_chitiet_sp)){
?>



<section>
    <div class="body-product-details">
        <div class="pd-wrap">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-6">
                        <div id="slider" class="owl-carousel product-slider">
                            <div class="item">
                                  <img src="images/<?php echo $row_chitiet['sanpham_images'] ?>" />
                            </div>
                            <!-- <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-2.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-3.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-4.jpg" />
                            </div> -->
                            <!-- <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-1.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-2.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-3.jpg" />
                            </div> -->
                        </div>
                        <div id="thumb" class="owl-carousel product-thumb">
                            <!-- <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-1.jpg" />
                            </div> -->
                            <!-- <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-2.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-3.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-4.jpg" />
                            </div> -->
                            <!-- <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-1.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-2.jpg" />
                            </div>
                            <div class="item">
                                  <img src="images/new-balance-550-white-black-bb550-3.jpg" />
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-dtl">
                            <div class="product-info">
                                <div class="product-name"><?php echo $row_chitiet['sanpham_name'] ?></div>
                                <div class="reviews-counter">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" checked />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" checked />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" checked />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                      </div>
                                    <span>3 Reviews</span>
                                </div>
                                <div class="product-price-discount"><span><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'vnđ'?></span><span class="line-through"><?php echo number_format($row_chitiet['sanpham_gia']).'vnđ'?></span></div>
                            </div>
                            <p><?php echo $row_chitiet['sanpham_chitiet']?></p>
                            <div class="row">
                                
                                <!-- chọn màu -->
                                <!-- <div class="col-md-6">
                                    <label for="color">Color</label>
                                    <select id="color" name="color" class="form-control">
                                        <option>Blue</option>
                                        <option>Green</option>
                                        <option>Red</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="product-count">
                                
                                <!-- <form action="#" class="display-flex">
                                    
                                </form> -->
                                <form action="?quanli=giohang" method="POST">
                                    
                                    <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?> ">
                                    <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?> ">
                                    <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_giakhuyenmai'] ?> ">
                                    <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_images'] ?> ">
                                    <div class="col-md-6">
                                        <label for="size">Size</label>
                                            <select id="size" name="size" class="form-control">
                                                <option>Chọn Size Cần Mua</option>
                                                <option>7(US)</option>
                                                <option>7.5(US)</option>
                                                <option>8(US)</option>
                                                <option>8.5(US)</option>
                                                <option>9(US)</option>
                                                <option>9.5(US)</option>
                                                <option>10(US)</option>
                                             </select>
                                    </div>

                                    <label for="size">Số Lượng</label>
                                    <div class="display-flex">
                                         <div class="qtyminus">-</div>
                                         <input type="text" name="quantity" value="1" class="qty">
                                         <div class="qtyplus">+</div>
                                    </div>
                                    <!-- <input type="hidden" name="soluong" value="1"> -->
                                    <!-- <input type="hidden" name="size" value="6.5"> -->
                                    <input type="submit" name="themgiohang" value="Thêm Vào Giỏ Hàng" class="round-black-btn">
                                </form>
                                
                                <!-- <a href="?quanli=giohang" name="themgiohang1" class="round-black-btn">Thêm Vào Giỏ Hàng</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Vận Chuyển & Đổi Trả</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
                          </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                          <?php echo $row_chitiet['sanphan_mota']?>
                          </div>
                          <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                              <div class="review-heading">REVIEWS</div>
                              <p class="mb-20">Hiện tại không có đánh giá nào.</p>
                              <form class="review-form">
                                <div class="form-group">
                                    <label>Đánh Giá</label>
                                    <div class="reviews-counter">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Viết Nhận Xét Của Bạn</label>
                                    <textarea class="form-control" rows="10"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" placeholder="Name*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" placeholder="Email Id*">
                                        </div>
                                    </div>
                                </div>
                                <button class="round-black-btn">Submit Review</button>
                            </form>
                          </div>
                    </div>
                </div>
                

            </div>
        </div>
        
    </div>
</section>

<?php
} 
?>