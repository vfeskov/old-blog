<?php
$this->breadcrumbs=array(
	'Htmls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Html','url'=>array('index')),
	array('label'=>'Create Html','url'=>array('create')),
	array('label'=>'Update Html','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Html','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Html','url'=>array('admin')),
);
?>

<h1>View Html #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'key',
		'content',
	),
)); ?>
