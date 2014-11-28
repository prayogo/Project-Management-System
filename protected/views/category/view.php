<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->Category,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->CategoryId)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CategoryId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->Category; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Category',
	),
)); ?>
