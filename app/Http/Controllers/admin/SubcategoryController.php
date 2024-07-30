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


  public function edit(string $id)
  {
    $subcategory_info = Subcategory::findOrFail($id);
    return view('admin.subcategory.editSubCategory',compact('subcategory_info'));
  }

  public function update(Request $request, string $id)
  {
    Subcategory::findOrFail($id)->update(
      [
       'subcategory_name' => $request->input('subcategory_name'),
       'slug' => strtolower(str_replace(' ', '-', $request->input('subcategory_name')))
      ]
   );
   return redirect()->route('subcategory.index')->with([
       'message' => 'Subcategory update successfully!',
       'alert-type' => 'success'
   ]);
  }

 
  public function destroy(string $id)
  {
      // Find the Subcategory by its ID
      $subcategory = Subcategory::findOrFail($id);
  
      // Retrieve the category_id from the subcategory
      $cat_id = $subcategory->category_id;
  
      // Delete the subcategory
      $subcategory->delete();
  
      // Decrement the subCategory_count on the related Category
      Category::where('id', $cat_id)->decrement('subCategory_count', 1);
  
      // Redirect with success message
      return redirect()->route('subcategory.index')->with([
          'message' => 'Subcategory deleted successfully!',
          'alert-type' => 'success'
      ]);
  }
  
}

