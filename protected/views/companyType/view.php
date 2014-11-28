<?php
/* @var $this CompanyTypeController */
/* @var $model CompanyType */

$this->breadcrumbs=array(
	'Company Types'=>array('index'),
	$model->CompanyTypeId,
);

$this->menu=array(
	array('label'=>'List CompanyType', 'url'=>array('index')),
	array('label'=>'Create CompanyType', 'url'=>array('create')),
	array('label'=>'Update CompanyType', 'url'=>array('update', 'id'=>$model->CompanyTypeId)),
	array('label'=>'Delete CompanyType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CompanyTypeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyType', 'url'=>array('admin')),
);
?>

<h1>View CompanyType #<?php echo $model->CompanyTypeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CompanyType',
	),
)); ?>
