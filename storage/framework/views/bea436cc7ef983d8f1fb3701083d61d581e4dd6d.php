<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
    <h1>Orders</h1>
    <?php if(Session::has('flash_message_error')): ?>
      <div class="alert alert-error alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><?php echo session('flash_message_error'); ?></strong>
      </div>
    <?php endif; ?>   
    <?php if(Session::has('flash_message_success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong><?php echo session('flash_message_success'); ?></strong>
        </div>
    <?php endif; ?>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Orders</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="app">
              <input style="margin-top: 10px; margin-left: 5px;" type="text" v-model="search" placeholder="Searh Name">
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order Status</th>
                  <th>Payment Method</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
              	<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr v-for="enquiry in filteredEnquiries">
                  <td class="center"><?php echo e($order->id); ?></td>
                  <td class="center"><?php echo e($order->created_at); ?></td>
                  <td class="center"><?php echo e($order->user_name); ?></td>
                  <td class="center"><?php echo e($order->user_email); ?></td>
                  <td class="center">
                    <?php $__currentLoopData = $order->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php echo e($pro->product_name); ?>

                    (<?php echo e($pro->product_qty); ?>)
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td class="center"><?php echo e($order->grand_total); ?></td>
                  <td class="center"><?php echo e($order->order_status); ?></td>
                  <td class="center"><?php echo e($order->payment_method); ?></td>
                  <td class="center">
                    
                    <a target="_blank" href="<?php echo e(url('admin/view-order-invoice/'.$order->id)); ?>" class="btn btn-success btn-mini">View Order Invoice</a><br><br>
                    <a target="_blank" href="<?php echo e(url('admin/invoicePDF/'.$order->id)); ?>" class="btn btn-success btn-mini">Download Invoice</a> 
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 


</script>   
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/admin/orders/view_orders.blade.php ENDPATH**/ ?>