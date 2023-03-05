<?php
require("services/AuthorService.php");
class AuthorController
{
    // Hàm xử lý hành động index
    public function index()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from author";
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        // echo "Tương tác với View from author";
        include "views/author/author.php";
    }

    public function add()
    {
        if(isset($_POST['txtAutName'])){
            $name = $_POST['txtAutName'];
            $image_path = $_POST['path'].$_FILES['img']['name'];
            $name_image = $_FILES['img']['name'];
            $authorService = new AuthorService();
            $authorService->create($name, $name_image);
            move_uploaded_file($_FILES['img']['tmp_name'], $image_path);
            header("Location: index.php?controller=author&action=index");
        }else{
            include "views/author/add_author.php";
        }
    }
    public function edit(){
        if(isset($_POST['txtAutId'])){
            $ma_tgia = $_POST['txtAutId'];
            $name = $_POST['txtAutName'];
            $image_path = $_POST['path'].$_FILES['img']['name'];
            $name_image = $_FILES['img']['name'];
            $authorService = new AuthorService();
            $authorService->edit($ma_tgia, $name, $name_image);
            move_uploaded_file($_FILES['img']['tmp_name'], $image_path);
            header("Location: index.php?controller=author&action=index");
        }else{
            $ma_tgia = $_GET['ma_tgia'];
            $authorService = new AuthorService();
            $author = $authorService->getAuthorById($ma_tgia);
            include "views/author/edit_author.php";
        }
    }
    public function delete()
    {
        if (isset($_GET['ma_tgia'])) {
            $authorService = new AuthorService();
            $ma_tgia = $_GET['ma_tgia'];
            $authorService->delete($ma_tgia);
        }
        header("Location: index.php?controller=author&action=index");
    }

    public function list()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from author";
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/list_author.php");
    }
}
