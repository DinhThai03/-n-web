<div class="wrapper">
    <img style="max-width: 100%;;" src="image/bannertop_3.webp" alt="">

    <div class="banner-top">
    </div>
    <div class="header bg-success">
        <div class="container  py-3" style="margin-bottom: 30px;">
            <div class="row">
                <div class="col-md-1">
                    <a href="index.php"><img src="image/dtung-high-resolution-logo-black-transparent.png" style="width: 100px;" alt="logo"></a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div style="padding-top: 5px; " class="input-group ">
                        <form action="index.php?page_layout=search" method="post" class="d-flex">
                            <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="tìm kiếm sản phẩm ...." aria-label="Search">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </form>

                    </div>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-2">
                    <div class="ro">
                        <div class="col">
                            <div class="row  ">
                                <div style="padding-top:10px ;" class="col-1"><i class="fa fa-user text-white" aria-hidden="true"></i></div>
                                <div class="col-9 login "><?php
                                                            if (isset($_SESSION['tentk']) && ($_SESSION['tentk'] != "")) {
                                                                echo '<h4 class="text-white" >' . $_SESSION['tentk'] . '</h4>
                                                                <a class="text-white" href="index.php?page_layout=logout" class="sidebar-link">
                                                                <i class="lni lni-exit"></i>
                                                                <span>Logout</span></a>';
                                                            } else {
                                                                echo '    <a style="font-size: small;" href="index.php?page_layout=login">Đăng Nhập</a><br>
                                                                <a style="font-size: smaller;" href="index.php?page_layout=signup">Đăng ký</a><br>
                            ';
                                                            }
                                                            ?>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-2">
                    <a style="margin-top: 3.5px; padding-left: 15px;" href="index.php?page_layout=cart" class="row text-white cart-1">
                        <div class="col-1"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                        <div class="col">Giỏ hàng</div>

                    </a>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>
</div>