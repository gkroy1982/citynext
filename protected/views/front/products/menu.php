<div class="box-heading3">
		<a class="button" href="<?php echo Yii::app()->createUrl('users/view')?>">Profile</a> &nbsp;&nbsp;
		
		<?php 
		$record=Users::model()->findByPk(Yii::app()->user->getState('uid'));
		
		if(2==$record->user_type)
		{
		?>
      <a class="button" href="<?php echo Yii::app()->createUrl('products/admin')?>">Products List</a> &nbsp;&nbsp; 
      <a class="button" href="<?php echo Yii::app()->createUrl('products/create')?>">Add Product</a>&nbsp;&nbsp;

      <a class="button" href="<?php echo Yii::app()->createUrl('productoffers/admin')?>">Offer Product List</a>&nbsp;&nbsp;
      <a class="button" href="<?php echo Yii::app()->createUrl('productoffers/create')?>">Add Offer Product</a>&nbsp;&nbsp;

      <a class="button" href="<?php echo Yii::app()->createUrl('ads/admin')?>">Ads List</a>&nbsp;&nbsp;
      <a class="button" href="<?php echo Yii::app()->createUrl('ads/create')?>">Add Ads</a>&nbsp;&nbsp;
	  
	  <?php 
		} else {
		?>
		<a class="button" href="<?php echo Yii::app()->createUrl('saleproduct/admin')?>">Products List</a> &nbsp;&nbsp; 
      	<a class="button" href="<?php echo Yii::app()->createUrl('saleproduct/create')?>">Add Product</a>&nbsp;&nbsp;

		<?php 
		}
		?>
		
		
</div>