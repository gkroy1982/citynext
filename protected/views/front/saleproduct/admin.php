<?php 

$url = Yii::app()->theme->baseUrl; 
?>
<!-- Main Content -->
	<section class="main-content col-lg-9 col-md-9 col-sm-9">
<?php $this->renderPartial('/products/left');?>		
		<div class="row">
			<div class="carousel-heading no-margin">
				<h4><?php echo $nav;?></h4>
			</div>
			<br />
			
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
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
				  <div class=" carousel-heading " style="margin-bottom:0px">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" >Advanced Search</a>
					</h4>
				  </div>
				  <div id="collapse1" class="panel-collapse collapse in">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4">
										<p>Product</p>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<input type="text" placeholder="">
									</div>	
								</div>
									
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
										<input class="big" type="submit" value="Search">
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
			
			<table class="table">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Image</th>
				  <th>Product</th>
				  <th>Category</th>
				  <th>Description</th>
				  <th>Quantity</th>
				  <th>Status</th>
				  <th>Created On</th>
				  <th>Actions</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td><img src="img/products/sample1.jpg" class="pro-list"></td>
				  <td>Shop Avenue Casual Printed Women's Kurti</td>
				  <td>Appareals</td>
				  <td>Box the sartorial elegance and push it down the road wearing pink coloured anarkali by Ives.</td>
				  <td>10</td>
				  <td>Enabled</td>
				  <td>20/06/2016</td>
				  <td>
					<span>
						<i class="icons icon-search-1" title="View"></i>
						<i class="icon-pencil" title="Edit"></i> 
						<i class="fa fa-cog" aria-hidden="true"></i>
					</span>
				  </td>
				</tr>
				
				<tr>
				  <th scope="row">2</th>
				  <td><img src="img/products/sample2.jpg" class="pro-list"></td>
				  <td>Shop Avenue Casual Printed Women's Kurti</td>
				  <td>Appareals</td>
				  <td>Box the sartorial elegance and push it down the road wearing pink coloured anarkali by Ives.</td>
				  <td>10</td>
				  <td>Enabled</td>
				  <td>20/06/2016</td>
				  <td>
					<span>
						<i class="icons icon-search-1" title="View"></i>
						<i class="icon-pencil" title="Edit"></i> 
						<i class="fa fa-cog" aria-hidden="true"></i>
					</span>
				  </td>
				</tr>
			  </tbody>
			</table>
			
		</div>

	</section>
<!-- /Main Content -->