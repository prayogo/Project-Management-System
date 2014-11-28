<?php
/* @var $this CompanyTypeController */
/* @var $model CompanyType */

$this->breadcrumbs=array(
	'Company Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CompanyType', 'url'=>array('index')),
	array('label'=>'Manage CompanyType', 'url'=>array('admin')),
);
?>

<h1>Create CompanyType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>