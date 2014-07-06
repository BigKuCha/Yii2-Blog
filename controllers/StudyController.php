<?php

namespace app\controllers;

use app\controllers\MyController;
use yii\bootstrap\Alert;
use yii\helpers\Security;
use yii\rbac\DbManager;
class StudyController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSc()
    {
        
    }

}
