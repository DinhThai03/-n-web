<?php
$nsxList = getallnsx();
$manhasanxuat = isset($_POST['manhasanxuat']) ? $_POST['manhasanxuat'] : null;
$categories = [];
if ($manhasanxuat) {
    $categories = getallcate_byID($manhasanxuat);
}
require_once '../connect/sanphamconn.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="">
    <div class="card">
        <div class="card-header d-block  justify-content-between">
            <h2 class="text-center">Update sản phẩm</h2>


        </div>
        <div class="card-body">
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
                            <td >
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
        <form action="index.php?page_layout=updatedmform" method="post">
            <div class="container ">
                <div class="row d-block my-3">

                    <div class="col"><input name="id" value="<?= $kqone['0']['id'] ?>" type="hidden"></div>
                    <h5>nhap ma danh muc </h5>
                    <div class="col"><input name="loai_id" class="form-control form-control-lg " value="<?= $kqone['0']['loai_id'] ?>" type="text"></div>
                    <h5>nhap ma nha san xuat </h5>
                    <div class="col"><select name="manhasanxuat" class="form-select form-control-lg">
                            <?php

                            foreach ($nsxList as $nsx) {

                                $selected = ($kqone['0']['manhasanxuat'] == $nsx['manhasanxuat']) ? 'selected' : '';
                                echo "<option value='{$nsx['manhasanxuat']}' $selected>{$nsx['tennhasanxuat']}</option>";
                            }
                            ?>
                        </select></div>
                    <br>
                    <h5>cập nhập tên</h5>
                    <div class="col"><input class="form-control form-control-lg " value="<?= $kqone['0']['tensp'] ?>" name="tensp" type="text"></div>

                    <h5>cập nhập cpu</h5>

                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['processor'] ?>" name="processor" type="text"></div>

                    <h5>cập nhập ram</h5>
                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['ram'] ?>" name="ram" type="text"></div>
                    <h5>cập nhập dung luong</h5>
                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['dungluong'] ?>" name="dungluong" type="text"></div>
                    <h5>cập nhập card</h5>

                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['vga'] ?>" name="vga" type="text"></div>
                    <h5>cập nhập man hinh</h5>

                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['manhinh'] ?>" name="manhinh" type="text"></div>
                    <h5>cập nhập gia</h5>

                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['price'] ?>" name="price" type="text"></div>
                    <h5>mo ta</h5>
                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['mota'] ?>" name="mota" type="text"></div>
                    <h5>cập so luong</h5>
                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['quanity'] ?>" name="quanity" type="text"></div>
                    <h5>cập nhập anh</h5>

                    <div class="col"><input class="form-control form-control-lg" value="<?= $kqone['0']['anhlaptop'] ?>" name="anhlaptop" type="file"></div>

                </div>
                <div class="col"><input class="btn btn-primary btn-md" type="submit" name="capnhap" value="Cập nhập"></div>
            </div>
        </form>
    </div>
</div>