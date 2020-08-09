<?php
class OrderController extends BaseController
{

    const ITEMS_ON_PAGE = 30;
    public function actionIndex($page = 0)
    {
        $orderTotal = Order::getTotalOrderCount();
        $orderList = Order::getOrderList($page, self::ITEMS_ON_PAGE);
        $pagination = new Pagination($orderTotal, $page, self::ITEMS_ON_PAGE,'page-');
        require_once (ROOT.'/views/order/index.php');
        return true;
    }
    public function actionUsers($page = 0)
    {
        $userTotal = User::getTotalUsersCount();
        $userList = User::getUsersList($page, self::ITEMS_ON_PAGE);
        $pagination = new Pagination($userTotal, $page, self::ITEMS_ON_PAGE,'page-');
        require_once (ROOT.'/views/order/users.php');
        return true;

    }
    public function actionQuery()
    {

        $users = User::usersWithDuplicateEmail();
        $users_no_orders = User::usersWithNoOrders();
        $users_with_orders = User::usersWithMoreOrders(2);
        require_once (ROOT.'/views/order/query.php');
        return true;

    }


}