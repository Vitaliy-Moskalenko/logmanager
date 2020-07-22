<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<?php echo Yii::app()->bootstrap->init(); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <?php echo CHtml::link(CHtml::encode(Yii::app()->name), array('site/index'), array('class' => 'brand')); ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><?php echo CHtml::link('Home', array('site/index')); ?></li>
              <li><?php echo CHtml::link('Access Log', array('site/accesslog')); ?></li>
			  <li>
				<?php echo (Yii::app()->user->isGuest) ? CHtml::link('Log in', array('site/login')) : CHtml::link('Logout', array('site/logout')); ?>			
			  </li>	
			</ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="">
              <button type="submit" class="btn search-btn">Search</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
<br><br><br>
	
	<?php if(!Yii::app()->user->isGuest) echo 'Hello, '.(Yii::app()->user->name); ?>

	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?= date('Y') ?> Vitaliy Moskalenko.<br/>
		<?= Yii::powered() ?>
	</div><!-- footer -->

</div><!-- page -->

<?php
$script = <<<EOT
  $('.search-btn').click(function(e) {
	  alert('Кнопка поиска сделана для красоты!');
	  return false;	  
  });
EOT;
Yii::app()->clientScript->registerScript('search-warning', $script);


?>


</body>
</html>