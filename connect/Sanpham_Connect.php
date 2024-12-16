<?php

function insertdt($maloai,$mahang,$ten,$bonho,$ram,$gia,$mota,$soluong,$hinhanh)
{
    $conn = connectdb();
    $sql = "INSERT INTO dienthoai (maloai, mahang, ten, bonho, ram, gia, mota, soluong, hinhanh) 
            values ($maloai,$mahang,$ten,$bonho,$ram,$gia,$mota,$soluong,$hinhanh)";
    $conn->exec($sql);
}
function searchProducts($timkiem)
{
    $conn = connectdb();
    $sql = "SELECT * FROM dienthoai WHERE ten  LIKE '%" . $timkiem . "%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}

function updatesp($madt, $maloai, $mahang, $ten, $bonho, $ram, $gia, $mota, $soluong, $hinhanh)
{

    // Kết nối cơ sở dữ liệu
    $conn = connectdb();

    // Câu lệnh SQL với placeholders
    $sql = "UPDATE laptops 
                SET
                    madt=:madt,
                    maloai =:maloai,
                    mahang = :mahang, 
                    ten = :ten, 
                    bonho = :bonho, 
                    ram = :ram, 
                    gia = :gia, 
                    mota = :mota, 
                    soluong = :soluong,
                    hinhanh = :hinhanh  WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':madt', $madt);
    $stmt->bindParam(':maloai', $maloai);
    $stmt->bindParam(':mahang', $mahang);
    $stmt->bindParam(':ten', $ten);
    $stmt->bindParam(':bonho', $bonho);
    $stmt->bindParam(':ram', $ram);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':mota', $mota);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->bindParam(':hinhanh', $hinhanh);
    $stmt->execute();
}


function deldt($madt)
{
    $conn = connectdb();
    $sql = "DELETE from dienthoai where madt=" . $madt;
    $conn->exec($sql);
}


function getalldt()
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from dienthoai");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}

function getalldt_byPhanloai($maloai)
{
    $conn = connectdb();
    $sql = "SELECT * FROM dienthoai WHERE 1";

    if ($maloai > 0)
        $sql .= " AND maloai=" . $maloai;

    $stmt = $conn->prepare("$sql");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function getalldt_byPhanloai_Hang($maloai, $mahang)
{
    $conn = connectdb();
    $sql = "SELECT * FROM dienthoai WHERE 1";
    if ($maloai > 0) $sql .= " AND maloai =" . $maloai;
    if ($mahang > 0) $sql .= " AND mahang =" . $mahang;

    $stmt = $conn->prepare("$sql");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function getalldt_byHang($mahang)
{
    $conn = connectdb();
    $sql = "SELECT * FROM dienthoai WHERE 1";
    if ($mahang > 0) $sql .= " AND mahang =" . $mahang;
    $stmt = $conn->prepare("$sql");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function getdetail($id)
{
    if ($id > 0) {
        $sql = "SELECT * FROM dienthoai where madt=" . $id;
        $conn = connectdb();
        $stmt = $conn->prepare("$sql");
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);
        return $kq;
    } else {
        return 0;
    }
}
function getonedt($madt)
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from dienthoai where madt=" . $madt);
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}