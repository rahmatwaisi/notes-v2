<?php
class UserModel{
    public static function insert($email, $name, $nickname, $hashedPassword,  $time){
        $db = Db::getInstance();
        $db->insert("INSERT INTO x_user
              (  email,  fullname,  family,    password, registerDate, lastVisitTime) VALUES
              ('$email', '$name', '$nickname', '$hashedPassword',  '$time',     '$time')");
    }

    public static function fetch_by_email($email){
        $db = Db::getInstance();
        return $db->first("SELECT * FROM x_user WHERE email='$email'");
    }


}