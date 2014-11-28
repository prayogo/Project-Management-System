<?php
/* @var $this CompanyTypeController */
/* @var $model CompanyType */

$this->breadcrumbs=array(
	'Company Types'=>array('index'),
	$model->CompanyTypeId=>array('view','id'=>$model->CompanyTypeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List CompanyType', 'url'=>array('index')),
	array('label'=>'Create CompanyType', 'url'=>array('create')),
	array('label'=>'View CompanyType', 'url'=>array('view', 'id'=>$model->CompanyTypeId)),
	array('label'=>'Manage CompanyType', 'url'=>array('admin')),
);
?>

<h1>Update CompanyType <?php echo $model->CompanyTypeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>