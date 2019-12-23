<?php $__env->startSection('content'); ?>
<?php use App\Product; ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Review</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="shopper-informations">
				<div class="row">					
				</div>
			</div>

			<div class="row">
				<?php if(Session::has('flash_message_error')): ?>
		            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
		                <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong><?php echo session('flash_message_error'); ?></strong>
		            </div>
        		<?php endif; ?> 
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Billing Details</h2>
							<div class="form-group">
								<?php echo e($userDetails->name); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->address); ?>

							</div>
							<div class="form-group">	
								<?php echo e($userDetails->city); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->state); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->country); ?>

							</div>
							
							<div class="form-group">
								<?php echo e($userDetails->mobile); ?>

							</div>
					</div>
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>Shipping Details</h2>
							<div class="form-group">
								<?php echo e($shippingDetails->user_name); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->address); ?>

							</div>
							<div class="form-group">	
								<?php echo e($shippingDetails->city); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->state); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->country); ?>

							</div>
							
							<div class="form-group">
								<?php echo e($shippingDetails->mobile); ?>

							</div>
					</div>
				</div>
			</div>

			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						<?php $__currentLoopData = $userCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:130px;" src="<?php echo e(asset('/images/backend_images/product/small/'.$cart->image)); ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo e($cart->product_name); ?></a></h4>
								<p>Product Code: <?php echo e($cart->product_code); ?></p>
							</td>
							<td class="cart_price">
								<p>INR <?php echo e($cart->price); ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<?php echo e($cart->quantity); ?>

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">INR <?php echo e($cart->price*$cart->quantity); ?></p>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Tk <?php echo e($total_amount); ?></td>
									</tr>
									
									
									<tr>
										<td>Grand Total</td>
										<?php 
										$grand_total = $total_amount;
										 ?>
										<td><span class="btn-secondary" data-toggle="tooltip" data-html="true" >Tk <?php echo e($grand_total); ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentForm" id="paymentForm" action="<?php echo e(url('/place-order')); ?>" method="post"><?php echo e(csrf_field()); ?>

				<input type="hidden" name="grand_total" value="<?php echo e($grand_total); ?>">
				<div class="payment-options">
					<span>
						<label><strong>Select Payment Method:</strong></label>
					</span>
					<?php if(1>0): ?>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> <strong>COD</strong></label>
					</span>
					<?php endif; ?>
					
					<span style="float:right;">
						<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Place Order</button>
					</span>
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/products/order_review.blade.php ENDPATH**/ ?>