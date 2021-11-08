<?php
namespace App\Libraries;

class Hash{
    public static function make($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public static function check($entered_password, $hash){
        if(password_verify($entered_password, $hash)){
            return true;
        }else{
            return false;
        }
    }
}

?>