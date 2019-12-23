<?php

namespace App\Http\Controllers;


use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Mail\Markdown;

use Image;
use App\Category;
use App\Cart;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\DeliveryAddress;
use App\Mail\OrderMail;
use App\Order;
use PDF;
use Datatables;

use App\OrdersProduct;
use Illuminate\Support\Facades\DB;



class ProductsController extends Controller
{
    public function addProduct(Request $request){

		if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;

			$product = new Product;
			$product->category_id = $data['category_id'];
			$product->product_name = $data['product_name'];
			$product->product_code = $data['product_code'];
			$product->quantity = $data['quantity'];
            
			if(!empty($data['description'])){
				$product->description = $data['description'];
			}else{
				$product->description = '';	
			}
            
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            
			$product->price = $data['price'];

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

     				$product->image = $fileName; 

                }
            }

            

           
            $product->status = $status;
			$product->save();
			return redirect()->back()->with('flash_message_success', 'Product has been added successfully');
		}

		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' selected disabled>Select</option>";
		foreach($categories as $cat){
			$categories_drop_down .= "<option value='".$cat->id."'>".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				$categories_drop_down .= "<option value='".$sub_cat->id."'>&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
			}	
		}

		

        

        

		return view('admin.products.add_product')->with(compact('categories_drop_down'));
    }  
    
    public function viewProducts(Request $request){
		$products = Product::get();
		foreach($products as $key => $val){
			$category_name = Category::where(['id' => $val->category_id])->first();
			$products[$key]->category_name = $category_name->name;
		}
		$products = json_decode(json_encode($products));
		//echo "<pre>"; print_r($products); die;
		return view('admin.products.view_products')->with(compact('products'));
	}

	public function deleteProduct($id = null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }

    public function editProduct(Request $request,$id=null){

		if($request->isMethod('post')){
			$data = $request->all();
			

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

           
           

            

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }

           
            

            if(empty($data['description'])){
            	$data['description'] = '';
            }

           

			Product::where(['id'=>$id])->update(['status'=>$status,'category_id'=>$data['category_id'],'product_name'=>$data['product_name'],
				'product_code'=>$data['product_code'],'quantity'=>$data['quantity'],'description'=>$data['description'],'price'=>$data['price'],'image'=>$fileName]);
		
			return redirect()->back()->with('flash_message_success', 'Product has been edited successfully');
		}

		// Get Product Details start //
		$productDetails = Product::where(['id'=>$id])->first();
		// Get Product Details End //

		// Categories drop down start //
		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' disabled>Select</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
			}	
		}
		// Categories drop down end //

       

		return view('admin.products.edit_product')->with(compact('productDetails','categories_drop_down'));
    } 
    
    public function deleteProductImage($id){

		// Get Product Image
		$productImage = Product::where('id',$id)->first();

		// Get Product Image Paths
		$large_image_path = 'images/backend_images/product/large/';
		$medium_image_path = 'images/backend_images/product/medium/';
		$small_image_path = 'images/backend_images/product/small/';

		// Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products table
        Product::where(['id'=>$id])->update(['image'=>null]);

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted successfully');
	}

	public function products($url=null){

    	// Show 404 Page if Category does not exists
    	$categoryCount = Category::where(['status'=>1])->count();
    	if($categoryCount==0){
    		abort(404);
    	}

    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();

    	$categoryDetails = Category::where(['url'=>$url])->first();
    	if($categoryDetails->parent_id==0){
    		$subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
    		$subCategories = json_decode(json_encode($subCategories));
    		foreach($subCategories as $subcat){
    			$cat_ids[] = $subcat->id;
    		}
    		$productsAll = Product::whereIn('products.category_id', $cat_ids)->where('products.status','1')->orderBy('products.id','Desc');
            $breadcrumb = "<a href='/'>Home</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";
    	}else{
    		$productsAll = Product::where(['products.category_id'=>$categoryDetails->id])->where('products.status','1')->orderBy('products.id','Desc');
            $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
            $breadcrumb = "<a href='/'>Home</a> / <a href='".$mainCategory->url."'>".$mainCategory->name."</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";	
    	}

        if(!empty($_GET['color'])){
            $colorArray = explode('-',$_GET['color']);
            $productsAll = $productsAll->whereIn('products.product_color',$colorArray);
        }

        

        
        

        $productsAll = $productsAll->paginate(10);
        /*$productsAll = json_decode(json_encode($productsAll));
        echo "<pre>"; print_r($productsAll); die;*/

        /*$colorArray = array('Black','Blue','Brown','Gold','Green','Orange','Pink','Purple','Red','Silver','White','Yellow');*/

        $colorArray = Product::select('product_color')->groupBy('product_color')->get();
        $colorArray = array_flatten(json_decode(json_encode($colorArray),true));

        $sleeveArray = Product::select('sleeve')->where('sleeve','!=','')->groupBy('sleeve')->get();
        $sleeveArray = array_flatten(json_decode(json_encode($sleeveArray),true));

        $patternArray = Product::select('pattern')->where('pattern','!=','')->groupBy('pattern')->get();
        $patternArray = array_flatten(json_decode(json_encode($patternArray),true));

        $sizesArray = ProductsAttribute::select('size')->groupBy('size')->get();
        $sizesArray = array_flatten(json_decode(json_encode($sizesArray),true));
        /*echo "<pre>"; print_r($sizesArray); die;*/

        $meta_title = $categoryDetails->meta_title;
        $meta_description = $categoryDetails->meta_description;
    	$meta_keywords = $categoryDetails->meta_keywords;
    	return view('products.listing')->with(compact('categories','productsAll','categoryDetails','meta_title','meta_description','meta_keywords','url','colorArray','sleeveArray','patternArray','sizesArray','breadcrumb'));
	}
	
	public function product($id = null){

        // Show 404 Page if Product is disabled
        $productCount = Product::where(['id'=>$id,'status'=>1])->count();
        if($productCount==0){
            abort(404);
        }

        // Get Product Details
		$productDetails = Product::where('id',$id)->first();
		
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();
		
        /*foreach($relatedProducts->chunk(3) as $chunk){
            foreach($chunk as $item){
                echo $item; echo "<br>"; 
            }   
            echo "<br><br><br>";
        }*/
        
        // Get Product Alt Images
		$productAltImages = Product::where('id',$id)->value('image');
		// dd($productAltImages);
        /*$productAltImages = json_decode(json_encode($productAltImages));
        echo "<pre>"; print_r($productAltImages); die;*/
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        $categoryDetails = Category::where('id',$productDetails->category_id)->first();
        if($categoryDetails->parent_id==0){
            $breadcrumb = "<a href='/'>Home</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a> / ".$productDetails->product_name;
        }else{
            $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
            $breadcrumb = "<a style='color:#333;' href='/'>Home</a> / <a style='color:#333;' href='/products/".$mainCategory->url."'>".$mainCategory->name."</a> / <a style='color:#333;' href='/products/".$categoryDetails->url."'>".$categoryDetails->name."</a> / ".$productDetails->product_name;   
        }


        $total_stock = Product::where('id',$id)->value('quantity');
        $meta_title = $productDetails->product_name;
        $meta_description = $productDetails->description;
        $meta_keywords = $productDetails->product_name;
        return view('products.detail')->with(compact('productDetails','categories','productAltImages','total_stock','relatedProducts','meta_title','meta_description','meta_keywords','breadcrumb'));
	}

	public function addtocart(Request $request){

        

		$data = $request->all();
		//dd($data);
        /*echo "<pre>"; print_r($data); die;*/

        // Check Product Stock is available or not
        
        $getProductStock = Product::where(['id'=>$data['product_id']])->first();
		//dd($getProductStock);
        if($getProductStock->quantity < $data['quantity']){
            return redirect()->back()->with('flash_message_error','Required Quantity is not available!');
        }

        if(empty(Auth::user()->email)){
            $data['user_email'] = '';    
        }else{
            $data['user_email'] = Auth::user()->email;
        }

        $session_id = session()->get('session_id');
        if(!isset($session_id)){
            $session_id = session()->get('_token');
            session()->put('session_id',$session_id);
        }

        

        if(empty(Auth::check())){
            $countProducts = DB::table('carts')->where(['product_id' => $data['product_id'],'session_id' => $session_id])->count();
            if($countProducts>0){
                return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
            }
        }else{
            $countProducts = DB::table('carts')->where(['product_id' => $data['product_id'],'user_email' => $data['user_email']])->count();
            if($countProducts>0){
                return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
            }    
        }
        

               
        DB::table('carts')
        ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],'product_code'=>$getProductStock['product_code'],
            'price' => $data['price'],'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id]);

        return redirect('cart')->with('flash_message_success','Product has been added in Cart!');
	}    
	
	public function updateCartQuantity($id=null,$quantity=null){
        
        $getProductSKU = DB::table('carts')->select('product_code','quantity')->where('id',$id)->first();
		//dd($getProductSKU);
		$getProductStock = Product::where('product_code',$getProductSKU->product_code)->value('quantity');
		//dd($quantity);
        $updated_quantity = $getProductSKU->quantity+$quantity;
        if($getProductStock>=$updated_quantity){
            DB::table('carts')->where('id',$id)->increment('quantity',$quantity); 
            return redirect('cart')->with('flash_message_success','Product Quantity has been updated in Cart!');   
        }else{
            return redirect('cart')->with('flash_message_error','Required Product Quantity is not available!');    
        }
    }

    public function deleteCartProduct($id=null){
        
        DB::table('carts')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success','Product has been deleted in Cart!');
    }








	
	public function cart(){           
        // if(Auth::check()){
        //     $user_email = Auth::user()->email;
        //     $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
		// }else
		{
			$session_id = session()->get('_token');
			//dd($session_id);
            $userCart = DB::table('carts')->where(['session_id' => $session_id])->get();    
        }
        
        foreach($userCart as $key => $product){
			//dd($product);

			$productDetails = Product::where('id',$product->product_id)->first();
			($productDetails);
			$userCart[$key]->image = $productDetails->image;
			
        }
        
        $meta_title = "Shopping Cart - E-com Website";
        $meta_description = "View Shopping Cart of E-com Website";
        $meta_keywords = "shopping cart, e-com Website";
        return view('products.cart')->with(compact('userCart','meta_title','meta_description','meta_keywords'));
    }

    public function checkout(Request $request){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
       
        //Check if Shipping Address exists
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount>0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        // Update cart table with user email
        $session_id = session()->get('session_id');
        DB::table('carts')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            // Return to Checkout page if any of the field is empty
            if(empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) ||   empty($data['billing_mobile']) || empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_mobile'])){
                    return redirect()->back()->with('flash_message_error','Please fill all fields to Checkout!');
            }

            // Update User details
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'mobile'=>$data['billing_mobile']]);

            if($shippingCount>0){
                // Update Shipping Address
                DeliveryAddress::where('user_id',$user_id)->update(['user_name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'mobile'=>$data['shipping_mobile']]);
            }else{
                // Add New Shipping Address
                $shipping = new DeliveryAddress;
                $shipping->user_id = $user_id;
                $shipping->user_email = $user_email;
                $shipping->user_name = $data['shipping_name'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
               
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->save();
            }

            

            return redirect()->action('ProductsController@orderReview');
        }

        $meta_title = "Checkout - E-com Website";
        return view('products.checkout')->with(compact('userDetails','shippingDetails','meta_title'));
    }

    public function orderReview(){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;

        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        $shippingDetails = json_decode(json_encode($shippingDetails));
        $userCart = DB::table('carts')->where(['user_email' => $user_email])->get();
        $total_weight = 0;
        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
            
        }
        /*echo "<pre>"; print_r($userCart); die;*/
        

        // Fetch Shipping Charges
        

        $meta_title = "Order Review - E-com Website";
        return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart','meta_title'));
    }

    public function placeOrder(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $user_name = Auth::user()->name;
            //dd($user_name);

            // Prevent Out of Stock Products from ordering
            $userCart = DB::table('carts')->where('user_email',$user_email)->get();
            foreach($userCart as $cart){

                // $getAttributeCount = Product::getAttributeCount($cart->product_id);
                // if($getAttributeCount==0){
                //     Product::deleteCartProduct($cart->product_id,$user_email);
                //     return redirect('/cart')->with('flash_message_error','One of the product is not available. Try again!');
                // }

                // $product_stock = Product::getProductStock($cart->product_id);
                // if($product_stock==0){
                //     Product::deleteCartProduct($cart->product_id,$user_email);
                //     return redirect('/cart')->with('flash_message_error','Sold Out product removed from Cart. Try again!');
                // }
                /*echo "Original Stock: ".$product_stock;
                echo "Demanded Stock: ".$cart->quantity; die;*/
                // if($cart->quantity>$product_stock){
                //     return redirect('/cart')->with('flash_message_error','Reduce Product Stock and try again.');    
                // }

                $product_status = Product::getProductStatus($cart->product_id);
                if($product_status==0){
                    Product::deleteCartProduct($cart->product_id,$user_email);
                    return redirect('/cart')->with('flash_message_error','Disabled product removed from Cart. Please try again!');
                }

                $getCategoryId = Product::select('category_id')->where('id',$cart->product_id)->first();
                $category_status = Product::getCategoryStatus($getCategoryId->category_id);
                if($category_status==0){
                    Product::deleteCartProduct($cart->product_id,$user_email);
                    return redirect('/cart')->with('flash_message_error','One of the product category is disabled. Please try again!');    
                }



                // Get Shipping Address of User
                $shippingDetails = DeliveryAddress::where(['user_email' => $user_email])->first();

               

               

                

                $order = new Order;
                $order->user_id = $user_id;
                $order->user_email = $user_email;
                $order->user_name = $user_name;
                $order->address = $shippingDetails->address;
                $order->city = $shippingDetails->city;
                $order->state = $shippingDetails->state;
                $order->country = $shippingDetails->country;
                $order->mobile = $shippingDetails->mobile;

                $order->order_status = "New";
                $order->payment_method = $data['payment_method'];
                $order->grand_total = $data['grand_total'];
                $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = DB::table('carts')->where(['user_email'=>$user_email])->get();

            foreach($cartProducts as $pro){
                
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
               
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();

                // Reduce Stock Script Starts
            //     $getProductStock = ProductsAttribute::where('sku',$pro->product_code)->first();
            //     /*echo "Original Stock: ".$getProductStock->stock;
            //     echo "Stock to reduce: ".$pro->quantity;*/
            //     $newStock = $getProductStock->stock - $pro->quantity;
            //     if($newStock<0){
            //         $newStock = 0;
            //     }
            //    Product::where('product_code',$pro->product_code)->update(['quantity'=>$newStock]);
            //     // Reduce Stock Script Ends




            }}

            session()->put('order_id',$order_id);
            session()->put('grand_total',$data['grand_total']);
            
            if($data['payment_method']=="COD"){

                //$productDetails = OrdersProduct::with('orders_products')->where('id',$order_id)->get();
                $productDetails=DB::table('orders_products')->where('order_id', $order_id)->get();
                $productDetails = json_decode(json_encode($productDetails),true);
                /*echo "<pre>"; print_r($productDetails);*/ /*die;*/
                $grand_total = DB::table('orders')->where('id', $order_id)->value('grand_total');
                //dd($grand_total);
                $userDetails = User::where('id',$user_id)->first();
                
                
                $userDetails = json_decode(json_encode($userDetails),true);
                /*echo "<pre>"; print_r($userDetails); die;*/
                /* Code for Order Email Start */
                //dd($productDetails);
                $email = $user_email;
               
                $messageData = [
                    'email' => $email,
                    'name' => $user_name,
                    'order_id' => $order_id,
                    'grand_total' => $grand_total,
                    'productDetails' => $productDetails,
                    'username' => $userDetails['name'],
                    'address' => $userDetails['address'],
                    'mobile' => $userDetails['mobile']
                ];
                

                 Mail::to($email)->send(new OrderMail($messageData));
                //  Mail::send('emails.order',$messageData,function($message) use($email){
                //      $message->to('ra_shed@hotmail.com')->subject('Order Placed - ');
                //      //$message->to($email)->subject('Order Placed ');    
                // });
                /* Code for Order Email Ends */

                // COD - Redirect user to thanks page after saving order
                return redirect('/thanks');
            }





        }}

        public function userOrders(){
            $user_id = Auth::user()->id;
            $orders = Order::with('orders')->where('user_id',$user_id)->orderBy('id','DESC')->get();
            /*$orders = json_decode(json_encode($orders));
            echo "<pre>"; print_r($orders); die;*/
            return view('orders.user_orders')->with(compact('orders'));
        }
    
        public function userOrderDetails($order_id){
            $user_id = Auth::user()->id;
            $orderDetails = Order::with('orders')->where('id',$order_id)->first();
            $orderDetails = json_decode(json_encode($orderDetails));
            /*echo "<pre>"; print_r($orderDetails); die;*/
            return view('orders.user_order_details')->with(compact('orderDetails'));
        }
    
        public function viewOrders(){
            $orders = Order::with('orders')->orderBy('id','Desc')->get();
            $orders = json_decode(json_encode($orders));
            /*echo "<pre>"; print_r($orders); die;*/
            return view('admin.orders.view_orders')->with(compact('orders'));
        }
    
        public function viewOrderDetails($order_id){
            $orderDetails = Order::with('orders')->where('id',$order_id)->first();
            $orderDetails = json_decode(json_encode($orderDetails));
            /*echo "<pre>"; print_r($orderDetails); die;*/
            $user_id = $orderDetails->user_id;
            $userDetails = User::where('id',$user_id)->first();
            /*$userDetails = json_decode(json_encode($userDetails));
            echo "<pre>"; print_r($userDetails);*/
            return view('admin.orders.order_details')->with(compact('orderDetails','userDetails'));
        }

        public function getViewOrder(){
            $orders = DB::table('orders')->select('*');
            // dd($orders);
            
            return datatables()->of($orders)
            ->make(true);

        }
    
        public function viewOrderInvoice($order_id){
            $orderDetails = Order::with('orders')->where('id',$order_id)->first();
            $orderDetails = json_decode(json_encode($orderDetails));
            /*echo "<pre>"; print_r($orderDetails); die;*/
            $user_id = $orderDetails->user_id;
            $userDetails = User::where('id',$user_id)->first();
            /*$userDetails = json_decode(json_encode($userDetails));
            echo "<pre>"; print_r($userDetails);*/
            return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
        }
        public function invoicePDF($order_id) {

            $orderDetails = Order::with('orders')->where('id',$order_id)->first();
            $orderDetails = json_decode(json_encode($orderDetails));
           
            $user_id = $orderDetails->user_id;
            $userDetails = User::where('id',$user_id)->first();
           
          
            $pdf =  PDF::loadView('admin.orders.order_invoice', compact('orderDetails','userDetails'));
            
            return $pdf->download('$order_id.pdf');
        }
    
        public function updateOrderStatus(Request $request){
            if($request->isMethod('post')){
                $data = $request->all();
                Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
                return redirect()->back()->with('flash_message_success','Order Status has been updated successfully!');
            }
        }
        public function thanks(Request $request){
            $user_email = Auth::user()->email;
            DB::table('carts')->where('user_email',$user_email)->delete();
            return view('orders.thanks');
        }
    
        
}
