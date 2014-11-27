<?php
/* @var $this FacultyController */
/* @var $model Faculty */

$this->breadcrumbs=array(
	'Faculties'=>array('index'),
	$model->Code=>array('view','id'=>$model->FacultyId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Faculty', 'url'=>array('index')),
	array('label'=>'Create Faculty', 'url'=>array('create')),
	array('label'=>'View Faculty', 'url'=>array('view', 'id'=>$model->FacultyId)),
	array('label'=>'Manage Faculty', 'url'=>array('admin')),
);
?>

<h1>Update Faculty <?php echo $model->Code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>