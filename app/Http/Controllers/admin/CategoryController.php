<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::latest()->get();
        return view("admin.category.allCategory",compact('category'));
    }

    public function create()
    {
        return view("admin.category.addCategory");
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:category',
        ]);
        Category::create([
            'category_name' => $request->input('category_name'),
            'slug' => strtolower(str_replace(' ', '-', $request->input('category_name')))
        ]);
        // $notification = array(
        //     'message' => 'Category insert Successfully ',
        //     'alert-type' => 'error'
        // );
        return redirect()->route('category')->with([
            'message' => 'Category inserted successfully!',
            'alert-type' => 'success'
        ]);
    }


    public function show(string $id)
    {
        
    }

   
    public function edit($id)
    {
        $category_info = Category::findOrFail($id);
        return view('admin.category.editCategory',compact('category_info'));
        
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:category',
        ]);
        Category::findOrFail($id)->update(
           [
            'category_name' => $request->input('category_name'),
            'slug' => strtolower(str_replace(' ', '-', $request->input('category_name')))
           ]
        );
        return redirect()->route('category')->with([
            'message' => 'Category update successfully!',
            'alert-type' => 'success'
        ]);

    }

   
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category')->with([
            'message' => 'Category Delete successfully!',
            'alert-type' => 'success'
        ]);
    }
}

