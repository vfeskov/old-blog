<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="icon"
          type="image/png"
          href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    <link rel="stylesheet" href="http://yandex.st/highlightjs/7.3/styles/idea.min.css">
    <script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/wysiwyg.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Work history', 'url'=>array('/site/workhistory')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Post', 'url'=>array('/post/create'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Update status', 'url'=>array('/status/create'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Manage HTML blocks', 'url'=>array('/html/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">
    <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login',array())?>" class="login-link">Login</a>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php if($this->uniqueid.$this->action->id != 'sitecontact'):?>
        <?php require(dirname(__FILE__).'/../site/contacts.php')?>
        <br />
        <?php endif;?>
        <?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39039659-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>
