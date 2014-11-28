<?php
/* @var $this ConsultantController */
/* @var $model Consultant */

$this->breadcrumbs=array(
	'Consultants'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Consultant', 'url'=>array('index')),
	array('label'=>'Manage Consultant', 'url'=>array('admin')),
);
?>

<h1>Create Consultant</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>