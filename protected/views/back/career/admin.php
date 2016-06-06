<?php
/* @var $this CareerController */
/* @var $model Career */

$this->breadcrumbs=array(
	'Careers'=>array('admin'),
	'Career List',
);

$this->menu=array(
	
	array('label'=>'Create Job', 'url'=>array('careers/create')),
	array('label'=>'Job List', 'url'=>array('careers/admin')),
	array('label'=>'Candidate List', 'url'=>array('career/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#career-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->title="Career List";
?>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'career-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),

		'job.job_profile',
		'name',
		'b_date',	
		
		'email',
		/*'fax',
		'address',
		'quilification',
		'experience',
		'last_org',
		'current_position',
		'created_on',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
