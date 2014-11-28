<?php
/* @var $this CustomerController */
/* @var $model CustomerForm */

$this->breadcrumbs=array(
	'Customer Forms'=>array('index'),
	$model->CustomerId=>array('view','id'=>$model->CustomerId),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerForm', 'url'=>array('index')),
	array('label'=>'Create CustomerForm', 'url'=>array('create')),
	array('label'=>'View CustomerForm', 'url'=>array('view', 'id'=>$model->CustomerId)),
	array('label'=>'Manage CustomerForm', 'url'=>array('admin')),
);
?>

<h1>Update CustomerForm <?php echo $model->CustomerId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>