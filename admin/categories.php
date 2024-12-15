<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>Phân loại</h2>
            <a href="index.php?page_layout=addcate" class="btn btn-primary btn-lg">Thêm</a>

        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">

            <thead class="thead-dark">
                <tr>
                    <th>Mã loại</th>
                    <th>Tên loại </th>
                    <th>Tùy chọn </th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($kq) && (count($kq) > 0)) {
                    $i = 1;
                    foreach ($kq as $dm) {
                        echo '<tr>
                                    <td>' . $dm['maloai'] . '</td>
                                    <td>' . $dm['tenloai'] . '</td>
                                    <td >
                                    <a href="index.php?page_layout=delcate&id=' . $dm['maloai'] . '" class="btn btn-danger mx-2">Xóa</a>
                                    <a href="index.php?page_layout=updatecate&id=' . $dm['maloai'] . '" class="btn btn-warning">Sửa</a>
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