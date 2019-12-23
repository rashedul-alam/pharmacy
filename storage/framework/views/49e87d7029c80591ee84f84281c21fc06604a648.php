<?php $__env->startSection('content'); ?>
<?php use App\Product; ?>
<section>
		<div class="container">
			<div class="row">
			<?php if(Session::has('flash_message_error')): ?>
	            <div class="alert alert-error alert-block" style="background-color:#d7efe5">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong><?php echo session('flash_message_error'); ?></strong>
	            </div>
	        <?php endif; ?>   
				<div class="col-sm-3">
					<?php echo $__env->make('layouts.frontLayout.front_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
				</div>
				
				<div class="col-sm-9 padding-right">

					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
								<a id="mainImgLarge" href="<?php echo e(asset('/images/backend_images/product/large/'.$productDetails->image)); ?>">
									<img style="width:300px" id="mainImg" src="<?php echo e(asset('/images/backend_images/product/medium/'.$productDetails->image)); ?>" alt="" />
								</a>
								</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    

								  <!-- Controls -->
								  <!-- <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a> -->
							</div>

						</div>
						<div class="col-sm-7">
							<form name="addtoCartForm" id="addtoCartForm" action="<?php echo e(url('add-cart')); ?>" method="post"><?php echo e(csrf_field()); ?>

		                        <input type="hidden" name="product_id" value="<?php echo e($productDetails->id); ?>">
		                        <input type="hidden" name="product_name" value="<?php echo e($productDetails->product_name); ?>">
		                        <input type="hidden" name="product_code" value="<?php echo e($productDetails->product_code); ?>">
		                        <input type="hidden" name="product_color" value="<?php echo e($productDetails->product_color); ?>">
		                        <input type="hidden" name="price" id="price" value="<?php echo e($productDetails->price); ?>">
								<div class="product-information"><!--/product-information-->
									<div align="left"><?php echo $breadcrumb; ?></div>
									<div>&nbsp;</div>
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2><?php echo e($productDetails->product_name); ?></h2>
									<p>Product Code: <?php echo e($productDetails->product_code); ?></p>
									<p>Product Color: <?php echo e($productDetails->product_color); ?></p>
									<?php if(!empty($productDetails->sleeve)): ?>
										<p>Sleeve: <?php echo e($productDetails->sleeve); ?></p>
									<?php endif; ?>
									<?php if(!empty($productDetails->pattern)): ?>
										<p>Pattern: <?php echo e($productDetails->pattern); ?></p>
									<?php endif; ?>
									
									<span>
										
										<span id="getPrice">
											tk <?php echo e($productDetails->price); ?><br>
										</span>
										<label>Quantity:</label>
										<input name="quantity" type="text" value="1" />
										<?php if($total_stock>0): ?>
											<button type="submit" class="btn btn-fefault cart" id="cartButton">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
										<?php endif; ?>	
									</span>
									<p><b>Availability: </b><span id="Availability"> <?php if($total_stock>0): ?> In Stock <?php else: ?> Out Of Stock <?php endif; ?></span></p>
									<p><b>Condition:</b> New</p>

									
									<div style="float:left; margin-top: 10px;" class="sharethis-inline-share-buttons"></div>
						
								</div><!--/product-information-->
							</form>
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#description" data-toggle="tab">Description</a></li>
								<li><a href="#care" data-toggle="tab">Material & Care</a></li>
								<li><a href="#delivery" data-toggle="tab">Delivery Options</a></li>
								<?php if(!empty($productDetails->video)): ?>
									<li><a href="#video" data-toggle="tab">Product Video</a></li>
								<?php endif; ?>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="description" >
								<div class="col-sm-12">
									<p><?php echo e($productDetails->description); ?></p>
								</div>	
							</div>
							
							<div class="tab-pane fade" id="care" >
								<div class="col-sm-12">
									<p><?php echo e($productDetails->care); ?></p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
									<p>100% Original Products <br>
									Cash on delivery might be available</p>
								</div>
							</div>

							<?php if(!empty($productDetails->video)): ?>
								<div class="tab-pane fade" id="video" >
									<div class="col-sm-12">
										<video controls width="640" height="480">
										  <source src="<?php echo e(url('videos/'.$productDetails->video)); ?>" type="video/mp4">
										</video>
									</div>
								</div>
							<?php endif; ?>
					
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count=1; ?>
								<?php $__currentLoopData = $relatedProducts->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>>	
									<?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width:200px;" src="<?php echo e(asset('images/backend_images/product/small/'.$item->image)); ?>" alt="" />
													<h2>INR <?php echo e($item->price); ?></h2>
													<p><?php echo e($item->product_name); ?></p>
													<a href="<?php echo e(url('/product/'.$item->id)); ?>"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								<?php $count++; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/products/detail.blade.php ENDPATH**/ ?>