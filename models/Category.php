<?php
    class Category{
        public $ma_tloai;
        public $ten_tloai;

        public function __construct($ma_tloai,$ten_tloai){
            $this->ma_tloai=$ma_tloai;
            $this->ten_tloai=$ten_tloai;
        }
        public function getMa_tloai() {
            return $this->ma_tloai;
        }
    
        public function setMa_tloai($ma_tloai) {
            $this->ma_tloai = $ma_tloai;
        }
    
        public function getTen_tloai() {
            return $this->ten_tloai;
        }
    
        public function setTen_tloai($ten_tloai) {
            $this->ten_tloai = $ten_tloai;
        }
    }
?>