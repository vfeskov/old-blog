<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>Html::model()->findByKey('Homepage herounit heading')->content,
)); ?>

<?php echo Html::model()->findByKey('Homepage herounit content')->content ?>

<?php $this->endWidget(); ?>

<div class="accordion" id="accordion">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                My work-related log
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
            <div class="accordion-inner">
                <div class="status-list">
                    <?php $this->widget('bootstrap.widgets.TbListView',array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'status_view'
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>

