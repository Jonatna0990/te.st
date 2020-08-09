<?php
return array(
    'login' => 'site/login',
    'logout' => 'site/logout',
    'registration'=>'site/registration',
    'cabinet'=>'cabinet/index',
    'orders/page-([0-9]+)' => 'order/index/$1',
    'orders'=>'order/index',
    'users/page-([0-9]+)' => 'order/users/$1',
    'users'=>'order/users',
    'queries'=>'order/query',
    '' => 'site/login',
);