<?php
include("configs/DBConnection.php");
include("models/Author.php");
class AuthorService{
    public function getAllAuthor(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM tacgia ";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $authors = [];
        while($row = $stmt->fetch()){
            $author = new  Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            array_push($authors,$author);
        }
        // Mảng (danh sách) các đối tượng Author Model

        return $authors;
    }
    public function GetAuthorById($ma_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * from tacgia where ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ma_tgia);
        $stmt->execute();
        $row = $stmt->fetch();
        $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
        return $author;
    }
    public function create($name){ 
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->execute();
    }
    public function edit($ma_tgia, $ten_tgia, $hinh_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "UPDATE tacgia SET ten_tgia = ?, hinh_tgia = ? WHERE ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ten_tgia);
        $stmt->bindParam(2, $hinh_tgia);
        $stmt->bindParam(3, $ma_tgia);
        $stmt->execute();
    }
    public function delete($ma_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ma_tgia);
        $stmt->execute();
    }
}