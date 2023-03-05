<?php

$filename = isset($filename) ? $filename : null;
$name = $_POST['txtAutName'];
if(isset($_POST['txtAutId'])){
    $id = $_POST['txtAutId'];
    if ($filename) {
        $sql = "UPDATE `tacgia` SET `ten_tgia`='" . $name . "', `hinh_tgia`='" . $filename . "' WHERE `ma_tgia` = '" . $id . "'";
    } else {
        $sql = "UPDATE `tacgia` SET `ten_tgia`='" . $name . "' WHERE `ma_tgia` = '" . $id . "'";
    }
}else{
    if ($filename) {
        $sql = "INSERT INTO `tacgia`(`ten_tgia`, `hinh_tgia`) VALUES ('" . $name . "', '" . $filename . "')";
    } else {
        $sql = "INSERT INTO `tacgia`(`ten_tgia`) VALUES ('" . $name . "')";
    }
}
 
