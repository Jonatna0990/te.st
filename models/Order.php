<?php
/**
 * Created by PhpStorm.
 * User: HEXAGRAM
 * Date: 09.08.2020
 * Time: 14:45
 */

class Order
{
    public $id;
    public $user_id;
    public $price;


    const SORT_BY_ID = 'id';
    const SORT_BY_USER_ID= 'user_id';
    const SORT_BY_PRICE = 'price';

    const SORT_ASC = 'ASC';
    const SORT_DESC = 'DESC';


    const SHOW_BY_DEFAULT = 3;


    public static $TABLE_NAME = 'orders';


    /**
     * Возвращает список заказов
     * @param int $page Номер страницы
     * @param int $limit Количество элементов на странице
     * @param string $sort_column Колонка для сортировки
     * @param string $sort_by Направление сортировки
     * @return array Возвращает массив задач
     */
    public static function getOrderList($page = 1, $limit = self::SHOW_BY_DEFAULT, $sort_column = self::SORT_BY_ID, $sort_by = self::SORT_ASC)
    {
        if($page <= 0) $page = 1;
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();
        $sql = 'SELECT * from '.self::$TABLE_NAME.' ORDER BY  '.$sort_column.' '.$sort_by.' LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);
        $result->bindParam(':limit',$limit,PDO::PARAM_INT);
        $result->bindParam(':offset',$offset,PDO::PARAM_INT);
        $result->execute();

        $orderList = array();
        $i = 0;
        while ($row = $result->fetch())
        {
            $order = self::getOrderFromRow($row);
            $orderList[$i] = $order;
            $i++;
        }
        return $orderList;

    }



    /**
     * Получить заказ из запросв
     * @param $row результат запроса
     * @return bool|User возвращает пользователя
     */
    public static function getOrderFromRow($row)
    {
        if($row)
        {
            $order = new Order();
            $order->id = $row['id'];
            $order->user_id = $row['user_id'];
            $order->price = $row['price'];
            return $order;
        }
        return false;
    }


    /**
     * Возращает общее количество заказов
     */
    public static function getTotalOrderCount()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(id) as count from '.self::$TABLE_NAME);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];

    }



}