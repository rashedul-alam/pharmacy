<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # <?php echo e($orderDetails->id); ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
						
    				<strong>Billed To:</strong><br>
    					<?php echo e($userDetails->name); ?> <br>
		                <?php echo e($userDetails->address); ?> <br>
		                <?php echo e($userDetails->city); ?> <br>
		                <?php echo e($userDetails->state); ?> <br>
		                <?php echo e($userDetails->country); ?> <br>
		                <?php echo e($userDetails->mobile); ?> <br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
						
        			<strong>Shipped To:</strong><br>
    					<?php echo e($orderDetails->user_name); ?> <br>
		                <?php echo e($orderDetails->address); ?> <br>
		                <?php echo e($orderDetails->city); ?> <br>
		                <?php echo e($orderDetails->state); ?> <br>
		                <?php echo e($orderDetails->country); ?> <br>
		              
		                <?php echo e($orderDetails->mobile); ?>

    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					<?php echo e($orderDetails->payment_method); ?>

    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo e($orderDetails->created_at); ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td style="width:18%"><strong>Product Code</strong></td>
        							<td style="width:18%" class="text-center"><strong>Price</strong></td>
        							<td style="width:18%" class="text-center"><strong>Qty</strong></td>
        							<td style="width:18%" class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php $Subtotal = 0; ?>
    							<?php $__currentLoopData = $orderDetails->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<tr>
    								<td class="text-left"><?php echo e($pro->product_code); ?></td>
    								<td class="text-center">INR <?php echo e($pro->product_price); ?></td>
    								<td class="text-center"><?php echo e($pro->product_qty); ?></td>
    								<td class="text-right">tk <?php echo e($pro->product_price * $pro->product_qty); ?></td>
    							</tr>
    							<?php $Subtotal = $Subtotal + ($pro->product_price * $pro->product_qty); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">TK <?php echo e($Subtotal); ?></td>
    							</tr>
    							
    							
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Grand Total</strong></td>
    								<td class="no-line text-right">tk <?php echo e($orderDetails->grand_total); ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/admin/orders/order_invoice.blade.php ENDPATH**/ ?>