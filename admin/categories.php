<?php
require_once '../connect/categoriesconn.php';
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>danh mục sản phẩm</h2>
            <a href="index.php?page_layout=addcate" class="btn btn-primary btn-lg">Thêm</a>

        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">

            <thead class="thead-dark">
                <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục </th>
                    <th>Mã nhà sản xuất </th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($kq) && (count($kq) > 0)) {
                    $i = 1;
                    foreach ($kq as $dm) {
                        echo '<tr>
                                    <td>' . $dm['id'] . '</td>
                                    <td>' . $dm['tenloaisanpham'] . '</td>
                                    <td>' . $dm['manhasanxuat'] . '</td>
                                    <td >
                                    <a href="index.php?page_layout=delcate&id=' . $dm['id'] . '" class="btn btn-danger mx-2">Xóa</a>
                                    <a href="index.php?page_layout=updatecate&id=' . $dm['id'] . '" class="btn btn-warning">Sửa</a>
                                    </td>
                                    </tr>';
                        $i++;
                    }
                }



                ?>
            </tbody>

        </table>
    </div>

</div>