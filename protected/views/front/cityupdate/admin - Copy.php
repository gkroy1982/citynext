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
  <div id="container">
   <?php $this->renderPartial('/products/left');?>
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
				$('#cityupdate-grid').yiiGridView('update', {
					data: $(this).serialize()
				});
				return false;
			});
			");
			?>


			<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none">
			<?php //$this->renderPartial('_search',array('model'=>$model,	)); ?>
			</div><!-- search-form -->

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'cityupdate-grid',
				'dataProvider'=>$model->search(array('condition'=>'user_id='.Yii::app()->user->getState('uid'))),
				  'itemsCssClass'=>'table table-bordered',
				  'enableSorting'=>false,
				'columns'=>array(
					array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
					
					'title',
				    'news', 
					'image',
					array(
						'name'=>'Date',
						'header'=>'Date',
						'value'=>'date("d-m-Y", strtotime($data->date))',
					),
					array(
						'name'=>'Created on',
						'header'=>'Created on',
						'value'=>'date("d-m-Y H:i:s", strtotime($data->created_on))',
					),
					'status',
					
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
