
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
				$('#ads-grid').yiiGridView('update', {
					data: $(this).serialize()
				});
				return false;
			});
			");
			$this->title="List Ads";
			?>

			<!--
			<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none">
			<?php $this->renderPartial('_search',array(
				'model'=>$model,
			)); ?>
			</div><!-- search-form -->

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'ads-grid',
				'dataProvider'=>$model->search( array('condition'=>'user_id='.Yii::app()->user->getState('uid')) ),
				'itemsCssClass'=>'table table-bordered',
				'enableSorting'=>false,
				
				'columns'=>array(
			array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
					
					array(
				            'header' => 'Slider ',
				            'type'=>'html',
				            'value' => '($data->show_in == 1) ?"Second Slider":"First Slider"'
				        ),
					array(
				            'header' => 'Ads Image',
				            'type'=>'html',
				            'value' => '($data->image != "") ?CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/ads/".$data->image,"width"=>"50",	))			
							: "" '
				        ),
					array(
							'name'=>'Start Date',
							'header'=>'Start Date',
							'value'=>'date("d-m-Y", strtotime($data->start_date))',
						),

					'validity_days',
					'status',
					/*'user_id',
					'description',
					
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