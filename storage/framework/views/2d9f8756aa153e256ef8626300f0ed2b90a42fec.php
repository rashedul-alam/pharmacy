


<?php $__env->startComponent('mail::message'); ?>

<html>
<body>
	<table width='700px'>
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="<?php echo e(asset('images/frontend_images/home/logo.png')); ?>"></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Hello <?php echo e($messageData['name']); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thank you for shopping with us. Your order details are as below :-</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Order No: <?php echo e($messageData['order_id']); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>
			<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
				<tr bgcolor="#cccccc">
					<td>Product Name</td>
					<td>Product Code</td>
					
					<td>Quantity</td>
					<td>Unit Price</td>
				</tr>
				
				<?php $__currentLoopData = $messageData['productDetails']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
					<tr>
						<td><?php echo e($product['product_name']); ?></td>
						<td><?php echo e($product['product_code']); ?></td>
						
						<td><?php echo e($product['product_qty']); ?></td>
						<td>Tk <?php echo e($product['product_price']); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				<tr>
					<td colspan="5" align="right">Grand Total</td><td>Tk <?php echo e($messageData['grand_total']); ?></td>
				</tr>
			</table>
		</td></tr>
		<tr><td>
			<table width="100%">
				<tr>
					<td width="50%">
						
						<table>
							
							<tr>
								<td><strong>Bill To :-</strong></td>
							</tr>
							
							<tr>
								<td><?php echo e($messageData['username']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($messageData['address']); ?></td>
							</tr>
							
								
							
							<tr>
								<td><?php echo e($messageData['mobile']); ?></td>
							</tr>
						</table>
					
					</td>
					<td width="50%">
						
				</tr>
			</table>
		</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>For any enquiries, you can contact us at <a href="mailto:rashed@pocketpharmacy.com">info@pocketpharmacy.com</a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Regards,<br> Team E-com</td></tr>
		<tr><td>&nbsp;</td></tr>
	</table>
</body>
</html>	
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/email/order-form.blade.php ENDPATH**/ ?>