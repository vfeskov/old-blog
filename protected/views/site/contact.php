<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle='Contact me - '.Yii::app()->name ;
$this->breadcrumbs=array(
	'Contact',
);
$hasFlash = Yii::app()->user->hasFlash('contact');

?>

<h1>Contact me</h1>

<?php if($hasFlash) {
    $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    ));
}?>

<p>I'm usually online from 1 PM to 1 AM EET, but you can leave me a message at anytime.</p>

<?php require(dirname(__FILE__).'/contacts.php')?>

<?php if(!$hasFlash): ?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
    'type'=>'inline',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <p>You can write me something right here. Please include your contact info if you want a response.</p>

    <?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'class'=>'span6')); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->captchaRow($model,'verifyCode'); ?>
	<?php endif; ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Send',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>