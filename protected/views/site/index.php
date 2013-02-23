<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Hi there!',
)); ?>

<p>My name is Vladimir Feskov and I'm a web developer from Ukraine. This site is dedicated to my work.<br/>
    You can find some of my short work-related updates below. <br/>
    Or you can go ahead and <a href="index.php?r=site/contact">contact me</a>.</p>

<?php $this->endWidget(); ?>

<div class="status-list">
<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'status_view'
)); ?>
</div>