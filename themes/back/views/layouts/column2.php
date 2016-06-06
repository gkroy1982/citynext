<style>
	.portlet-content ul li { list-style:none; }
	.portlet-content ul, portlet-content ol { margin-left:5px; }
</style>

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div style="margin-top: 1%;">
	<div class="navbar-inner">
		<div class="breadcrumb">
			<span style="float:left; width:2%;">
				<i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
				<i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
			</span>
			
			<?php
				if(empty($this->breadcrumbs))
					$this->breadcrumbs = array ('');
				$this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				));
			?>			
		</div>
	</div>
</div>

<div>
<div class="span9">
	<div id="content">
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left"><?php if(isset($this->title)) echo $this->title; ?></div>
			</div>
			<div class="block-content collapse in">
				<?php echo $content; ?>
			</div>
		</div>
	</div><!-- content -->
</div>
<div class="span3 last">
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Operations</div>
			</div>
			<div class="block-content collapse in">
			
				<?php
					$this->beginWidget('zii.widgets.CPortlet');
						$this->widget('zii.widgets.CMenu', array(
							'items'=>$this->menu,
							'htmlOptions'=>array('class'=>''),
						));
					$this->endWidget(); 
				?>
				
				
			</div>
		<!-- /block -->
		
</div><!-- sidebar -->
</div>
</div>
<?php $this->endContent(); ?>