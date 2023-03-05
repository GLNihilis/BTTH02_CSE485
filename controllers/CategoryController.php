<?php
    require("services/CategoryService.php");
    class CategoryController
    {
        // Hàm xử lý hành động index
        public function index(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->getAllCategorys();

            include("views/category/category.php");
        }
        public function update(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->updateCategory($_POST['txtCatId'],$_POST['txtCatName']);
            
            include("views/category/category.php");
        }
        public function create(){
            include("views/category/add_category.php");
        }

        public function add(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->addCategory($_POST['txtCatName']);

            include("views/category/category.php");
        }
        public function edit($id){
            $categoryService = new CategoryService();
            $category = $categoryService->editCategory($id);

            include("views/category/edit_category.php");
        }
        public function delete(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->deleteCategory($_GET['id']);

            include("views/category/category.php");
        }
    }

?>