<?php
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use yii\helpers\Url;
$this->title = Yii::$app->params['webtitle'].'';
$this->registerCssFile('/css/style.css');
?>
<article class="blogs">
    <h1 class="t_nav"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="/" class="n1">网站首页</a><a href="#" class="n2"><?= $list[0]['columns']['columnname'] ?></a></h1>
<div class="newblog left">
    <?php foreach($list as $v){ ?>
    <h2><?= $v['title'] ?></h2>
    <p class="dateview"><span>发布时间：<?= $v['addtime'] ?></span><span>作者：<?= $v['author'] ?></span><span>分类：[<a href="#"><?= $v['columns']['columnname'] ?></a>]</span></p>
    <figure><a href="<?= Url::to(['site/detail','id'=>$v['id']]) ?>"><img src="<?= '/'.$v['image'] ?>"></a></figure>
    <ul class="nlist">
        <p><?= StringHelper::SubstrUTF8($v[content], 200)  ?></p>
        <a title="/" href="<?= Url::to(['site/detail','id'=>$v['id']]) ?>" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <?php } ?>
     
    <div class="line"></div>
    <div class="blank"></div>
<!--    <div class="ad">  
    <img src="images/ad.png">
    </div>-->
<?= LinkPager::widget([
    'pagination' => $pages,
    'firstPageLabel'=>'首页',
    'lastPageLabel'=>'尾页',
    'registerLinkTags'=>true,
]);
?>
</div>
<aside class="right">
   <div class="rnav">
      <ul>
       <li class="rnav1"><a href="/download/" target="_blank">日记</a></li>
       <li class="rnav2"><a href="/newsfree/" target="_blank">程序人生</a></li>
       <li class="rnav3"><a href="/web/" target="_blank">欣赏</a></li>
       <li class="rnav4"><a href="/newshtml5/" target="_blank">短信祝福</a></li>
     </ul>      
    </div>
<div class="news">
<h3>
      <p>最新<span>文章</span></p>
    </h3>
    <?= \app\widgets\newWidget::widget([
        'columnid'=>$list[0]['columnid']
    ]) ?>
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
<?= \app\widgets\newWidget::widget([
    'limit'=>'5',
    'ulclass'=>'paih',
]) ?>
    </div>
    <div class="visitors">
      <h3><p>最近访客</p></h3>
      <ul>

      </ul>
    </div>
     <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
</aside>
</article>

