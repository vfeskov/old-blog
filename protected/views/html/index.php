<?php
$this->breadcrumbs=array(
	'Htmls',
);

$this->menu=array(
	array('label'=>'Create Html','url'=>array('create')),
	array('label'=>'Manage Html','url'=>array('admin')),
);
?>

<h1>Htmls</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
