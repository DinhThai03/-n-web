<?php
require_once '../connect/HangConnect.php';
require_once '../connect/Sanpham_Connect.php';
$nsxList = getAllHang();

// Xử lý form
$mahang = isset($_POST['mahang']) ? $_POST['mahang'] : null;
$phanloai = [];
if ($mahang) {
    $phanloai = getallLoai_byID($mahang);
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
                    <div class="col"><input class="form-control form-control-lg " name="mahang" type="hidden"></div>
                    <h5>Hãng</h5>
                    <select name="mahang" class="form-select" onchange="this.form.submit()">
                        <?php
                        foreach ($nsxList as $nsx) {
                            $selected = ($mahang == $nsx['mahang']) ? 'selected' : '';
                            echo "<option value='{$nsx['mahang']}' $selected>{$nsx['ten']}</option>";
                        }
                        ?>
                    </select>
                </div>



                <h5>Phân loại</h5>
                <select name="maloai" class="form-select">

                    <?php
                    foreach ($phanloai as $loai) {
                        echo "<option value='{$loai['maloai']}'>{$loai['tenloai']}</option>";
                    }
                    ?>
                </select>
                <h5> Tên</h5>
                <div class="col"><input class="form-control form-control-lg " name="tendt" type="text"></div>
                <h5> Bộ nhớ</h5>
                <div class="col"><input class="form-control form-control-lg" name="bonho" type="text"></div>
                <h5> Ram</h5>
                <div class="col"><input class="form-control form-control-lg" name="ram" type="text"></div>
                <h5> Giá</h5>
                <div class="col"><input class="form-control form-control-lg" name="gia" type="text"></div>
                <h5> Mô tả</h5>

                <div class="col"><input class="form-control form-control-lg" name="mota" type="text"></div>
                <h5> Số lượng</h5>

                <div class="col"><input class="form-control form-control-lg" name="soluong" type="number"></div>
                <h5> Hình ảnh</h5>
                <div class="col"><input class="form-control form-control-lg" name="hinhanh" type="file"></div>

            </div>
            <input style="margin-top: 20px;" class="btn btn-primary btn-md" type="submit" name="them" value="Thêm sp">

        </form>
    </div>
</div>