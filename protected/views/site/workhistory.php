<?php
    /* @var $this SiteController */
    /* @var $model LinkedIn */

    $this->pageTitle= 'About me - '.Yii::app()->name ;
    ?>
<h1>About me</h1>
<p>...</p>
<h3>My work history</h3>
<?php if(Yii::app()->user->hasFlash('positions')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('positions'),
    )); ?>

<?php elseif(!Yii::app()->user->isGuest): ?>

<?php echo CHtml::link('Update work history', $this->createUrl('/site/workhistory',array('update'=>1))) ?>

<?php endif?>
<ol class="positions-list">
<?php $positions = array();

foreach($dataProvider->getData() as $position)
{
    $dates = date('F Y',strtotime($position->startdate));
    if($position->enddate) $dates .= ' - '. date('F Y',strtotime($position->enddate));
    else $dates .= ' - Present';
    echo '<li>';
    echo '<p>';
    echo "<span class=\"position\">$position->title at ";
    echo "<a href=\"$position->companyurl\" target=\"_blank\">$position->companyname</a></span><br/>";
    echo "<span class=\"dates\">$dates</span><br/>";
    echo "<span class=\"summary\">$position->summary</span>";
    echo '</p>';
    echo '</li>';
}
?>
</ol>