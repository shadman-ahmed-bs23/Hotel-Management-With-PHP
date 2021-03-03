<?php

class Auth extends DbConnect
{
    public function isAdmin()
    {
        $query = "SELECT * FROM admin WHERE username = :username AND password = :password";
        $statement = $this->connect()->prepare($query);
        $statement->execute(
            array(
                'username' => $_POST["username"],
                'password' => $_POST["password"],
            )
        );

        $count = $statement->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
}