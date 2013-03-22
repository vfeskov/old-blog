<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?>
	<br />
    <em><?php echo Yii::app()->dateFormatter->formatDateTime($data->date, 'long', 'long'); ?></em>
</div>