<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
include "./connect/connect.php";
include "./connect/sanphamconn.php";
include "./connect/phanloai_cnn.php";
include "./connect/hang.php";
include "./connect/user.php";
include "./connect/signup_process.php";
include "./connect/donhangconn.php";
$hang = getAllHang();
$dssp = getalldt();

?>

<!DOCTYPE html>
<html lang="en">
1

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <title>XGAER</title>
</head>

<body>
    <?php
  include "./view/header.php";
  if (isset($_GET['page_layout'])) {
    switch ($_GET['page_layout']) {
      case 'hang':
        if (isset($_GET['mahang']) && $_GET['mahang'] > 0) {
          $mahang = $_GET['mahang'];
          $dssp = getalldt_byHang($mahang);
        }
        include "./view/home.php";
        break;
      case 'phanloai':
        if (isset($_GET['mahang']) && $_GET['mahang'] > 0) {
          $mahang = $_GET['mahang'];


          if (isset($_GET['maloai']) && $_GET['maloai'] > 0) {
            $maloai = $_GET['maloai'];
            $dssp = getalldt_byPhanloai_Hang($maloai, $mahang);
          }
        }
        include "./view/home.php";
        break;
      case 'detail':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          $id = $_GET['id'];
          $prodetail = getdetail($id);
        } else {
          $prodetail = 0;
        }

        include 'detail.php';
        break;

      case 'logout':
        unset($_SESSION['phanquyen']);
        unset($_SESSION['matk']);
        unset($_SESSION['tentk']);
        header('location: index.php');
        break;
      case 'login':
        if ((isset($_POST['login'])) && ($_POST['login'])) {
          $tentk = $_POST['tentk'];
          $matkhau = $_POST['matkhau'];

          $kq = getuserinfo($tentk, $matkhau);
          $role = $kq[0]['phanquyen'];
          if ($role == 1) {
            $_SESSION['phanquyen'] = $role;
            header('location: ./admin/index.php');
          } 
          else {
            $_SESSION['phanquyen'] = $role;
            $_SESSION['matk'] = $kq[0]['matk'];

            $_SESSION['tentk'] = $kq[0]['tentk'];

            header('location: index.php');
          }
        }
        include "./login.php";
        break;

      case 'search':

        $tukhoa = trim($_POST['keyword']);
        echo "<script>console.log('" . $tukhoa . "')</script>";
        $dssp = searchProducts($tukhoa); 
        include "./view/home.php";

        break;

      case 'addcart':
        if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
          $id = $_POST['id'];
          $price = $_POST['price'];
          if (isset($_POST['soluonng'])) {
            $soluong = $_POST['soluong'];
          } else {

            $soluong = 1;
          }
          $fg = 0;
          //kiem tra san pham da ton tai hay chua neu roi tang so luong
          $i = 0;
          foreach ($_SESSION['giohang'] as $item) {
            if ($item[1] === $tensp) {
              $slnew = $soluong + $item[4];
              $_SESSION['giohang'][$i][4] = $slnew;
              $fg = 1;
              break;
            }
            $i++;
          }
          //chua thi them vao gio hang bth
          if ($fg == 0) {
            $item = array($id, $tensp, $anhlaptop, $price, $soluong);
            $_SESSION['giohang'][] = $item;
          }
          header('location: index.php?page_layout=cart');
        }

        //include './view/cart.php';
        break;
      case 'delcart':
        if (isset($_GET['i']) && ($_GET['i'] > 0)) {
          if (isset($_SESSION['giohang']))
            array_splice($_SESSION['giohang'], $_GET['i'], 1);
        } else {

          if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
        }
        if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
          header('location: index.php?page_layout=cart');
          // include './view/cart.php';
        } else {

          header('location: index.php');
        }

        break;
      case 'thanhtoan':
        if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
          $tongtien = $_POST['tongtien'];
          $name = $_POST['name'];
          $address = $_POST['address'];
          $phone = $_POST['phone'];
          $pttt = $_POST['pttt'];
          $madh = "dtung" . rand(0, 99999);
          //tao don hang va gia ve 1 gia tri id
          $iddh = taodonhang($madh, $tongtien, $name, $address, $phone, $pttt);
          $_SESSION['iddh'] = $iddh;
          if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
            foreach ($_SESSION['giohang'] as $item) {
              addcart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4]);
            }
            unset($_SESSION['giohang']);
          }
        }
        include './view/donhang.php';
        break;

      case 'cart':
        include './view/cart.php';
        break;
      case 'signup':
        include './signup.php';
        break;
    }
  } else {
    include "./view/home.php";
  }

  include "./view/footer.php";

  ?>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>