<?php

class User
{
    public $id;
    public $login;
    public $email;
    public $password;
    public $name;


    const SORT_BY_ID = 'id';
    const SORT_BY_USER_ID= 'user_id';
    const SORT_BY_PRICE = 'price';

    const SORT_ASC = 'ASC';
    const SORT_DESC = 'DESC';

    const SHOW_BY_DEFAULT = 3;

    public static $TABLE_NAME = 'users';


    /**
     * Проверяет логин(не может быть меньше 2 символов)
     * @param $login Логин
     * @return bool Валидный ли логин
     */
    public static function checkLogin($login)
    {
        if(strlen($login) >= 2){
            return true;
        }
        return false;
    }
    /**
     * Проверяет пароль(не может быть меньше 3 символов)
     * @param $password Пароль
     * @return bool Валидный ли пароль
     */
    public static function checkPassword($password)
    {
        if(strlen($password) >= 3){
            return true;
        }
        return false;
    }


    /**
     * Проверяет имя(не может быть меньше 4 символов)
     * @param $name Имя
     * @return bool Валидное ли имя
     */
    public static function checkName($name)
    {
        if(strlen($name) >= 4){
            return true;
        }
        return false;
    }

    /**
     * Проверка пользователя на логин и пароль
     * @param $login Логин пользователя
     * @param $password Пароль пользователя
     * @return bool Возвращает пользователя, если он найден или false в противном случае
     */
    public static function checkUser($login, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * from '.self::$TABLE_NAME.' where login= :login AND password= :password';

        $result = $db->prepare($sql);
        $result->bindParam(':login',$login,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        return self::getUserFromRow($row);
    }



    /**
     * Возвращает пользователя по id
     * @param integer $id
     * @return mixed Пользователь
     */
    public static function getUserById($id)
    {
        $id = intval($id);
        if($id)
        {
            $db = Db::getConnection();
            $sql = 'SELECT * from '.self::$TABLE_NAME.' where id= :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch();
            return self::getUserFromRow($row);

        }
    }
    /**
     * Возвращает пользователя по email
     * @param string $email email
     * @return mixed Пользователь
     */
    public static function getUserByEmail($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * from '.self::$TABLE_NAME.' where email= :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_INT);
        $result->execute();

        $userList = array();
        $i = 0;
        while ($row = $result->fetch())
        {
            $order = self::getUserFromRow($row);
            $orderList[$i] = $order;
            $i++;
        }
        return $userList ;

    }
    /**
     * Добавляет пользователя в БД
     * @param User $user пользователь
     * @return bool Успешно ли выполнена операция
     */
    public static function addUser(User $user)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO  '.self::$TABLE_NAME.' (`login`, `email`,`password`, `name`) VALUES (:login, :email, :password, :name)';

        $result = $db->prepare($sql);
        $result->bindParam(':login',$user->login,PDO::PARAM_STR);
        $result->bindParam(':email',$user->email,PDO::PARAM_STR);
        $result->bindParam(':password',$user->password,PDO::PARAM_STR);
        $result->bindParam(':name',$user->name,PDO::PARAM_STR);

        return $result->execute();
    }


    /**
     * Обновляет пользователя в БД
     * @param User $user пользователь
     * @return bool Успешно ли выполнена операция
     */
    public static function updateUser(User $user)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE '.self::$TABLE_NAME.' SET name=:name, password=:password WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':name',$user->name,PDO::PARAM_STR);
        $result->bindParam(':password',$user->password,PDO::PARAM_STR);
        $result->bindParam(':id',$user->id,PDO::PARAM_STR);
        return $result->execute();
    }


    /**
     * Вход пользователя
     * @param $id
     */
    public static function userLogin($id)
    {
        $_SESSION['user'] = $id;
        header('Location: /cabinet');
    }

    /**
     * Выход пользователя
     */
    public static function userLogout()
    {
        unset($_SESSION['user']);
        header('Location: /login');

    }

    /**
     * Пользователь уже залогинен
     * @return mixed Возвращает идентефикатор пользователя в случае усеха и показывает страницу входа в противном случае
     */
    public static function checkLogged()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
        header('Location: /login');
    }

    /**
     * Является ли пользователь гостем
     */
    public static function isGuest()
    {

        return !isset($_SESSION['user']);
    }


    /**
     * Id авторизованного пользователя
     * @return null
     */
    public static function getCurrentUserId()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
        return null;
    }

    /**
     * Получить пользователя из запросв
     * @param $row результат запроса
     * @return bool|User возвращает пользователя
     */
    public static function getUserFromRow($row)
    {
        if($row)
        {
            $user = new User();
            $user->id = $row['id'];
            $user->login = $row['login'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->name = $row['name'];
            return $user;
        }
        return false;
    }


    /**
     * Возвращает список пользователей
     * @param int $page Номер страницы
     * @param int $limit Количество элементов на странице
     * @param string $sort_column Колонка для сортировки
     * @param string $sort_by Направление сортировки
     * @return array Возвращает массив задач
     */
    public static function getUsersList($page = 1, $limit = self::SHOW_BY_DEFAULT, $sort_column = self::SORT_BY_ID, $sort_by = self::SORT_ASC)
    {
        if($page <= 0) $page = 1;
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();
        $sql = 'SELECT * from '.self::$TABLE_NAME.' ORDER BY  '.$sort_column.' '.$sort_by.' LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);
        $result->bindParam(':limit',$limit,PDO::PARAM_INT);
        $result->bindParam(':offset',$offset,PDO::PARAM_INT);
        $result->execute();

        $userList = array();
        $i = 0;
        while ($row = $result->fetch())
        {
            $user = self::getUserFromRow($row);
            $userList[$i] = $user;
            $i++;
        }
        return $userList;

    }

    /**
     * Возращает общее количество пользователей
     */
    public static function getTotalUsersCount()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(id) as count from '.self::$TABLE_NAME);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];

    }


    /**
     * Возращает список email'лов, встречающихся более чем у одного пользователя
     * @return mixed
     */
    public static function usersWithDuplicateEmail()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT email, COUNT(email) as count FROM '.self::$TABLE_NAME.' GROUP BY email HAVING COUNT(email) > 1');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userList = array();
        $i = 0;
        while ($row = $result->fetch())
        {

            $userList[$i] = $row;
            $i++;
        }
        return $userList;
    }

    /**
     * Возращает список пользователей, которые не сделали ни одного заказа
     */
    public static function usersWithNoOrders()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT u.login, u.id FROM '.self::$TABLE_NAME.' u LEFT JOIN '.Order::$TABLE_NAME.' o ON u.id = o.user_id WHERE o.user_id IS NULL');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userList = array();
        $i = 0;
        while ($row = $result->fetch())
        {

            $userList[$i] = $row;
            $i++;
        }
        return $userList;
    }

    /**
     * Возращает список пользователей, которые сделали заказов, более чем count
     * @param int $count болле чем
     * @return array Возращает список пользователей
     */
    public static function usersWithMoreOrders($count)
    {
        $count = intval($count);
        if($count)
        {
            $db = Db::getConnection();
            $result = $db->query('SELECT u.login, u.id, COUNT(*) AS count FROM '.Order::$TABLE_NAME.' AS o INNER JOIN '.self::$TABLE_NAME.' AS u ON o.user_id= u.id GROUP BY u.id HAVING count(*)>'.$count);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $userList = array();
            $i = 0;
            while ($row = $result->fetch())
            {

                $userList[$i] = $row;
                $i++;
            }
            return $userList;
        }
        return false;


    }
}