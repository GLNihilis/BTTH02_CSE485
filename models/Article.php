<?php
class Article {
    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ma_tloai;
    private $tomtat;
    private $noidung;
    private $ma_tgia;
    private $ngayviet;
    private $hinhanh;

    public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        $this->ma_bviet = $ma_bviet;
        $this->tieude = $tieude;
        $this->ten_bhat = $ten_bhat;
        $this->ma_tloai = $ma_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ma_tgia = $ma_tgia;
        $this->ngayviet = $ngayviet;
        $this->hinhanh = $hinhanh;
    }

    // Getter và Setter cho biến $ma_bviet
    public function getMaBviet() {
        return $this->ma_bviet;
    }

    public function setMaBviet($ma_bviet) {
        $this->ma_bviet = $ma_bviet;
    }

    // Getter và Setter cho biến $tieude
    public function getTieuDe() {
        return $this->tieude;
    }

    public function setTieuDe($tieude) {
        $this->tieude = $tieude;
    }

    // Getter và Setter cho biến $ten_bhat
    public function getTenBHat() {
        return $this->ten_bhat;
    }

    public function setTenBHat($ten_bhat) {
        $this->ten_bhat = $ten_bhat;
    }

    // Getter và Setter cho biến $ma_tloai
    public function getMaTLoai() {
        return $this->ma_tloai;
    }

    public function setMaTLoai($ma_tloai) {
        $this->ma_tloai = $ma_tloai;
    }

    // Getter và Setter cho biến $tomtat
    public function getTomTat() {
        return $this->tomtat;
    }

    public function setTomTat($tomtat) {
        $this->tomtat = $tomtat;
    }

    // Getter và Setter cho biến $noidung
    public function getNoiDung() {
        return $this->noidung;
    }

    public function setNoiDung($noidung) {
        $this->noidung = $noidung;
    }

    // Getter và Setter cho biến $ma_tgia
    public function getMaTGia() {
        return $this->ma_tgia;
    }

    public function setMaTGia($ma_tgia) {
        $this->ma_tgia = $ma_tgia;
    }

    // Getter và Setter cho biến $ngayviet
    public function getNgayViet() {
        return $this->ngayviet;
    }

    public function setNgayViet($ngayviet) {
        $this->ngayviet = $ngayviet;
    }

    // Getter và Setter cho biến $hinhanh
    public function getHinhAnh() {
        return $this->hinhanh;
    }

    public function setHinhAnh($hinhanh) {
        $this->hinhanh = $hinhanh;
    }
}
?>