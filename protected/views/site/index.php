<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h3>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h3>
        <p><?php echo CHtml::link('Access Log', array('site/accesslog'), array('class' => 'btn btn-primary btn-large')); ?></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span12">
			<p>Congratulations! I've created your Yii application.</p>
        </div>
        <div class="span12">
			<p>You may change the content of this page by modifying the following two files:</p>
			<ul>
				<li>View file: <code><?php echo __FILE__; ?></code></li>
				<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
			</ul>
       </div>
	   <div class="span12">
			<p>For more details on how to further develop this application, please read
			the <a href="http://www.yiiframework.com/doc/">documentation</a>.
			Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
			should you have any questions.</p>
       </div>
	  </div>	   
      <hr>

</div> <!-- /container -->



     