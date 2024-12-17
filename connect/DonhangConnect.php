<?php
// function taodonhang($madh, $tongtien, $name, $address, $phone, $pttt)
// {
//     $conn = connectdb();
//     $sql = "INSERT INTO donhang (madh,tongtien,name,address,phone,pttt) VALUES ('" . $madh . "','" . $tongtien . "','" . $name . "','" . $address . "','" . $phone . "','" . $pttt . "')";
//     $conn->exec($sql);
//     $last_id = $conn->lastInsertId();
//     return $last_id;
// }
function taodonhang($matk, $tongtien)
{
    $conn = connectdb();
    $sql = "INSERT INTO don (matk,tongtien) VALUES ($matk, $tongtien)";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function  addcart($magh, $matk, $madt, $soluong)
{
    $conn = connectdb();

    // Kiểm tra xem laptop_id có tồn tại trong bảng laptops không
    $sql_check = "SELECT madt FROM dienthoai WHERE madt = :madt";
    $stmt = $conn->prepare($sql_check);
    $stmt->bindParam(':madt', $madt, PDO::PARAM_INT);
    $stmt->execute();
    // Nếu laptop_id tồn tại, thực hiện thêm vào bảng chitietdonhang
    $sql = "INSERT INTO chitiethd (magh,matk,madt,soluong)
            VALUES (:iddh, :magh, :matk, :madt, :soluong)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':magh', $magh, PDO::PARAM_INT);
    $stmt->bindParam(':matk', $matk, PDO::PARAM_INT);
    $stmt->bindParam(':madt', $madt, PDO::PARAM_STR);

    $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
    $stmt->execute();
}

function getshowcart($magh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * from chitiethd WHERE magh=" . $magh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchALL();
    return $kq;
}

function getorderinfo($magh)

{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * from don WHERE magh=" . $magh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchALL();
    return $kq;
}
function addCartByid($magh, $matk, $madt, $soluong)
{
    $conn = connectdb();

    $sql_insert = "INSERT INTO giohang () VALUES (magh,matk,madt,soluong)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':magh', $id_tk, PDO::PARAM_INT);
    $stmt->bindParam(':matk', $laptop_id, PDO::PARAM_INT);
    $stmt->bindParam(':madt', $tensp, PDO::PARAM_STR);
    $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
    $stmt->execute();
}
function getCartByUserId($matk)
{
    $conn = connectdb();

    $sql = "SELECT * FROM giohang WHERE matk = :matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':matk', $matk, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCart()
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from giohang");
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}

function getAllCart_DT($matk)
{
    $conn = connectdb();
    $stmt = $conn->prepare("select magh, ten, hinhanh, gia, g.soluong from giohang g join dienthoai d on g.madt = d.madt where matk = $matk");
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}

function insert_Cart($matk, $madt, $sl)
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from giohang where matk = $matk and madt = $madt");
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($kq) == 0) {
        $sql = "INSERT INTO giohang( matk, madt, soluong) values ($matk, $madt, $sl)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        $sql = "update giohang set soluong = soluong + $sl where matk = $matk and madt = $madt";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}

function delete_Cart($magh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("delete from giohang WHERE magh = $magh");
    $stmt->execute();
}
