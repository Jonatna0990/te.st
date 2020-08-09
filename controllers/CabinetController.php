<?php
/**
 * Created by PhpStorm.
 * User: HEXAGRAM
 * Date: 09.08.2020
 * Time: 13:41
 */

class CabinetController extends  BaseController
{
    /**
     * Главная страница кабинета
     * @return bool
     */
    public function actionIndex($id = 0)
    {
        $user_id = User::getCurrentUserId();
        if($user_id){
            $user = User::getUserById($user_id);
            if ($user)
            {
                $from_submit = self::getUserFromSubmit($user);
                if($from_submit){
                    $checkUser = User::updateUser($user);
                    if ($checkUser)   Flash::setFlash("Пользователь успешно обновлен", "success" );

                }

            }

        }


        require_once (ROOT.'/views/cabinet/index.php');
        return true;
    }


    /**
     * Возвращает задачу из формы
     * @param User $user
     * @return bool|User пользователь
     */
    protected function getUserFromSubmit(User $user)
    {
        $password = '';
        $name = '';

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $errors = false;

            if(!User::checkName($name))
                Flash::setFlash("ФИО не должно быть короче 4-х символов", "danger" );

            if(!User::checkPassword($password))
                Flash::setFlash("Пароль не должен быть короче 2-х символов", "danger");

            if($errors == false){

                $user->password = $password;
                $user->name = $name;
                return $user;
            }
        }

        return false;

    }


}