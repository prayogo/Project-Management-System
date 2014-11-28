<?php
/* @var $this CompanyTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Company Types',
);

$this->menu=array(
	array('label'=>'Create CompanyType', 'url'=>array('create')),
	array('label'=>'Manage CompanyType', 'url'=>array('admin')),
);
?>

<h1>Company Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
