<?php 
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
// $mainCategories =  Controller::Categories();
 $cartCount = Product::cartCount();
?>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo e(url('./')); ?>"><img src="<?php echo e(asset('images/frontend_images/home/logo.png')); ?>" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
								<li><a href="<?php echo e(url('/orders')); ?>"><i class="fa fa-crosshairs"></i> Orders</a></li>
								<li><a href="<?php echo e(url('/cart')); ?>"><i class="fa fa-shopping-cart"></i> Cart (<?php echo e($cartCount); ?>)</a></li> 
								<?php if(empty(Auth::check())): ?>
									<li><a href="<?php echo e(url('/login-register')); ?>"><i class="fa fa-lock"></i> Login</a></li>
								<?php else: ?>
									<li><a href="<?php echo e(url('/account')); ?>"><i class="fa fa-user"></i> Account</a></li>
									<li><a href="<?php echo e(url('/user-logout')); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo e(url('/')); ?>" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="<?php echo e(url('page/post')); ?>">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="<?php echo e(url('/search-products')); ?>" method="post"><?php echo e(csrf_field()); ?> 
								<input type="text" placeholder="Search Product" name="product" />
								<button type="submit" style="border:0px; height:33px; margin-left:-3px">Go</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header--><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/layouts/frontLayout/front_header.blade.php ENDPATH**/ ?>