<?php
require_once '../connect/sanphamconn.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>danh sách sản phẩm</h2>
            <a href="index.php?page_layout=addsp" class="btn btn-primary btn-lg">Thêm</a>

        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Mã danh mục</th>
                <th>Mã nhà sản xuất </th>
                <th>Tên sản phẩm </th>
                <th>Cpu</th>
                <th>Ram</th>
                <th>Dung lượng</th>
                <th>Vga</th>
                <th>Màn hình</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Ảnh sản phẩm</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>

            <?php

            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '<tr>      
                    
                                    <td>' . $dm['loai_id'] . '</td>
                                    <td>' . $dm['manhasanxuat'] . '</td>
                                    <td>' . $dm['tensp'] . '</td>
                                    <td>' . $dm['processor'] . '</td>
                                    <td>' . $dm['ram'] . '</td>
                                    <td>' . $dm['dungluong'] . '</td>
                                    <td>' . $dm['vga'] . '</td>
                                    <td>' . $dm['manhinh'] . '</td>
                                    <td>' . $dm['price'] . '</td>
                                    <td>' . $dm['mota'] . '</td>
                                    <td>' . $dm['quanity'] . '</td>
                                    <td>' . '<img width=100px; src="../image/' . $dm['anhlaptop'] . '" alt="">' . '</td>
                                    <td class="d-flex">
                                    <a href="index.php?page_layout=deldm&id=' . $dm['id'] . '" class="btn btn-danger mx-2">Xóa</a>
                                    <a href="index.php?page_layout=updatedmform&id=' . $dm['id'] . '" class="btn btn-warning">Sửa</a>
                                    </td>
                                    </tr>';
                    $i++;
                }
            }



            ?>
        </tbody>

    </table>


</div>