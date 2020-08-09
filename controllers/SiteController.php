<?php

/**
 * Главный контроллер сайта
 */
class SiteController extends BaseController
{
    /**
     * Главная страница
     * @return bool
     */
    public function actionIndex()
    {
        require_once (ROOT.'/views/site/login.php');
        return true;
    }

    /**
     * Вход на сайт
     * @return bool
     */
    public function actionLogin()
    {

        if(!User::isGuest())
        {
            header("Location: /cabinet");
        }

        $login = '';
        $password = '';
        if(isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $errors = false;

            if(!User::checkLogin($login))
                Flash::setFlash("Логин не должен быть короче 2-х символов", "danger", true, '/login');

            if(!User::checkPassword($password))
                Flash::setFlash("Пароль не должен быть короче 2-х символов", "danger", true, '/login');

            if($errors == false){
                $checkUser = User::checkUser($login, $password);
                if($checkUser)
                {
                    User::userLogin($checkUser->id);
                }
                else
                {
                    $password = '';
                    Flash::setFlash("Неверный логин или пароль", "danger", true, '/login');
                }

            }
        }
        require_once (ROOT.'/views/site/login.php');
        return true;
    }

    /**
     * Регистрация на сайте
     */
    public function actionRegistration()
    {

        $login = '';
        $password = '';
        $name = '';
        if(isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $errors = false;

            if(!User::checkLogin($login))
                Flash::setFlash("Логин не должен быть короче 2-х символов", "danger", true, '/registration');

            if(!User::checkPassword($password))
                Flash::setFlash("Пароль не должен быть короче 2-х символов", "danger", true, '/registration');

            if(!User::checkName($name))
                Flash::setFlash("ФИО не должно быть короче 4-х символов", "danger", true, '/registration');

            if($errors == false){
                $checkUser = User::getUserByEmail($login, $password);
                if(!$checkUser){
                    $user = new User();
                    $user->password = $password;
                    $user->name = $name;
                    $user->login = $login;
                    $user->email = '';
                    $res = User::addUser($user);
                    if($res){
                        Flash::setFlash("Пользователь успешно зарегистрирован", "success", true, '/cabinet');

                    }
                }
                else
                {
                    $password = '';
                    Flash::setFlash("Пользователь уже существует", "danger", true, '/registration');
                }

            }
        }
        require_once (ROOT.'/views/site/registration.php');
        return true;
    }







}