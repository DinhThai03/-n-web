<?php
include_once "connect.php";

function checkuser($tentk, $matkhau)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * from taikhoan where tentk ='" . $tentk . "' and matkhau='" . $matkhau . "' ");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    if (count($kq) > 0)
        return $kq[0]['role'];
    else
        return null;
}
function getuserinfo($tentk, $matkhau)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * from taikhoan where tentk ='" . $tentk . "' and matkhau='" . $matkhau . "' ");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function getalluser()
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from taikhoan");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchALL();
    return $kq;
}
function deltk($matk)
{
    $conn = connectdb();
    $sql = "DELETE from taikhoan where matk =" . $matk;
    $conn->exec($sql);
}


function checkUsernameExists($tentk)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE tentk = :tentk");
    $stmt->bindParam(':tentk', $tentk);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        return true;
    }

    return false;
}

function checkEmailExists($email)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        return true;
    }

    return false;
}

function registerUser($tentk, $matkhau, $ten, $email, $dienthoai, $diachi)
{
    if (checkUsernameExists($tentk)) {
        return "Tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác.";
    }

    if (checkEmailExists($email)) {
        return "Email đã được sử dụng. Vui lòng chọn email khác.";
    }

    $conn = connectdb();
    $stmt = $conn->prepare("INSERT INTO taikhoan (tentk, matkhau, ten, email, dienthoai, diachi) 
                            VALUES (:tentk, :matkhau, :ten, :email, :dienthoai, :diachi)");

    $stmt->bindParam(':tentk', $tentk);
    $stmt->bindParam(':matkhau', password_hash($matkhau, PASSWORD_BCRYPT));
    $stmt->bindParam(':ten', $ten);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':dienthoai', $dienthoai);
    $stmt->bindParam(':diachi', $diachi);

    if ($stmt->execute()) {
        return "Đăng ký thành công!";
    } else {
        return "Đăng ký không thành công. Vui lòng thử lại.";
    }
}

