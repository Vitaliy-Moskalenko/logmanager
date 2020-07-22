<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<h1>Access Log</h1>


<?php if(!isset($model)) { ?>
	
	<h2 style="color: red;">You must log in to access this page!</h2>
	
<?php } else {

	$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider' => $model->search(),
		'columns' => array(
			'a_id',
			'a_ip',
			'a_date',        
			'a_request',        
			'a_answer_code',        
			'a_response_size'        
		),
	));

}

?>