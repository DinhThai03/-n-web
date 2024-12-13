<div class="wrapper-navbar">
    <div class="row">
        <div class="col-md-3 ">
            <div class="listmenu">
                <ul class="list-group list">
                    <h5>Hãng</h5>
                    <?php
                    foreach ($hang as $h) {
                        echo ' <li class="list-group-item">
                <a href="index.php?page_layout=hang&mahang=' . $h['mahang'] . '">' . $h['ten'] . '</a>
              </li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
        <div class="col">
            <div class="wrapper-content">
                <div class="container">
                    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>

                        <div class="carousel-inner ">
                            <div class="carousel-item active c-item" data-bs-interval="1000">
                                <img src="./image/1.webp" class="d-block w-100 c-img" alt="Slide 1">

                            </div>
                            <div class="carousel-item c-item">
                                <img src="./image/2.webp" class="d-block w-100 c-img" alt="Slide 2">

                            </div>
                            <div class="carousel-item c-item">
                                <img src="./image/3.webp" class="d-block w-100 c-img" alt="Slide 3">

                            </div>
                            <div class="carousel-item c-item">
                                <img src="./image/4.webp" class="d-block w-100 c-img" alt="Slide 4">

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>

                        </button>
                    </div>
                </div>
            </div>
            <div class="categories">

                <h3>Danh mục sản phẩm</h3>
                <ul>
                    <?php

                    if (isset($_GET['mahang']) && $_GET['mahang'] != '') {
                        $mahang = $_GET['mahang'];
                        // Gọi hàm lấy danh mục theo hang
                        $dsphanloai =  getallLoai_byID($mahang);
                        if (!empty($dsphanloai)) {
                            foreach ($dsphanloai as $phanloai) {
                                echo '<li>
                        <a href="index.php?page_layout=phanloai&mahang=' . $mahang . '&maloai=' . $phanloai['maloai'] . '">' . $phanloai['tenloai'] . '</a>
                    </li>';
                            }
                        }
                    }
                    
                    ?>
                </ul>
            </div>

            <div class="product-1">
                <div class="row pd-0">
                    <div class="container">
                        <div class="row">
                            <?php
                            foreach ($dssp as $sp) {
                                echo '
                                 
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col sp">
                                <a style="text-decoration: none;" href="index.php?page_layout=detail&id=' . $sp['madt'] . '">
                                <form action="index.php?page_layout=addcart" method="post">
                                <div class="img_sp">
                                 <img src="./image/' . $sp['hinhanh'] . '" class="img-fluid" alt="">
                               </div>
                                <h3 class="text-dark" style="font-size: large;margin-top: 10px;">' . $sp['ten'] . ' </h3>
                        
  
                                 <span> Ram:'. $sp['ram'] . '</span>
                                <span>Bộ nhớ: ' . $sp['bonho'] . '</span>
                
                                    <br>
                                    <strong class="price text-danger">' . $sp['gia'] . '</strong>
                                        
                    <br>
                    <div class="icon-rating text-danger">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star-half" aria-hidden="true"></i>
                   
                      <input type="hidden" value="' . $sp['madt'] . '" name="madt">          
                    <input type="submit" value="Mua hàng" name="addtocart">
                    </div>
                  
                    </form></a>
                  </div>';
                            }

                            ?>



                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>