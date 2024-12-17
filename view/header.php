<div class="wrapper">
    <img style="max-width: 100%;;" src="image/bannertop_3.webp" alt="">

    <div class="banner-top">
    </div>
    <div class="header bg-success">
        <div class="container  py-3">
            <div class="row align-items-center">
                <div class="col-md-1">
                    <a href="index.php"><img src="image/logo.png" style="width: 100px;" alt="logo"></a>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div style="padding-top: 5px; " class="input-group ">
                        <form action="index.php?page_layout=search" method="post" class="d-flex">
                            <input class="form-control mr-sm-2" name="keyword" type="search"
                                placeholder="tìm kiếm sản phẩm ...." aria-label="Search">
                            <button style="width: 50%;" type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </form>

                    </div>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-2">

                    <div class="login ">

                        <?php
                        if (isset($_SESSION['tentk']) && ($_SESSION['tentk'] != "")) {
                            echo '<div> <i class="fa fa-user text-white" aria-hidden="true"> </i>' . $_SESSION['tentk'] . '
                                                                <a class="text-white" href="index.php?page_layout=logout" class="sidebar-link">
                                                                <i class="lni lni-exit"></i>
                                                                <span> | Logout</span></a></div>';
                        } else {
                            echo '<i class="fa fa-user text-white" aria-hidden="true"></i>    <a style="font-size: small;" href="index.php?page_layout=login">Đăng Nhập | </a>
                                                                <a style="font-size: smaller;" href="index.php?page_layout=signup">Đăng ký</a><br>';
                        }
                        ?>


                    </div>

                </div>

                <div class="col-md-2">
                    <a href="index.php?page_layout=cart" class="text-white cart-1">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>