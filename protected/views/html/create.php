<?php
$this->breadcrumbs=array(
	'Htmls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Html','url'=>array('index')),
	array('label'=>'Manage Html','url'=>array('admin')),
);
?>

<h1>Create Html</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>