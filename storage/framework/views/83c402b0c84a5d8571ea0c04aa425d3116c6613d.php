<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/categor/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-category/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/add-category')); ?>">Add Category</a></li>
        <li <?php if (preg_match("/view-categories/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/view-categories')); ?>">View Categories</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/product/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-product/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/add-product')); ?>">Add Product</a></li>
        <li <?php if (preg_match("/view-products/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/view-products')); ?>">View Products</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/orders/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-orders/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/view-orders')); ?>">View Orders</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/users/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-users/i", $url)){ ?> class="active" <?php } ?>><a href="<?php echo e(url('/admin/view-users')); ?>">View Users</a></li>
      </ul>
    </li>
   
    
  </ul>
</div>
<!--sidebar-menu--><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/layouts/adminLayout/admin_sidebar.blade.php ENDPATH**/ ?>