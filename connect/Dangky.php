<?php

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
    $stmt = $conn->prepare("INSERT INTO taikhoan (tentk, matkhau, tennguoidung, email, dienthoai, diachi) 
                            VALUES (:tentk, :matkhau, :ten, :email, :dienthoai, :diachi)");

    $stmt->bindParam(':tentk', $tentk);
    $stmt->bindParam(':matkhau', $matkhau);
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
