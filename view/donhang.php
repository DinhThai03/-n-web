<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item active">View cart</li>
</ol>
<!---->
<section class="ab-info-main py-5">
    <div class="container py-3">
        <h3 class="tittle text-center">Thanh toán</h3>
        <div class="row contact-main-info mt-5">
            <div class="col-md-6 contact-right-content">
                <?php
                if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                    if (isset($_SESSION['iddh']) && ($_SESSION['iddh'] > 0)) {
                        $getshowcart = getshowcart($iddh);
                        if (($getshowcart) && (count($getshowcart) > 0)) {
                            echo '<table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Stt</th>
                        <th>Tên sp</th>
                        <th>Hình</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>

                </tr>
                <tbody>';

                            $i = 0;
                            $tong = 0;
                            foreach ($getshowcart as $item) {
                                $tt = $item['soluong'] * $item['tongtien'];
                                $tong += $tt;
                                echo '
                        <tr>
                            <td>' . ($i + 1) . '</td>
                            <td>' . $item['tensp'] . '</td>
                            <td> <img src="../image/' . $item['anhsp'] .  '"</td>
                            <td>' . $item['tongtien'] . '</td>
                            <td>' . $item['soluong'] . '</td>
                            <td>' . $tt . '</td>

                        </tr>';
                                $i++;
                            }
                            echo '<tr><td colspan="5">Tổng tiền thanh toán là:</td><td>' . $tong . '(VND)</td><td></td><td></td><td></td></tr>';
                            echo ' </tbody></table>';
                        }
                    } else {
                        echo "gio hang rong";
                    }
                }

                ?>
                <br>
            </div>
            <div class="col-md-6 contact-left-content">
                <input type="hidden" name="tongtien" value="<?= $tong ?>">

                <?php
                if (isset($_SESSION['iddh']) && ($_SESSION['iddh'] > 0)) {

                    $getoderinfo = getorderinfo($_SESSION['iddh']);
                    if (count($getoderinfo) > 0) {
                ?>
                        <h3>Mã Đơn Hàng: <?= $getoderinfo[0]['madh'] ?></h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tên người nhận: <?= $getoderinfo[0]['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ người nhận: <?= $getoderinfo[0]['address'] ?></td>
                                </tr>

                                <tr>
                                    <td>Số điện thoại người nhận: <?= $getoderinfo[0]['phone'] ?></td>
                                </tr>
                                <tr>
                                    Phương thức thanh toán:
                                    <?php
                                    switch ($getoderinfo[0]['pttt']) {
                                        case '1':
                                            $txtmess = "Thanh toán khi nhận hàng";
                                            break;
                                        case '2':
                                            $txtmess = "Thanh toán ngân hàng";
                                            break;
                                        case '3':
                                            $txtmess = "Thanh toán momo";
                                            break;
                                        case '4':
                                            $txtmess = "Thanh toán zalopay";
                                            break;
                                        default:
                                            $txtmess = "Bạn chưa chọn phương thức thanh toán";
                                    }
                                    echo $txtmess;
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>
</section>