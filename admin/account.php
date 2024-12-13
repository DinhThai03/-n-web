<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>danh sách tài khoản</h2>

        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>User name</th>
                <th>Mật khẩu</th>
                <th>Tên</th>
                <th>email</th>
                <th>Số điện thoại</th>
                <th>địa chỉ</th>
                <th>role</th>

            </tr>
        </thead>
        <tbody>

            <?php

            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '<tr>      
                    
                                    <td>' . $dm['id_tk'] . '</td>
                                    <td>' . $dm['username'] . '</td>
                                    <td>' . $dm['password'] . '</td>
                                    <td>' . $dm['name'] . '</td>
                                    <td>' . $dm['email'] . '</td>
                                    <td>' . $dm['phone'] . '</td>
                                    <td>' . $dm['address'] . '</td>
                                    <td>' . $dm['role'] . '</td>

                                    <td class="d-flex">
                                    <a href="index.php?page_layout=deltk&id_tk=' . $dm['id_tk'] . '" class="btn btn-danger mx-2">Xóa</a>
                                    
                                    </td>
                                    </tr>';
                    $i++;
                }
            }



            ?>
        </tbody>

    </table>