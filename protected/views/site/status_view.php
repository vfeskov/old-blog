<div class="status">
	<span class="text"><?php echo CHtml::encode($data->text); ?></span> <span class="date"><?php echo Yii::app()->dateFormatter->formatDateTime($data->date, 'long', 'long'); ?></span>
</div>