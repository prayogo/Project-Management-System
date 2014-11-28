<?php
/* @var $this ConsultantController */
/* @var $model Consultant */

$this->breadcrumbs=array(
	'Consultants'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Consultant', 'url'=>array('index')),
	array('label'=>'Create Consultant', 'url'=>array('create')),
	array('label'=>'Update Consultant', 'url'=>array('update', 'id'=>$model->ConsultantId)),
	array('label'=>'Delete Consultant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ConsultantId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Consultant', 'url'=>array('admin')),
);
?>

<h1>View Consultant #<?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Name',
		'LectureId',
		'EmployeeId',
		'ResidentId',
		array(
            'name'=>'Category',
            'value'=>$model->Category->Category,
		),
		array(
            'name'=>'Department',
            'value'=>$model->Department->Department,
		),
	),
)); ?>
