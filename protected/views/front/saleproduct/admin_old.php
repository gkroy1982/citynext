<?php 

$url = Yii::app()->theme->baseUrl; 
?>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/bootstrap.min.css" media="screen"/>
<style>
.grid-view {
    padding: 15px 0;
    width: 98%;
}
</style>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<?php $this->renderPartial('/products/left');?>
</div>
  
<section class="main-content col-lg-9 col-md-9 col-sm-9">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="carousel-heading no-margin">
				<h4><?php echo $nav;?></h4>
				<?php
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
				?>

			</div>
			<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none;display:inline;">
				<?php $this->renderPartial('_search',array(
					  'model'=>$model,
					)); ?>
			</div>
		</div>
	</div>
</section>
  
  
  <div id="container">
    <!--Middle Part Start-->
    <div id="content">
      <!--Featured Product Part Start-->
      <div class="box">
		<div class="box-heading"><?php echo $nav;?></div>
      <?php //$this->renderPartial('/products/menu');?>

        <div class="box-content">
          <div class="box-product"> 
			<?php


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

			?>


			<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none;display:inline;">
			<?php $this->renderPartial('_search',array(
			  'model'=>$model,
			)); ?>
			</div><!-- search-form 
			
						  'dataProvider'=>$model->search(array('condition'=>"user_id=Yii::app()->user->getState('uid') AND activation_date>='date('Y-m-d',strtotime(activation_date))' AND activation_date<='date('Y-m-d',strtotime(DATE_ADD(activation_date, INTERVAL 1 month)))'")),
			-->

			
			
			<?php 
			
			$dataProvider=$model->search();
			$dataProvider->criteria->addCondition("user_id=".Yii::app()->user->getState('uid'));
			$dataProvider->criteria->addCondition("'".date('Y-m-d')."'>=activation_date AND '".date('Y-m-d')."'<=DATE_ADD(activation_date, INTERVAL 1 month)");
			
			
			$this->widget('zii.widgets.grid.CGridView', array(
			  'id'=>'products-grid',
			  'dataProvider'=>$dataProvider,
			  'itemsCssClass'=>'table table-bordered',
			  'enableSorting'=>false,
			  
			  'columns'=>array(
			array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
			    array(
				  'name'=>'Image',
				  'type' => 'raw',
				  'value' => 'CHtml::image(Yii::app()->baseUrl . "/upload/sell/" . $data->image, "", array("style"=>"width:32px;height:32px;"))'
				),
			    'product',
			    'mainCategory.category',
			    //'subCategory.sub_category',
			    'quantity',
			    'status',
				array(
					'name'=>'Created on',
					'header'=>'Created on',
					'value'=>'date("d-m-Y H:i:s", strtotime($data->created_on))',
				),
			    /*
			    'image',
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


          </div>
        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>


