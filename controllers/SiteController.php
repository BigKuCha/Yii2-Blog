<?php
namespace app\controllers;

use Yii;
use app\controllers\MyController;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use yii\data\Pagination;
use yii\helpers\StringHelper;
class SiteController extends MyController
{
    public function init() {
//        $this->on(self::EVENT_BEFORE_ACTION, function (){
//            echo 33;exit;
//        });
        //layouts传值
        $columns = \app\models\Column::find()->select('id,columnname')->all();
        $this->view->params['columns'] = $columns;
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
//            'say'=>[
//                'class'=>  \app\behaviors\say::className(),
//                'name'=>'Kity',
//                'age'=>'22',
//            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'news' =>[
                'class'=>'app\actions\NewAction',
            ],
        ];
    }
    /**
     * 首页
     * @return type
     */
    public function actionIndex()
    {
//        $list = Article::find()->hot()->with('columns')->limit(5)->orderBy('addtime desc')->all();
        $list = Article::find()->hot()->limit(5)->orderBy('addtime desc')->all();
        return $this->render('index',['list'=>$list]);
    }
    /**
     * 文章详情页
     * @param type $id
     * @return type
     * 
     */
    public function actionDetail($id)
    {
        $info = Article::findOne($id);
        //记录点击次数
        $this->on(self::EVENT_AFTER_ACTION, function ($e) use ($info) {
            $info->clicks += 1;
            $info->update();
        });
        $refer = Article::find()->select('id,title')->where('id<'.$id)->asArray()->orderBy('id desc')->one();
        $behind = Article::find()->select('id,title')->where('id>'.$id)->asArray()->orderBy('id')->one();
        return $this->render('detail',['info'=>$info,'refer'=>$refer,'behind'=>$behind]);
    }
    /**
     * 关于我
     * @return type
     */
    public function actionAbout()
    {
        return $this->render('about',[]);
    }
    /**
     * 分类展示页
     * @param type $id
     * @return type
     */
    public function actionColumns($id)
    {
        //with加或不加都是可以正常显示的，二者区别在于 with表示饥渴式加载 没有with会在用到column内容的时候懒惰加载
        $query = Article::find()->where(['columnid' => $id])->with('columns');
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize'=>5,
//            'params'=>  array_merge($_GET,['name'=>'xiaogou']),//添加其他参数
        ]);
        $list = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('columns', [
         'list' => $list,
         'pages' => $pages,
        ]);
    }
    /**
     * 登录
     * @return type
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->login();
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    /**
     * 退出
     * @return type
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
}
