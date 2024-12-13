<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="">
    <div class="card">
        <div class="card-header d-block  justify-content-between">
            <h2 class="text-center">Sửa Loại </h2>

        </div>
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
                        <a href="index.php?page_layout=suacate&id=' . $dm['id'] . '" class="btn btn-warning">Sửa</a>
                        </td>
                        </tr>';
                        $i++;
                    }
                }



                ?>
            </tbody>

        </table>
        <form class="" action="index.php?page_layout=updatecate" method="post">
            <div class="container">
                <div class="form">
                    <div class="col">
                        <input name="id" type="hidden" value="<?= $kqone['0']['id'] ?>">
                    </div>
                    <br>
                    <h5>Nhập tên loại sản phẩm </h5>
                    <div class="col">
                        <input class="form-control form-control-lg" value="<?= $kqone['0']['tenloaisanpham'] ?>" name="tenloaisanpham" type="text">
                    </div>

                    <h5>Chọn mã nhà sản xuất</h5>
                    <div class="col">
                        <select name="manhasanxuat" class="form-select form-control-lg">
                            <?php
                            $nsxList = getallnsx();
                            $manhasanxuat = isset($_POST['manhasanxuat']) ? $_POST['manhasanxuat'] : null;
                            $categories = [];
                            if ($manhasanxuat) {
                                $categories = getallcate_byID($manhasanxuat);
                            }

                            foreach ($nsxList as $nsx) {
                                // Kiểm tra xem mã nhà sản xuất hiện tại có trùng với mã nhà sản xuất đã chọn không
                                $selected = ($kqone['0']['manhasanxuat'] == $nsx['manhasanxuat']) ? 'selected' : '';
                                echo "<option value='{$nsx['manhasanxuat']}' $selected>{$nsx['tennhasanxuat']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input style="margin-left: 45%;" class="btn btn-primary btn-md" type="submit" name="suacate" value="Sửa danh mục">
            </div>
        </form>



    </div>
</div>