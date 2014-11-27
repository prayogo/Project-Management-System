<?php
/* @var $this FacultyController */
/* @var $model Faculty */

$this->breadcrumbs=array(
	'Faculties'=>array('index'),
	$model->FacultyId,
);

$this->menu=array(
	array('label'=>'List Faculty', 'url'=>array('index')),
	array('label'=>'Create Faculty', 'url'=>array('create')),
	array('label'=>'Update Faculty', 'url'=>array('update', 'id'=>$model->FacultyId)),
	array('label'=>'Delete Faculty', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->FacultyId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Faculty', 'url'=>array('admin')),
);
?>

<h1>View Faculty #<?php echo $model->FacultyId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'FacultyId',
		'Code',
		'Faculty',
		array(
            'name'=>'Enable',
            'value'=>$model->EnableText,
		),
	),
)); ?>
