<?php
$this->pageTitle=Yii::app()->name . ' - '.$model->title;
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
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