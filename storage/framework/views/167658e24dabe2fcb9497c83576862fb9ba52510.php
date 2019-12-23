<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>
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
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Image</th>
                 
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($product->id); ?></td>
                  <td class="center"><?php echo e($product->category_id); ?></td>
                  <td class="center"><?php echo e($product->category_name); ?></td>
                  <td class="center"><?php echo e($product->product_name); ?></td>
                  <td class="center"><?php echo e($product->product_code); ?></td>
                  <td class="center"><?php echo e($product->quantity); ?></td>
                  <td class="center">INR <?php echo e($product->price); ?></td>
                  <td class="center">
                    <?php if(!empty($product->image)): ?>
                    <img src="<?php echo e(asset('/images/backend_images/product/small/'.$product->image)); ?>" style="width:50px;">
                    <?php endif; ?>
                  </td>
                  
                  <td class="center">
                    <a href="#myModal<?php echo e($product->id); ?>" data-toggle="modal" class="btn btn-success btn-mini">View</a> 
                    <a href="<?php echo e(url('/admin/edit-product/'.$product->id)); ?>" class="btn btn-primary btn-mini">Edit</a> 
                                  <a href="<?php echo e(url('/admin/delete-product/'.$product->id)); ?>" id="delProduct" rel="<?php echo e($product->id); ?>" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
 
                        <div id="myModal<?php echo e($product->id); ?>" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3><?php echo e($product->product_name); ?> Full Details</h3>
                          </div>
                          <div class="modal-body">
                            <p>Product ID: <?php echo e($product->id); ?></p>
                            <p>Category ID: <?php echo e($product->category_id); ?></p>
                            <p>Product Code: <?php echo e($product->product_code); ?></p>
                            <p>Product Color: <?php echo e($product->quantity); ?></p>
                            <p>Price: Tk <?php echo e($product->price); ?></p>
                            
                           
                            <p>Description: <?php echo e($product->description); ?></p>
                          </div>
                        </div>

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/admin/products/view_products.blade.php ENDPATH**/ ?>