<?php use App\Product; ?>
<form action="<?php echo e(url('/products-filter')); ?>" method="post"><?php echo e(csrf_field()); ?>

	<?php if(!empty($url)): ?>
	<input name="url" value="<?php echo e($url); ?>" type="hidden">
	<?php endif; ?> 
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo e($cat->id); ?>">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								<?php echo e($cat->name); ?>

							</a>
						</h4>
					</div>
					
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<?php if(!empty($url)): ?>
		
			<h2>Colors</h2>	
			<div class="panel-group">
				<?php $__currentLoopData = $colorArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(!empty($_GET['color'])): ?>
						<?php $colorArr = explode('-',$_GET['color']) ?>
						<?php if(in_array($color,$colorArr)): ?>
							<?php $colorcheck="checked"; ?>	
						<?php else: ?>
							<?php $colorcheck=""; ?>
						<?php endif; ?>		
					<?php else: ?>
						<?php $colorcheck=""; ?>
					<?php endif; ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="colorFilter[]" onchange="javascript:this.form.submit();" id="<?php echo e($color); ?>" value="<?php echo e($color); ?>" type="checkbox" <?php echo e($colorcheck); ?>>&nbsp;&nbsp;<span class="products-colors"><?php echo e($color); ?></span>
							</h4>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div>&nbsp;</div>

			<h2>Sleeve</h2>	
			<div class="panel-group">
				<?php $__currentLoopData = $sleeveArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sleeve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(!empty($_GET['sleeve'])): ?>
						<?php $sleeveArr = explode('-',$_GET['sleeve']) ?>
						<?php if(in_array($sleeve,$sleeveArr)): ?>
							<?php $sleevecheck="checked"; ?>	
						<?php else: ?>
							<?php $sleevecheck=""; ?>
						<?php endif; ?>		
					<?php else: ?>
						<?php $sleevecheck=""; ?>
					<?php endif; ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="sleeveFilter[]" onchange="javascript:this.form.submit();" id="<?php echo e($sleeve); ?>" value="<?php echo e($sleeve); ?>" type="checkbox" <?php echo e($sleevecheck); ?>>&nbsp;&nbsp;<span class="products-sleeves"><?php echo e($sleeve); ?></span>
							</h4>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div>&nbsp;</div>

			<h2>Pattern</h2>	
			<div class="panel-group">
				<?php $__currentLoopData = $patternArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pattern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(!empty($_GET['pattern'])): ?>
						<?php $patternArr = explode('-',$_GET['pattern']) ?>
						<?php if(in_array($pattern,$patternArr)): ?>
							<?php $patterncheck="checked"; ?>	
						<?php else: ?>
							<?php $patterncheck=""; ?>
						<?php endif; ?>		
					<?php else: ?>
						<?php $patterncheck=""; ?>
					<?php endif; ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="patternFilter[]" onchange="javascript:this.form.submit();" id="<?php echo e($pattern); ?>" value="<?php echo e($pattern); ?>" type="checkbox" <?php echo e($patterncheck); ?>>&nbsp;&nbsp;<span class="products-patterns"><?php echo e($pattern); ?></span>
							</h4>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div>&nbsp;</div>

			<h2>Size</h2>	
			<div class="panel-group">
				<?php $__currentLoopData = $sizesArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(!empty($_GET['size'])): ?>
						<?php $sizeArr = explode('-',$_GET['size']) ?>
						<?php if(in_array($size,$sizeArr)): ?>
							<?php $sizecheck="checked"; ?>	
						<?php else: ?>
							<?php $sizecheck=""; ?>
						<?php endif; ?>		
					<?php else: ?>
						<?php $sizecheck=""; ?>
					<?php endif; ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="sizeFilter[]" onchange="javascript:this.form.submit();" id="<?php echo e($size); ?>" value="<?php echo e($size); ?>" type="checkbox" <?php echo e($sizecheck); ?>>&nbsp;&nbsp;<span class="products-sizes"><?php echo e($size); ?></span>
							</h4>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div>&nbsp;</div>

		<?php endif; ?>
		
	</div>
</form><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/layouts/frontLayout/front_sidebar.blade.php ENDPATH**/ ?>