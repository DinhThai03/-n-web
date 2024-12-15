<?php

function getAllHang()
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from hang");
    $stmt->execute();
    $kq = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $kq;
}
function insertnsx($mahang, $ten, $mota)
{
    $conn = connectdb();
    $sql = "INSERT INTO hang (mahang, ten, mota) VALUES ('" . $mahang . "','" . $ten . "','" . $mota . "')";
    $conn->exec($sql);
}
function deletehang($mahang)
{
    $conn = connectdb();
    $sql = "DELETE from hang where maha=" . $mahang;
    $conn->exec($sql);
}

function getTenHang($mahang){
    $conn = connectdb();
    $sql = "select ten from hang where mahang = $mahang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $ten = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $ten[0];
}