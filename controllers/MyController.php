<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyController
 *
 * @author 95
 */

namespace app\controllers;
use yii\web\Controller;
header("Content-type:text/html;charset=utf-8");
class MyController extends Controller
{
    public function db2()
    {
        return \Yii::$app->db2;
    }
    /**
     * 
     * @param string $str
     * @return type
     */
    public function hash($str)
    {
        return md5($str);
    }
}
