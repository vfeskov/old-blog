<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome',
)); ?>

<p>I'm a web developer from Ukraine. The site is under construction, you can find short updates below.<br/>Go ahead and <a href="index.php?r=site/contact">contact me</a>.</p>

<?php $this->endWidget(); ?>

<div class="status-list">
<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'status_view'
)); ?>
</div>