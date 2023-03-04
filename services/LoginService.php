<?php
include("config/DBconnection.php");
include("models/Login.php");
class LoginService
{
    public function CheckLogin($username, $password)
    {
        $db = new DBConnection();
        $conn = $db -> getConnection();

        $sql = "SELECT * FROM users WHERE user = '$username' AND pass = '$password'";
        $stmt = $conn -> query($sql);
        return $stmt -> fetch();
    }
}
?>