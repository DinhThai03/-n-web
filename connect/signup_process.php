<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $conn = connectdb(); // Kết nối đến cơ sở dữ liệu

    if ($conn) {
        // Lấy thông tin từ form
        $tentk = $_POST['tentk'];
        $tennguoidung = $_POST['tennguoidung'];
        $matkhau = $_POST['matkhau'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];

        // Kiểm tra xem username đã tồn tại chưa
        $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE tentk = :tentk");
        $stmt->execute(['tentk' => $tentk]);
        $user = $stmt->fetch();

        if ($user) {
            echo "Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.";
        } else {
            // Chuẩn bị truy vấn để chèn thông tin người dùng
            $sql = "INSERT INTO taikhoan (tentk, tennguoidung, matkhau, email, dienthoai, diachi) VALUES (:tentk, :tennguoidung,:matkhau,:email,:dienthoai,:diachi)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute(['tentk' => $tentk, 'tennguoidung' => $tennguoidung, 'matkhau' => $matkhau, 'email' => $email, 'dienthoai' => $dienthoai, 'diachi' => $diachi])) {
                echo "Đăng ký thành công!";
                header('location: ./index.php');
            } else {
                echo "Có lỗi xảy ra!";
            }
        }
    } else {
        echo "Kết nối cơ sở dữ liệu thất bại!";
    }
}