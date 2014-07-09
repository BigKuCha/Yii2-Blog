<?php

namespace app\controllers;

use Yii;
use app\controllers\MyController;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use app\models\Column;
/**
 * AtcController implements the CRUD actions for Article model.
 */
class AtcController extends MyController
{
    public function behaviors()
    {
        return [
            'access' => [
              'class' => \yii\filters\AccessControl::className(),
//              'only' => ['index','view','create', 'update'],
              'rules' => [
                  // allow authenticated users
                  [
                      'allow' => true,
                      'roles' => ['@'],
                  ],
                  [
                      'allow'=>false,
                      'roles'=>['?']
                  ],
                  // everything else is denied
              ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post()))
        {
            $up = UploadedFile::getInstance($model, 'image');
            if(!$up->getHasError())
            {
                $dir = "upload/images/";
                FileHelper::createDirectory($dir);
                $model->image = $dir.date('Ymdhis').rand(1000,9999).'.'.$up->getExtension();
                $up->saveAs($model->image);
            }
            if($model->validate() && $model->save())
                return $this->redirect(['view', 'id' => $model->id]);
            else
                var_dump($model->getErrors ());
        } else
        {
            return $this->render('create', [
                'model' => $model,
                'columns'=>  Column::getcols(),
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(!$model)
            throw new NotFoundHttpException;
        if ($model->load(Yii::$app->request->post()))
        {
            $up = UploadedFile::getInstance($model, 'image');
            if(!$up->getHasError())
            {
                $dir = "upload/images/";
                FileHelper::createDirectory($dir);
                $model->image = $dir.date('Ymdhis').rand(1000,9999).'.'.$up->getExtension();
                $up->saveAs($model->image);
            }else
                $model->image = $model->getOldAttribute('image');
            if($model->validate())
            {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
                var_dump ($model->getErrors ());
        } else {
            return $this->render('update', [
                'model' => $model,
                'columns'=>  Column::getcols(),
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
