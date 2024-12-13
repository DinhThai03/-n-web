<?php

require_once '../connect/sanphamconn.php';
$nsxList = getallnsx();

// Xử lý form
$manhasanxuat = isset($_POST['manhasanxuat']) ? $_POST['manhasanxuat'] : null;
$categories = [];
if ($manhasanxuat) {
    $categories = getallcate_byID($manhasanxuat);
}


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="">
    <div class="card">
        <div class="card-header d-block  justify-content-between">
            <h2 class="text-center">Thêm</h2>

        </div>

        <form class="" action="index.php?page_layout=addsp" method="post">
            <div class="container">
                <div class="form">
                    <div class="col"><input class="form-control form-control-lg " name="id" type="hidden"></div>
                    <h5>Chọn nhà sản xuất</h5>
                    <select name="manhasanxuat" class="form-select" onchange="this.form.submit()">
                        <?php
                        foreach ($nsxList as $nsx) {
                            $selected = ($manhasanxuat == $nsx['manhasanxuat']) ? 'selected' : '';
                            echo "<option value='{$nsx['manhasanxuat']}' $selected>{$nsx['tennhasanxuat']}</option>";
                        }
                        ?>
                    </select>
                </div>



                <h5>Chọn danh mục</h5>
                <select name="loai_id" class="form-select">

                    <?php
                    foreach ($categories as $cate) {
                        echo "<option value='{$cate['id']}'>{$cate['tenloaisanpham']}</option>";
                    }
                    ?>
                </select>
                <h5> Nhập tên</h5>
                <div class="col"><input class="form-control form-control-lg " name="tensp" type="text"></div>
                <h5> Nhập cpu</h5>
                <div class="col"><input class="form-control form-control-lg" name="processor" type="text"></div>
                <h5>Nhập ram</h5>
                <div class="col"><input class="form-control form-control-lg" name="ram" type="text"></div>
                <h5>Nhập dung luong</h5>
                <div class="col"><input class="form-control form-control-lg" name="dungluong" type="text"></div>
                <h5>Nhập card</h5>

                <div class="col"><input class="form-control form-control-lg" name="vga" type="text"></div>
                <h5>Nhập man hinh</h5>

                <div class="col"><input class="form-control form-control-lg" name="manhinh" type="text"></div>
                <h5>Nhập gia</h5>

                <div class="col"><input class="form-control form-control-lg" name="price" type="number"></div>
                <h5>mô tả</h5>
                <div class="col"><input class="form-control form-control-lg" name="mota" type="text"></div>
                <h5>cập so luong</h5>
                <div class="col"><input class="form-control form-control-lg" name="quanity" type="text"></div>
                <h5>Nhập anh</h5>

                <div class="col"><input class="form-control form-control-lg" name="anhlaptop" type="file"></div>




            </div>
            <input style="margin-left: 45%;" class="btn btn-primary btn-md" type="submit" name="them" value="Thêm sp">

        </form>
    </div>
</div>