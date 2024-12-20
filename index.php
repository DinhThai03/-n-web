<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
include "./connect/connect.php";
include "./connect/Sanpham_Connect.php";
include "./connect/Phanloai_Connect.php";
include "./connect/HangConnect.php";
include "./connect/User_Connect.php";
include "./connect/Dangky.php";
include "./connect/DonhangConnect.php";
$hang = getAllHang();
$dssp = getalldt();
?>

<!DOCTYPE html>
<html lang="en">

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
          if ($kq != null) {
            $role = $kq[0]['phanquyen'];
            if ($role == 1) {
              $_SESSION['phanquyen'] = $role;
              header('location: ./admin/index.php?page_layout=taikhoan');
            } else {
              $_SESSION['phanquyen'] = $role;
              $_SESSION['matk'] = $kq[0]['matk'];

              $_SESSION['tentk'] = $kq[0]['tentk'];

              header('location: index.php');
            }
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
        if (isset($_SESSION['matk'])) {
          $matk = $_SESSION['matk'];
          if (isset($_POST['addtocart'])) {
            if (isset($_POST['madt'])) {

              $madt = $_POST['madt'];
              $soluong = 1;
              if (isset($_POST['soluonng']))
                $soluong = $_POST['soluong'];
              insert_Cart($matk, $madt, $soluong);
              header('location: index.php?page_layout=cart');
            }
          }
        } else
          header('location: index.php?page_layout=login');
        break;
      case 'delcart':
        if (isset($_GET['magh'])) {
          $magh = $_GET['magh'];
          delete_Cart($magh);
          header('location: index.php?page_layout=cart');
        }

        break;
      case 'thanhtoan':
        if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
          $tongtien = $_POST['tongtien'];
          $address = $_POST['address'];
          $phone = $_POST['phone'];
          $pttt = $_POST['pttt'];
          $madh = "dtung" . rand(0, 99999);
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