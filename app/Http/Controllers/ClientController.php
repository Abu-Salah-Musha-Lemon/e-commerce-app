<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\product;
class ClientController extends Controller
{
   
    public function CategoryPage($id){
        $category = Category::where($id)->FindOrFild()->get();
        return view('userTemp.categoryPage',compact('category'));
    }
    

//     public function singleProduct(){
// return view('userTemp.categoryPage');
//     }
    public function addToCart(){
return view('userTemp.singlePage');
    }
    public function checkout(){
return view('userTemp.checkOut');
    }
    public function userProfile(){
return view('userTemp.userProfile');
    }
    public function newRelease(){
return view('userTemp.newRelease');
    }
    public function todaysDeal(){
return view('userTemp.todaysDeal');
    }
    public function customerService(){
return view('userTemp.customerService');
    }




}
