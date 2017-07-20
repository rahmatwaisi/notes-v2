<?php

/**
 * Created by PhpStorm.
 * User: Mr648
 * Date: 7/11/2017
 * Time: 4:36 PM
 */
class UserController {

    public function __construct() {
    }

    public function login() {

        if (isset($_POST['email'])) {
            $this->loginCheck();
        } else {
            $this->showLoginForm();
        }
    }

    public function logout(){
        if (isset($_SESSION['email'])) {
            $this->logoutFromAccount();
        } else {
            message('fail', _already_logged_out , true);
        }
    }

    private function logoutFromAccount(){
        session_destroy();
        message('success', _successfully_logged_out , true);
    }
    private function loginCheck() {

        $email = $_POST['email'];
        $password = strtolower($_POST['password']);


        $record = UserModel::fetch_by_email($email);

        if ($record == null) {
            message('fail',_email_not_registered, true );
        } else {
            $hashedPassword = encryptPassword($password);
            if ($hashedPassword == $record['password']) {
                $_SESSION['email'] = $record['email'];
                $_SESSION['user_id'] = $record['user_id'];
                message('success',_login_welcome, true );
            } else {
                message('fail',_invalid_password, true );
            }
        }
    }

    private function showLoginForm() {
        View::render("user/login.php", null);
    }

    public function register() {

        if (isset($_POST['email'])) {
            $this->registerCheck();
        } else {
            $this->showRegisterForm();
        }
    }

    private function registerCheck() {

        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $name = $_POST['name'];
        $nickname = $_POST['nickname'];
        $time = getCurrentDateTime();

        $record = UserModel::fetch_by_email($email);
        if ($record != null) {
            message('fail',_already_registered, true );
        }

        if (strlen($password1) < 3 || strlen($password2) < 3) {
            message('fail',_weak_password, true );
        }

        if ($password1 != $password2) {
            message('fail',_password_not_match, true );
        }

        $hashedPassword = encryptPassword($password1);

        UserModel::insert($email, $name, $nickname, $hashedPassword,  $time);
        message('success',_successfully_registered, true );
    }


    private function showRegisterForm(){
        View::render("user/register.php", null);
    }


}