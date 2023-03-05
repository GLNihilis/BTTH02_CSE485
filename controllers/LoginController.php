<?php
include("services/LoginServices.php");
    class LoginController
    {
        public function index()
        {
            include("views/home/login.php");
        }

        public function Authentication()
        {
            $username = $_POST['username'] ?? '';
            $passowrd = $_POST['password'] ?? '';
            if($username != '' and $passowrd != '')
            {
                $authentication = new LoginService();
                if($authentication -> CheckLogin($username,$passowrd))
                {
                    header('Location: ?controller=admin');
                }
                else
                {
                    $message = "Invalid Data";
                    include("view/home/login.php");
                }
            }
        }
    }
?>