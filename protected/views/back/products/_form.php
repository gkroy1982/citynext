<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>
<?php 
$product_img_url=Yii::app()->getBaseUrl(true)."/upload/products/";
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'user_id',Users::getUsers(),array('empty'=>'select')); ?>
		
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'main_category_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'main_category_id',MainCategory::getMainCategory(),
			array(
				'empty'=>'Select ',
				'ajax' => array(
					'type'=>'POST',
					'url'=>CController::createUrl('site/subcategory'),
					'data'=> array('pid'=>'js:this.value'),
					'update'=>"#Products_sub_category_id",
					)
				));?>
		
		<?php echo $form->error($model,'main_category_id'); ?>
		</div>
	</div>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'sub_category_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'sub_category_id',SubCategory::getSubCategory(),array('empty'=>'select')); ?>
		
		<?php echo $form->error($model,'sub_category_id'); ?>
		</div>
	</div>



	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'product'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'product',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'product'); ?>
		</div>
	</div>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'image'); ?>
		</label>
		<div class="controls">
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
		<?php if(!empty($model->image) && strpos($model->image, '.') !== false) {?>
			<label><a href="<?php echo $product_img_url.$model->image; ?>" target="_blank" title="Image 1">Download</a></label>
		<?php } ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'image2'); ?>
		</label>
		<div class="controls">
		<?php echo $form->fileField($model,'image2'); ?>
		<?php echo $form->error($model,'image2'); ?>
		<?php //echo $product_img_url.$model->image2; ?>
		<?php if(!empty($model->image2) && strpos($model->image2, '.') !== false) {?>
			<label><a href="<?php echo $product_img_url.$model->image2; ?>" target="_blank" title="Image 2">Download</a></label>
		<?php } ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'image3'); ?>
		</label>
		<div class="controls">
		<?php echo $form->fileField($model,'image3'); ?>
		<?php echo $form->error($model,'image3'); ?>
		<?php //echo $product_img_url.$model->image3; ?>
		
		<?php 
		if(!empty($model->image3) && strpos($model->image3, '.') !== false) {?>
			<label><a href="<?php echo $product_img_url.$model->image3; ?>" target="_blank" title="Image 3">Download</a></label>
		<?php } ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'price'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'price'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'quantity'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'quantity',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'quantity'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'description'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'description',array('class'=>'tinymce_full','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'rating'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'rating'); ?>
		<?php echo $form->error($model,'rating'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		
		<?php echo $form->dropDownList($model,'status',Products::getStatus()); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'amount'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
		</div>		
	</div>

	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->