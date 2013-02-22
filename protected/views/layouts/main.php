<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Update status', 'url'=>array('/status/create'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php if($this->uniqueid.$this->action->id != 'sitecontact'):?>
		<ul class="contacts">
            <li><a class="skype" href='skype:vfeskov1' title="Skype me">vfeskov1</a></li>
            <li><a class="email" title="Email me" href='mai&#108;to&#58;&#118;&#64;%76%6C%61%6&#52;&#105;&#109;irfes&#107;%6Fv&#46;c&#37;6Fm'>v&#64;vladimirfeskov&#46;com</a></li>
            <li><a class="linkedin" target="_blank" title="Check my profile" href='http://www.linkedin.com/profile/view?id=192299155'>http://www.linkedin.com/profile/view?id=192299155</a></li>
		</ul><br />
        <?php endif;?>
        <?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
