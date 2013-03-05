<?php
    /* @var $this SiteController */
    /* @var $model LinkedIn */

    $this->pageTitle=Yii::app()->name . ' - Work history';
    $this->breadcrumbs=array(
        'Work history',
    );
    ?>
<h1>My employment history</h1>
<?php if(Yii::app()->user->hasFlash('positions')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('positions'),
    )); ?>

<?php elseif(!Yii::app()->user->isGuest): ?>

<?php echo CHtml::link('Update work history', $this->createUrl('/site/workhistory',array('update'=>1))) ?>

<?php endif?>

<?php $positions = array();
foreach($dataProvider->getData() as $position)
{
    $company = '<a href="#" onclick="return false;" rel="tooltip" title="'.$position->companyindustry.' '.$position->companysize.'">'.$position->companyname.'</a>';
    $dates = 'From ' . date('M Y',strtotime($position->startdate));
    if($position->enddate) $dates .= ' to '. date('M Y',strtotime($position->enddate));
    $positions[] = array(
        'id'=>$position->id,
        'title'=>$position->title,
        'company'=>$company,
        'summary'=>$position->summary,
        'dates'=>$dates,
    );
}
$gridDataProvider = new CArrayDataProvider($positions);
$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'bordered',
    'dataProvider'=>$gridDataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'title', 'header'=>'Title', 'htmlOptions'=>array('width'=>'15%')),
        array('name'=>'company', 'header'=>'Company', 'type'=>'raw', 'htmlOptions'=>array('width'=>'10%')),
        array('name'=>'summary', 'header'=>'Summary'),
        array('name'=>'dates', 'header'=>'Dates','htmlOptions'=>array('width'=>'15%')),
    ),
));

?>