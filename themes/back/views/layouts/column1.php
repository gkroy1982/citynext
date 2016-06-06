<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
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
<?php $this->endContent(); ?>

