<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class AdminSubCategoryController extends Controller
{
    public function show()
    {
        $sub_categories = SubCategory::with('rCategory','rLanguage')->orderBy('sub_category_order','asc')->get();
        return view('admin.sub_category_show', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_order','asc')->get();
        return view('admin.sub_category_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required'
        ]);

        $sub_category = new SubCategory();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->show_on_menu = $request->show_on_menu;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category->category_id = $request->category_id;
        $sub_category->language_id = $request->language_id;
        $sub_category->save();

        return redirect()->route('admin_sub_category_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('category_order','asc')->get();
        $sub_category_single = SubCategory::where('id',$id)->first();
        return view('admin.sub_category_edit', compact('categories','sub_category_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required'
        ]);

        $sub_category = SubCategory::where('id',$id)->first();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->show_on_menu = $request->show_on_menu;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category->category_id = $request->category_id;
        $sub_category->language_id = $request->language_id;
        $sub_category->update();

        return redirect()->route('admin_sub_category_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $sub_category_single = SubCategory::where('id',$id)->first();
        $sub_category_single->delete();

        return redirect()->route('admin_sub_category_show')->with('success', 'Data is deleted successfully.');
    }
}
