<?php

namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function checkPassword($password, $db_password)
    {
        return password_verify($password, $db_password);
    }
}

?>