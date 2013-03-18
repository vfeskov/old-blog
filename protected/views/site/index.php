<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>Html::model()->findByPk('Homepage herounit heading')->content,
)); ?>

<?php echo Html::model()->findByPk('Homepage herounit content')->content ?>

<?php $this->endWidget(); ?>

<div class="status-list">
<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'status_view'
)); ?>
</div>