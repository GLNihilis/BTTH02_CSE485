<?php
    require("services/ArticleService.php");
    class ArticleController
    {
        // Hàm xử lý hành động index
        public function index(){
            $articleService = new ArticleService();
            $articles = $articleService->getAllArticles();
            include("views/article/list_article.php");
        }
        public function update(){
            $articleService = new ArticleService();
            $articles = $articleService->updateArticle($_POST['txtMaBViet'],$_POST['txtTieuDe'],$_POST['txtTenBaiHat'],$_POST['txtTheLoai'],$_POST['txtTomTat'],$_POST['txtNoiDung'],$_POST['txtTacGia'],$_POST['txtNgayViet'],$_POST['txtHinhAnh']);
            
            include("views/article/list_article.php");
        }
        public function create(){
            $articleService = new ArticleService();
            $categorys = $articleService->getAllCategorys();
            $authors = $articleService->getAllAuthor();
            include("views/article/add_article.php");
        }

        public function add(){
            $ngayviet = date("Y-m-d H:i:s");
            $articleService = new ArticleService();
            $articles = $articleService->addArticle($_POST['txtTieuDe'],$_POST['txtTenBaiHat'],$_POST['txtTheLoai'],$_POST['txtTomTat'],$_POST['txtNoiDung'],$_POST['txtTacGia'],$ngayviet,$_POST['txtHinhAnh']);

            include("views/article/list_article.php");
        }
        public function edit($ma_bviet){
            $articleService = new ArticleService();
            $article = $articleService->editArticle($ma_bviet);
            $categorys = $articleService->getAllCategorys();
            $authors = $articleService->getAllAuthor();
            include("views/article/edit_article.php");
        }
        public function delete(){
            $articleService = new ArticleService();
            $articles = $articleService->deleteArticle($_GET['id']);

            include("views/article/list_article.php");
        }
    }

?>