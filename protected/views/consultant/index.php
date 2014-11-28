<?php
/* @var $this ConsultantController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Consultants',
);

$this->menu=array(
	array('label'=>'Create Consultant', 'url'=>array('create')),
	array('label'=>'Manage Consultant', 'url'=>array('admin')),
);
?>

<h1>Consultants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
