<?php
/* @var $this SchoolinfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'School Information',
);

$this->menu=array(
	array('label'=>'Create Schoolinfo', 'url'=>array('create')),
	array('label'=>'Manage Schoolinfo', 'url'=>array('admin')),
);
?>

<h1>School Information</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
