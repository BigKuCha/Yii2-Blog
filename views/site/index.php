<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\StringHelper;
use yii\helpers\Url;
$this->title = 'My Yii Application';
$this->registerCssFile('/css/index.css');
$this->registerJsFile('js/silder.js');
$this->title = Yii::$app->params['webtitle']."-首页";
?>
<body>
<div class="banner">
  <section class="box">
    <ul class="texts">
      <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
      <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
      <p>加了锁的青春，不会再因谁而推开心门。</p>
    </ul>
    <div class="avatar"><a href="#"><span>杨青</span></a> </div>
  </section>
</div>
<div class="template">
  <div class="box">
    <h3>
      <p><span>个人博客</span>模板 Templates</p>
    </h3>
    <ul>
      <li><a href="/"  target="_blank"><img src="images/01.jpg"></a><span>仿新浪博客风格·梅——古典个人博客模板</span></li>
      <li><a href="/" target="_blank"><img src="images/02.jpg"></a><span>黑色质感时间轴html5个人博客模板</span></li>
      <li><a href="/"  target="_blank"><img src="images/03.jpg"></a><span>Green绿色小清新的夏天-个人博客模板</span></li>
      <li><a href="/" target="_blank"><img src="images/04.jpg"></a><span>女生清新个人博客网站模板</span></li>
      <li><a href="/"  target="_blank"><img src="images/02.jpg"></a><span>黑色质感时间轴html5个人博客模板</span></li>
      <li><a href="/"  target="_blank"><img src="images/03.jpg"></a><span>Green绿色小清新的夏天-个人博客模板</span></li>
    </ul>
  </div>
</div>

<article>
  <h2 class="title_tj">
      <p>文章<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
      
      <? foreach($list as $k=>$v){ ?>
      <h3><?= $v['title'] ?></h3>
      <figure><a title="<?= $v['title'] ?>" href="<?= Url::to(['site/detail','id'=>$v['id']]) ?>" target="_blank" ><img src="<?= '/'.$v['image'] ?>"></a></figure>
    <ul>
        <p><?= StringHelper::SubstrUTF8($v['content'], 200) ?></p>
        <a title="<?= $v['title'] ?>" href="<?= Url::to(['site/detail','id'=>$v['id']]) ?>" target="_blank" class="readmore">阅读全文>></a>
    </ul>
      <p class="dateview"><span><?= $v['addtime'] ?></span><span>作者：<?= $v['author'] ?></span><span>分类：[<a href="<?= Url::to(['site/columns','id'=>$v['columnid']]) ?>"><?= $v['columns']['columnname'] ?></a>]</span></p>
    <? } ?>
    
  </div>
  <aside class="right">
    <!--<div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>-->
    <div class="news">
    <h3>
      <p>最新<span>文章</span></p>
    </h3>
        <!--最新文章-->
    <?= \app\widgets\newWidget::widget(); ?>
        <!--最新文章-->
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    <?= \app\widgets\newWidget::widget([
        'limit'=>5,
        'ulclass'=>'paih'
    ]) ?>
    <h3 class="links">
      <p>友情<span>链接</span></p>
    </h3>
    <ul class="website">
      <li><a href="/">个人博客</a></li>
      <li><a href="/">谢泽文个人博客</a></li>
      <li><a href="/">3DST技术网</a></li>
      <li><a href="/">思衡网络</a></li>
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
    <a href="/" class="weixin"> </a></aside>
</article>

</body>
</html>
