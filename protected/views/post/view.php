<?php
$this->pageTitle=Yii::app()->name . ' - '.$model->title;
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'#'.$model->id,
);

$this->menu=array(
	array('label'=>'List Post','url'=>array('index'),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Post','url'=>array('create'),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Update Post','url'=>array('update','id'=>$model->id),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Delete Post','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Post','url'=>array('admin'),'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1><?php echo $model->title?></h1>
<p><em><?php echo Yii::app()->dateFormatter->formatDateTime($model->date, 'long', 'long'); ?></em></p>
<?php echo $model->content?>
<div id="disqus_thread"></div>
<script type="text/javascript">
    var disqus_shortname = 'vladimirfeskov';
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>