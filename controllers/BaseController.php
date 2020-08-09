<?php

class BaseController
{
    /**
     * Выход из учетной записи
     */
    public function actionLogout()
    {
        User::userLogout();
    }



}