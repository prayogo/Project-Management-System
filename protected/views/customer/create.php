<?php
/* @var $this CustomerController */
/* @var $model CustomerForm */

$this->breadcrumbs=array(
	'Customer Forms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerForm', 'url'=>array('index')),
	array('label'=>'Manage CustomerForm', 'url'=>array('admin')),
);
?>

<h1>Create CustomerForm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>