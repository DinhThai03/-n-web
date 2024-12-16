<!---->
<section class="ab-info-main py-5">
    <div class="container py-3">
        <h3 class="tittle text-center">View Cart</h3>
        <div class="row contact-main-info mt-5">
            <div class="col-md-6 contact-right-content">
                <?php
                $tong = 0;
                if (isset($_SESSION['tentk']) && ($_SESSION['tentk'] != "")) {
                    $matk = $_SESSION['matk'];

                    echo '<table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Stt</th>
                        <th>Tên sp</th>
                        <th>Hình</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>

                </tr>
                <tbody>';
                    $giohang = getAllCart_DT($matk);
                    $i = 0;
                    foreach ($giohang as $item) {
                        $tt = $item['gia'] * $item['soluong'];
                        $tong += $tt;
                        echo '
                        <tr>
                            <td>' . ($i + 1) . '</td>
                            <td>' . $item['ten'] . '</td>
                            <td> <img width=100px; src="image/' . $item['hinhanh'] . '" alt=""></td>
                            <td>' . $item['gia'] . '</td>
                            <td>' . $item['soluong'] . '</td>
                            <td>' . $tt . '</td>
                            <td><a href="index.php?page_layout=delcart&magh=' . $item['magh'] . '" class="btn btn-danger mx-2">Xóa </a> </td>

                        </tr>';
                        $i++;
                    }
                    echo '<tr><td colspan="5">Tổng tiền thanh toán là:</td><td>' . $tong . '(VND)</td><td></td><td></td><td></td></tr>';
                    echo ' </tbody></table>';
                } else {
                    echo 'Đăng nhập để mua hàng';
                }

                ?>
                <br>
                <a href="index.php" class="btn btn-info">Tiếp tục mua hàng</a>|<a href="#" class="btn btn-success">Thanh toán </a>|<a href="index.php?page_layout=delcart" class="btn btn-danger ">xóa giỏ hàng</a>
            </div>
            <div class="col-md-6 contact-left-content">
                <form action="index.php?page_layout=thanhtoan" method="post">
                    <input type="hidden" name="tongtien" value="<?= $tong ?>">

                    <table class="table">
                        <tbody>
                            <tr>
                                <td><input type="text" name="name" placeholder="Họ tên"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="address" placeholder="Địa chỉ"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="phone" placeholder="so dien thoai"></td>
                            </tr>
                            <tr>
                                <td>Phương thức thanh toán: <br>
                                    <input type="radio" name="pttt" value="1"> Thanh toán khi nhận hàng <br>
                                    <input type="radio" name="pttt" value="2">Thanh toán qua ngân hàng <br>
                                    <input type="radio" name="pttt" value="3">Thanh toán qua momo <br>
                                    <input type="radio" name="pttt" value="4">Thanh toán qua zalopay <br>

                                </td>
                            </tr>
                            <tr><input type="submit" name="thanhtoan" value="Thanh toán"></tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>
</section>