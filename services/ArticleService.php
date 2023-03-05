<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $Articles = [];
        while($row = $stmt->fetch()){
            $Article = new Article($row['ma_bviet'],$row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($Articles,$Article);
        }
        return $Articles;
    }
    public function updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
                // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql_update = "UPDATE baiviet SET tieude = '" . $tieude . "' ten_bhat = '". $ten_bhat ."' ma_tloai = '" . $ma_tloai . "' tomtat = '" . $tomtat . "' noidung = '" . $noidung . "' ma_tgia = '" . $ma_tgia . "' ngayviet = '" . $ngayviet . "' hinhanh = '" . $hinhanh . "' WHERE 'ma_bviet' = '" . $ma_bviet . "'";
        $stmt_update = $conn->query($sql_update);

        $sql_select = "SELECT * FROM baiviet";
        $stmt_select = $conn->query($sql_select);

        // B3. Xử lý kết quả
        $Articles = [];
        while($row = $stmt_select->fetch()){
            $Article = new Article($row['ma_bviet'],$row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($Articles,$Article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $Articles;
    }

    public function addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql_add = "INSERT INTO baiviet(tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) VALUES ('" . $tieude . "','". $ten_bhat."','".$ma_tloai."','".$tomtat."','".$noidung."','".$ma_tgia."','".$ngayviet."','".$hinhanh."')";
        $stmt_add = $conn->query($sql_add);

        $sql_select = "SELECT * FROM baiviet";
        $stmt_select = $conn->query($sql_select);

        // B3. Xử lý kết quả
        $Articles = [];
        while($row = $stmt_select->fetch()){
            $Article = new Article($row['ma_bviet'],$row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($Articles,$Article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $Articles;
    }
    public function editArticle($ma_bviet){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = '" . $ma_bviet . "'";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $Articles = [];
        while($row = $stmt->fetch()){
            $Article = new Article($row['ma_bviet'],$row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($Articles,$Article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $Articles;
    }

    public function deleteArticle($ma_bviet){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql_delete = "DELETE FROM baiviet WHERE ma_bviet = '" . $ma_bviet . "'";
        $stmt_delete = $conn->query($sql_delete);

        $sql_select = "SELECT * FROM baiviet; ALTER TABLE baiviet AUTO_INCREMENT = 1";
        $stmt_select = $conn->query($sql_select);

        // B3. Xử lý kết quả
        $Articles = [];
        while($row = $stmt_select->fetch()){
            $Article = new Article($row['ma_bviet'],$row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($Articles,$Article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $Articles;
    }

    // Tên thể loại theo mã thể loại
    public function getCatNameById($id){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $sql = "SELECT ten_tloai FROM theloai WHERE ma_tloai = '".$id."'";
        $stmt = $conn->query($sql);
        // B3. Lấy dữ liệu trả về
        $ten_tloai = $stmt->fetchColumn();
        // In ra tên thể loại
        return $ten_tloai;
    }

    // Tên tác giả theo mã tác giả
    public function getAuNameById($id){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $sql = "SELECT ten_tgia FROM tacgia WHERE ma_tgia = '".$id."'";
        $stmt = $conn->query($sql);
        // B3. Lấy dữ liệu trả về
        $ten_tgia = $stmt->fetchColumn();
        // In ra tên tác giả
        return $ten_tgia;
    }

    // Danh sách các thể loại
    public function getAllCategorys(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categorys = [];
        while($row = $stmt->fetch()){
            $categorys[$row['ma_tloai']] = $row['ten_tloai'];
        }
        return $categorys;
    }

    // Danh sách các tác giả
    public function getAllAuthor(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $authors = [];
        while($row = $stmt->fetch()){
            $authors[$row['ma_tgia']] = $row['ten_tgia'];
        }
        return $authors;
    }
}
?>