<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Customer Forms',
);

$this->menu=array(
	array('label'=>'Create CustomerForm', 'url'=>array('create')),
	array('label'=>'Manage CustomerForm', 'url'=>array('admin')),
);
?>

<h1>Customer Forms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
