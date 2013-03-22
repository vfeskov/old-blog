<?php
$this->breadcrumbs=array(
	'Htmls'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Html','url'=>array('index')),
	array('label'=>'Create Html','url'=>array('create')),
	array('label'=>'View Html','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Html','url'=>array('admin')),
);
?>

<h1>Update Html <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>