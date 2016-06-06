<?php $this->renderPartial("//layouts/includes/header");?>
	<div class="container-fluid">
		<div class="row-fluid span12">
		<?php $this->widget('Wmain',array('view'=>'menu'));?>
			<!--/span-->
			
			<div class="span9" id="content">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	<div class="span"  style="width:96%;">
<?php $this->renderPartial("//layouts/includes/footer");?>
	</div>
