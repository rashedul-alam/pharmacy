<?php $__env->startSection('content'); ?>

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="row">
			<?php if(Session::has('flash_message_success')): ?>
	            <div class="alert alert-success alert-block">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong><?php echo session('flash_message_success'); ?></strong>
	            </div>
	        <?php endif; ?>
	        <?php if(Session::has('flash_message_error')): ?>
	            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong><?php echo session('flash_message_error'); ?></strong>
	            </div>
    		<?php endif; ?>  
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<h2>Update Account</h2>
					<form id="accountForm" name="accountForm" action="<?php echo e(url('/account')); ?>" method="POST"><?php echo e(csrf_field()); ?>

						<input value="<?php echo e($userDetails->email); ?>" readonly="" />
						<input value="<?php echo e($userDetails->name); ?>" id="name" name="name" type="text" placeholder="Name"/>
						<input value="<?php echo e($userDetails->address); ?>" id="address" name="address" type="text" placeholder="Address"/>
						<input value="<?php echo e($userDetails->city); ?>" id="city" name="city" type="text" placeholder="City"/>
						<input value="<?php echo e($userDetails->state); ?>" id="state" name="state" type="text" placeholder="State"/>
						
							<input value="<?php echo e($userDetails->country); ?>"id="country" name="country" type="text" placeholder="country"/>
							
						<input value="<?php echo e($userDetails->pincode); ?>" style="margin-top: 10px;" id="pincode" name="pincode" type="text" placeholder="Pincode"/>
						<input value="<?php echo e($userDetails->mobile); ?>" id="mobile" name="mobile" type="text" placeholder="Mobile"/>
						<button type="submit" class="btn btn-default">Update</button>
					</form>
				</div>
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<h2>Update Password</h2>
					<form id="passwordForm" name="passwordForm" action="<?php echo e(url('/update-user-pwd')); ?>" method="POST"><?php echo e(@csrf_field()); ?>

						<input type="password" name="current_pwd" id="current_pwd" placeholder="Current Password">
						<span id="chkPwd"></span>
						<input type="password" name="new_pwd" id="new_pwd" placeholder="New Password">
						<input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
						<button type="submit" class="btn btn-default">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section><!--/form-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/users/account.blade.php ENDPATH**/ ?>