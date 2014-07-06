<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>"/>
<title><?= Html::encode($this->title) ?></title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
   <header>
       <div id="logo"><a href="<?= Url::home() ?>"></a></div>
  <nav class="topnav" id="topnav">
      <a href="<?= Url::to(['site/index']); ?>"><span>首页 <?= $this->params['abc']; ?> </span><span class="en">首页</span></a>
      <a href="<?= Url::to(['site/about']) ?>"><span>关于我</span><span class="en">关于我</span></a>
      <?php if(is_array($this->params['columns'])){ foreach($this->params['columns'] as $v) {?>
      <a href="<?= Url::to(['site/columns','id'=>$v['id']]) ?>"><span><?= $v['columnname'] ?></span><span class="en"><?= $v['columnname'] ?></span></a> 
      <?php } } ?>
       <?php if(Yii::$app->user->isGuest){ ?>
      <a href="<?= Url::to(['site/login']) ?>"><span>登录</span><span class="en">`(*∩_∩*)′</span></a>
      <?php }else{ ?>
      <a href="<?= Url::to(['atc/']) ?>"><span>文章管理</span><span class="en">文章管理</span></a>
      <a href="<?= Url::to(['site/logout']) ?>"><span>退出【<?= Yii::$app->user->identity->username ?>-<?= Yii::$app->user->identity->address ?>】</span><span class="en">`(*∩_∩*)′</span></a>
      <?php } ?>
  </nav>
</header>
    <?= $content ?>
<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
