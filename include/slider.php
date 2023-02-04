<!------------------------ sidle----------------------------------------- -->
<div class="slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <?php
                $sql_slider = mysqli_query($mysqli,"SELECT * FROM tbl_slider WHERE slider_active ='1' ORDER BY slider_id");
                while($row_slider= mysqli_fetch_array($sql_slider)){

                ?>
                <div class="carousel-item active">
                    <img id="slide" src="images/<?php echo $row_slider['slider_images'] ?>" class="d-block w-100" alt="ảnh giày Adidas">
                     
                </div>
                <?php
                }
                ?>
                <!-- <div class="carousel-item">
                    <img id="slide" src="images/slide7.jpg" class="d-block w-100" alt="ảnh giày Adidas">
                </div>
                <div class="carousel-item">
                    <img id="slide" src="images/slide8.jpg" class="d-block w-100" alt="ảnh giày Adidas">
                </div>
                <div class="carousel-item">
                    <img id="slide" src="images/slide5.jpg" class="d-block w-100" alt="ảnh giày Adidas">
                </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>