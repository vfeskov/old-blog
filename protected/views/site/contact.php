<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>How to contact me</h1>

<ul class="contacts">
    <li><a class="skype" href='skype:vfeskov1' title="Skype me">vfeskov1</a></li>
    <li><a class="email" title="Email me" href='mai&#108;to&#58;&#118;&#64;%76%6C%61%6&#52;&#105;&#109;irfes&#107;%6Fv&#46;c&#37;6Fm'>v&#64;vladimirfeskov&#46;com</a></li>
    <li><a class="linkedin" target="_blank" title="Check my profile" href='http://www.linkedin.com/profile/view?id=192299155'>http://www.linkedin.com/profile/view?id=192299155</a></li>

</ul>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    )); ?>

<?php else: ?>



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

    <p>You can write me something right here. Please don't forget to include your contact info, if you want a response.</p>

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