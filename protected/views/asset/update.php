<?php
/* @var $this AssetController */
/* @var $model Asset */

$this->breadcrumbs=array(
	'Assets'=>array('index'),
	$model->assetID=>array('view','id'=>$model->assetID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asset', 'url'=>array('index')),
	array('label'=>'Create Asset', 'url'=>array('create')),
	array('label'=>'View Asset', 'url'=>array('view', 'id'=>$model->assetID)),
	array('label'=>'Manage Asset', 'url'=>array('admin')),
);
?>

<h1>Update Asset <?php echo $model->assetID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>