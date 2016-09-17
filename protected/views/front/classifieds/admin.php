<!--- -->
<?php 

$url = Yii::app()->theme->baseUrl; 
?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<?php $this->renderPartial('/products/left');?>
</div>
  
<section class="main-content col-lg-9 col-md-9 col-sm-9 content">
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
					$('#classifieds-grid').yiiGridView('update', {
						data: $(this).serialize()
					});
					return false;
				});
				");
				?>

			</div>
			<!--
			<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none;display:inline;">
				<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
			</div>
			-->

			<div class="panel-group" id="1accordion">
				<div class="panel panel-default">
				  <div class=" carousel-heading " style="margin-bottom:0px">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#1accordion" href="#collapsez" >Advanced Search</a>
					</h4>
				  </div>
				  <div id="collapsez" class="panel-collapse collapse ">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php $this->renderPartial('_search',array(
								  'model'=>$model,
								)); ?>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
			
			
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'classifieds-grid',
				'dataProvider'=>$model->search(array('condition'=>'user_id='.Yii::app()->user->getState('uid'))),
				  'itemsCssClass'=>'table table-bordered',
				  'enableSorting'=>false,
				'columns'=>array(
					array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
					array(
				            'header' => 'Ads Image',
				            'type'=>'html',
				            'value' => '($data->image != "") ?CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/classified/".$data->image,"width"=>"50",	))			
							: "" '
					),
					'classifiedtype.name',
					'title',
					'description',
					
					array(
						'name'=>'From Date',
						'header'=>'From Date',
						'value'=>'date("d-m-Y",strtotime($data->from_date))'
					),
					array(
						'name'=>'To Date',
						'header'=>'To Date',
						'value'=>'date("d-m-Y",strtotime($data->to_date))'
					),
					
					// array(
						// 'name'=>'Created on',
						// 'header'=>'Created on',
						// 'value'=>'date("d-m-Y H:i:s",strtotime($data->created_on))'
					// ),
					'status',
					
					array(
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
			
		</div>
	</div>
</section>
  
