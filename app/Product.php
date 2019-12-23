<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    public static function cartCount(){
    	// if{
    		// User is not logged in. We will use Session
    		$session_id = session()->get('session_id');
    		$cartCount = DB::table('Carts')->where('session_id',$session_id)->sum('quantity');
    	// }
        
        // else(Auth::check()){
    	// 	// User is logged in; We will use Auth
    	// 	$user_email = Auth::user()->email;
    	// 	$cartCount = DB::table('Cart')->where('user_email',$user_email)->sum('quantity');
        // }
    	return $cartCount;
    }

    public static function productCount($cat_id){
    	$catCount = Product::where(['category_id'=>$cat_id,'status'=>1])->count();
    	return $catCount;
	}
	
	public static function deleteCartProduct($product_id,$user_email){
        DB::table('cart')->where(['product_id'=>$product_id,'user_email'=>$user_email])->delete();
    }

    public static function getProductStatus($product_id){
        $getProductStatus = Product::select('status')->where('id',$product_id)->first();
        return $getProductStatus->status;
    }

    public static function getCategoryStatus($category_id){
        $getCategoryStatus = Category::select('status')->where('id',$category_id)->first();
        return $getCategoryStatus->status;
    }
}
