<!-- body danh muc san pham -->
<?php

                $sql_cate_home = mysqli_query($mysqli,"SELECT * FROM tbl_category ORDER BY category_id ASC");
                while($row_cate_home = mysqli_fetch_array($sql_cate_home)){
                $id_category= $row_cate_home['category_id'];

     ?>
    <div class="Adidas">
        <h2 class="heading_title">
            <a href="#" style="color: unset; font-size: 50px;" ;><?php echo $row_cate_home['category_name'] ?></a>
        </h2>
        
        <div class="cart_adidas">
            <div class="container">
                <div class="row row-cols-4">
                   
                            <?php
                                $sqll_cate = mysqli_query($mysqli,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id 
                                AND tbl_sanpham.category_id='$id_category' ORDER BY tbl_sanpham.sanpham_id ASC LIMIT 4");
                                
                                // $sqll_product= mysqli_query($mysqli,"SELECT * FROM tbl_sanpham ORDER BY sanpham_id ASC ");
                                while($row_sanpham = mysqli_fetch_array($sqll_cate)){
                                if($row_sanpham['category_id']== $id_category){
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
                            }
                            ?>
                    
                </div>
            </div>
           
        </div>
        
        <div class="button_adidas">
            <a class="btn btn-outline-primary" href="?quanli=danhmuc&id=<?php echo $row_cate_home['category_id'] ?>" role="button">Xem Tất Cả <?php echo $row_cate_home['category_name'] ?> ></a>
        </div>


    </div>
    <?php 
    }
    ?>

    <!-- <div class="Nike">
        <h2 class="heading_title">
            <a href="" style="color: unset; font-size: 50px;" ;>Nike</a>
        </h2>
        <div class="cart_nike">
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


        </div>
        <div class="button_nike">
            <a class="btn btn-outline-primary" href="#" role="button">Xem Tất Cả Nike ></a>
        </div>

    </div> -->
