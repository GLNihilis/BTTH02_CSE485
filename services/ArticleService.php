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
        $sql_delete = "DELETE FROM baiviet WHERE ma_ma_bviet = '" . $ma_bviet . "'";
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
}
?>