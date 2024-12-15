<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>danh sách tài khoản</h2>

        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Mã TK</th>
                <th>Tên TK</th>
                <th>Mật khẩu</th>
                <th>Tên người dùng</th>
                <th>email</th>
                <th>Số điện thoại</th>
                <th>địa chỉ</th>
                <th>Quyền</th>

            </tr>
        </thead>
        <tbody>

            <?php

            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    $quyen = $dm['phanquyen'] == 1 ? "admin" : "user";
                    echo '<tr>      
                    
                                    <td>' . $dm['matk'] . '</td>
                                    <td>' . $dm['tentk'] . '</td>
                                    <td>' . $dm['matkhau'] . '</td>
                                    <td>' . $dm['tennguoidung'] . '</td>
                                    <td>' . $dm['email'] . '</td>
                                    <td>' . $dm['dienthoai'] . '</td>
                                    <td>' . $dm['diachi'] . '</td>
                                    <td>' . $quyen . '</td>

                                    <td class="d-flex">
                                    <a href="index.php?page_layout=deltk&id_tk=' . $dm['matk'] . '" class="btn btn-danger mx-2">Xóa</a>
                                    
                                    </td>
                                    </tr>';
                    $i++;
                }
            }



            ?>
        </tbody>

    </table>