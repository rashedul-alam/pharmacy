<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> <a href="#" class="current">View Users</a> </div>
    <h1>Users</h1>
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
            <h5>Users</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Registered on</th>
                  
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($user->id); ?></td>
                  <td class="center"><?php echo e($user->name); ?></td>
                  <td class="center"><?php echo e($user->address); ?></td>
                  <td class="center"><?php echo e($user->city); ?></td>
                  <td class="center"><?php echo e($user->state); ?></td>
                  <td class="center"><?php echo e($user->country); ?></td>
                  
                  <td class="center"><?php echo e($user->mobile); ?></td>
                  <td class="center"><?php echo e($user->email); ?></td>
                  <td class="center"><?php echo e($user->type); ?></td>
                  <td class="center">
                    <?php if($user->status==1): ?>
                      <span style="color:green">Active</span>
                    <?php else: ?>
                      <span style="color:red">Inactive</span>
                    <?php endif; ?>
                  </td>
                  <td class="center"><?php echo e($user->created_at); ?></td>
                  
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
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/admin/users/view_users.blade.php ENDPATH**/ ?>