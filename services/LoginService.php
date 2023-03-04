<?php
class LoginService
{
    protected $user;

    public function __construct(User $user)
    {
        $this -> user = $user
    }

    public function getAllUsers(
        {
            try{
                return $this -> user -> all() -> toArray();
            } catch (Exception $exception) {
                throw new Exception($exception -> getMessage());
            }
        }
    )
}
?>