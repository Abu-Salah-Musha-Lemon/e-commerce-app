<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subcategory;
use App\Models\category;

class SubcategoryController extends Controller
{
    
  public function index()
  {
    $subcategory=Subcategory::latest()->get();
      return view("admin.subCategory.allSubCategory",compact('subcategory'));
  }

 
  public function create()
  {   $category=Category::latest()->get();
      return view("admin.subCategory.addSubCategory",compact('category'));
  }

  public function store(Request $request)
{
  // Validate the request
  $request->validate([
      'subcategory_name' => 'required|unique:subcategories',
      'category_id' => 'required|integer' // Ensure category_id is an integer
    ]);
    
    // Retrieve the category name
    $category_id = $request->category_id;
    $category_name = Category::where('id', $category_id)->value('category_name');
    // return $request;exit;

  // // Debugging output
  // print_r($request->all());
  // exit;

  // Create a new subcategory
  $x = SubCategory::create([
      'subcategory_name' => $request->input('subcategory_name'),
      'slug' => strtolower(str_replace(' ', '-', $request->input('subcategory_name'))),
      'category_id' => $category_id,
      'category_name' => $category_name
  ]);
//   return $x;exit;
  // Increment the subCategory_count
  Category::where('id', $category_id)->increment('subCategory_count', 1);

  // Redirect with success message
  
      return redirect()->route('subcategory.index')->with([
          'message' => 'Add Subcategory successfully!',
          'alert-type' => 'success'
      ]);
  
}

  
  
  public function show(string $id)
  {
      //
  }

  public function edit(string $id)
  {
      //
  }

  public function update(Request $request, string $id)
  {
      //
  }

 
  public function destroy(string $id)
  {
      //
  }
}

