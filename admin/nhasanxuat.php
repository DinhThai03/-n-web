<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>danh sách Hãng </h2>
            <a href="index.php?page_layout=addnsx" class="btn btn-primary btn-lg">Thêm</a>

        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Mã hãng</th>
                    <th>Tên hãng </th>
                    <th>Mô tả</th>



                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($kq) && (count($kq) > 0)) {
                    $i = 1;
                    foreach ($kq as $nsx) {
                        echo '<tr>
                                    <td>' . $nsx['mahang'] . '</td>
                                    <td>' . $nsx['ten'] . '</td>
                                    <td>' . $nsx['mota'] . '</td>
                                    <td style= display:flex;>
                                    <a href="index.php?page_layout=delnsx&manhasanxuat=' . $nsx['mahang'] . '" class="btn btn-danger mx-2">Xóa</a>

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