<?php
/* @var $this CustomerController */
/* @var $model CustomerForm */

$this->breadcrumbs=array(
	'Customer Forms'=>array('index'),
	$model->CustomerId,
);

$this->menu=array(
	array('label'=>'List CustomerForm', 'url'=>array('index')),
	array('label'=>'Create CustomerForm', 'url'=>array('create')),
	array('label'=>'Update CustomerForm', 'url'=>array('update', 'id'=>$model->CustomerId)),
	array('label'=>'Delete CustomerForm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CustomerId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerForm', 'url'=>array('admin')),
);
?>

<h1>View CustomerForm #<?php echo $model->CustomerId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CustomerId',
		'Company',
		'DayOfJoin',
		'NPWP',
		'Phone',
		'Fax',
		'Address',
		'City',
		'State',
		'CompanyTypeId',
		'CountryId',
		'Webpage',
		'UserIn',
		'DateIn',
		'UserUp',
		'DateUp',
	),
)); ?>
