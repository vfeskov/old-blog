<?php
$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post','url'=>array('create'),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Post','url'=>array('admin'),'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1>Posts</h1>

<div class="post-list">
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>