<?php

require_once '../connect/nhasanxuatconn.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="">
    <div class="card">
        <div class="card-header d-block  justify-content-between">
            <h2 class="text-center">Thêm nhà sản xuất</h2>
        </div>


        <form class="" action="index.php?page_layout=addnsx" method="post">
            <div class="container">
                <div class="form">
                    <br>
                    <h5>Nhập tên nhà sản xuất</h5>
                    <div class="col"><input class="form-control form-control-lg " name="manhasanxuat" type="text"></div>
                    <br>
                    <h5>Nhập tên nhà sản xuất</h5>
                    <div class="col"><input class="form-control form-control-lg " name="tennhasanxuat" type="text"></div>
                    <h5>Nhập mô tả</h5>
                    <div class="col"><input class="form-control form-control-lg " name="mota" type="text"></div>


                </div>
                <input style="margin-left: 45%;" class="btn btn-primary btn-md" type="submit" name="themnsx" value="Thêm sp">

        </form>


    </div>
</div>