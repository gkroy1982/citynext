<style>
.img_size_30{
	height:30px;
	width:30px;
}
</style>
<?php
/* @var $this ProductsController */
/* @var $model Products */
$products_path=Yii::app()->getBaseUrl(true)."/upload/products/";

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create Products', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Products";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $image_path=Yii::app()->baseUrl.'/upload/products/'; ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search( array( 'order'=>'status DESC,created_on DESC') ),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	// 'columns'=>array(
    // 'fromcompanyname:text:From',
    // array(
        // 'header'=>'image status',
        // 'value'=>function($data){
            // return ($data->image);
        // },
    // ),
// ),
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		
		'product',
		'user.full_name',
		'mainCategory.category',
		'subCategory.sub_category',
		'quantity',
		'status',
		array(
        'header'=>'Image Status(300x750)',
		'name'=>'image_status',
        'value'=>function($data){
			if (strpos($data->image, '.') !== false) {
				list($width, $height) = getimagesize(Yii::app()->getBaseUrl(true)."/upload/products/".$data->image); 
                if($width)
					$st='1) '.$width.'x'.$height.' ';
			}
			if (strpos($data->image2, '.') !== false) {
				list($width2, $height2) = getimagesize(Yii::app()->getBaseUrl(true)."/upload/products/".$data->image2); 
				if($width2)
					$st.='2) '.$width2.'x'.$height2.' ';
			}
			if (strpos($data->image3, '.') !== false) {
				list($width3, $height3) = getimagesize(Yii::app()->getBaseUrl(true)."/upload/products/".$data->image3); 
				if($width3)
					$st.='3) '.$width3.'x'.$height3.' ';
			}

				return $st;			
		},
		'htmlOptions' => array('style'=>'color:red;')
    ),
		// array(
			  // 'class' => 'PcLinkButton',
			  // 'imageUrlExpression' => 'Yii::app()->baseUrl."/upload/products/" . $data->image',
			  // 'urlExpression' => 'Yii::app()->baseUrl."/upload/products/" . $data->image',
			  // 'labelExpression' => 'image',
			  // 'header' => "Image 1",
			  // 'htmlOptions' => array('style'=>'width:30px;height:30px;'), 
		// ),
		/*
		array(
			'header' => 'image',
			'value' => 'function(){
		    	// $this->get_image_size($url=Yii::app()->baseUrl."/upload/products/" . $data->image);
				// list($width, $height) = getimagesize(Yii::app()->baseUrl."/upload/products/" . $data->image); 
                // return $width."x".$height;
                // x;
				get_image_size
			}'
		),
		*/
	
		// array(
			// 'header' => 'Image 1',
			// 'type'=>'html',
			// 'value' => '($data->image != "") ?CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/products/".$data->image,"width"=>"50",	))			
			// : "" '
		// ),
		 // array(
            // 'name'=>'image',
            // 'type'=>'html',
			// 'value'=>'(!empty($data->image))?CHtml::image('.$image_path.'$data->image,"",array("style"=>"width:25px;height:25px;")):"no image"',
			// ),
		/*		
		'price',
		'description',
		'rating',
		'created_on',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
