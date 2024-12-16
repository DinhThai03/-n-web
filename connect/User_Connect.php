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

