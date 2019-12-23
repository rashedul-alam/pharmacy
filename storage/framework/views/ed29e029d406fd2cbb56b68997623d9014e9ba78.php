<?php $__env->startSection('content'); ?>


	
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<?php echo $__env->make('layouts.frontLayout.front_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">All Items</h2>
					
					<?php $__currentLoopData = $productsAll->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo e(asset('/images/backend_images/product/small/'.$pro->image)); ?>" alt="" />
										<h2>Tk <?php echo e($pro->price); ?></h2>
										<p><?php echo e($pro->product_name); ?></p>
										<a href="<?php echo e(url('/product/'.$pro->id)); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Tk <?php echo e($pro->price); ?></h2>
											<p><?php echo e($pro->product_name); ?></p>
											<a href="<?php echo e(url('/product/'.$pro->id)); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/index.blade.php ENDPATH**/ ?>