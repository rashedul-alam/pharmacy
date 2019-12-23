<?php $__env->startSection('content'); ?>

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Check Out</li>
			</ol>
		</div>
		<?php if(Session::has('flash_message_error')): ?>
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong><?php echo session('flash_message_error'); ?></strong>
            </div>
		<?php endif; ?>
		<form action="<?php echo e(url('/checkout')); ?>" method="post"><?php echo e(csrf_field()); ?>

			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Bill To</h2>
							<div class="form-group">
								<input name="billing_name" id="billing_name" <?php if(!empty($userDetails->name)): ?> value="<?php echo e($userDetails->name); ?>" <?php endif; ?> type="text" placeholder="Billing Name" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_address" id="billing_address" <?php if(!empty($userDetails->address)): ?> value="<?php echo e($userDetails->address); ?>" <?php endif; ?> type="text" placeholder="Billing Address" class="form-control" />
							</div>
							<div class="form-group">	
								<input name="billing_city" id="billing_city" <?php if(!empty($userDetails->city)): ?> value="<?php echo e($userDetails->city); ?>" <?php endif; ?> type="text" placeholder="Billing City" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_state" id="billing_state" <?php if(!empty($userDetails->state)): ?> value="<?php echo e($userDetails->state); ?>" <?php endif; ?> type="text" placeholder="Billing State" class="form-control" />
							</div>
							
							
							<div class="form-group">
								<input name="billing_mobile" id="billing_mobile" <?php if(!empty($userDetails->mobile)): ?> value="<?php echo e($userDetails->mobile); ?>" <?php endif; ?> type="text" placeholder="Billing Mobile" class="form-control" />
							</div>
							<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="copyAddress">
							    <label class="form-check-label" for="copyAddress">Shipping Address same as Billing Address</label>
							</div>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Ship To</h2>
							<div class="form-group">
								<input name="shipping_name" id="shipping_name" <?php if(!empty($shippingDetails->name)): ?> value="<?php echo e($shippingDetails->name); ?>" <?php endif; ?> type="text" placeholder="Shipping Name" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_address" id="shipping_address" <?php if(!empty($shippingDetails->address)): ?> value="<?php echo e($shippingDetails->address); ?>" <?php endif; ?> type="text" placeholder="Shipping Address" class="form-control" />
							</div>
							<div class="form-group">	
								<input name="shipping_city" id="shipping_city" <?php if(!empty($shippingDetails->city)): ?> value="<?php echo e($shippingDetails->city); ?>" <?php endif; ?> type="text" placeholder="Shipping City" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_state" id="shipping_state" <?php if(!empty($shippingDetails->state)): ?> value="<?php echo e($shippingDetails->state); ?>" <?php endif; ?> type="text" placeholder="Shipping State" class="form-control" />
							</div>
							
							
							<div class="form-group">
								<input name="shipping_mobile" id="shipping_mobile" <?php if(!empty($shippingDetails->mobile)): ?> value="<?php echo e($shippingDetails->mobile); ?>" <?php endif; ?> type="text" placeholder="Shipping Mobile" class="form-control" />
							</div>
							<button type="submit" class="btn btn-default">Check Out</button>
					</div><!--/sign up form-->
				</div>
			</div>
		</form>
	</div>
</section><!--/form-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/products/checkout.blade.php ENDPATH**/ ?>