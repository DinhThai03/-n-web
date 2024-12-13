<?php

function getallLoai()
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from phanloai");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function getallLoai_byID($mahang)
{
    $conn = connectdb();
    $sql = "SELECT distinct pl.maloai, pl.tenloai from dienthoai dt join phanloai pl on dt.maloai = pl.maloai where dt.mahang = " . $mahang;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function insertcate($ten, $mahang)
{
    $conn = connectdb();
    $sql = "INSERT INTO laptop_categories (tenloaisanpham,manhasanxuat) VALUES ('" . $ten . "','" . $mahang . "')";
    $conn->exec($sql);
}
function getonecate($ma)
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from phanloai where id=" . $ma);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchALL();
    return $kq;
}

function updatecate($id, $ten, $mahang)
{
    $conn = connectdb();
    $sql = "UPDATE phanloai 
                SET
                    tenloaisanpham = " .$ten 
                    .", manhasanxuat = " .$mahang 
                   
                 ." WHERE id =" .$id;

    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function delcate($id)
{
    $conn = connectdb();
    $sql = "DELETE from phanloai where id=" . $id;
    $conn->exec($sql);
}
