<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;
use File;

class AdminLanguageController extends Controller
{
    public function show()
    {
        $language_data = Language::get();
        return view('admin.language_show', compact('language_data'));
    }

    public function create()
    {
        return view('admin.language_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required|unique:languages'
        ]);

        if($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default'=>'No']);
        }

        $language = new Language();
        $language->name = $request->name;
        $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        $language->save();

        $test_data = file_get_contents(resource_path('languages/sample.json'));
        file_put_contents(resource_path('languages/'.$request->short_name.'.json'),$test_data);

        return redirect()->route('admin_language_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $language_data = Language::where('id',$id)->first();
        return view('admin.language_edit', compact('language_data'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'name' => 'required'
        ]);

        if($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default'=>'No']);
        }

        $language = Language::where('id',$id)->first();
        $language->name = $request->name;
        $language->is_default = $request->is_default;
        $language->update();

        return redirect()->route('admin_language_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $language = Language::where('id',$id)->first();
        if($language->is_default == 'Yes') {
            DB::table('languages')->where('id',1)->update(['is_default'=>'Yes']);
        }

        unlink(resource_path('languages/'.$language->short_name.'.json'));

        $language->delete();

        return redirect()->route('admin_language_show')->with('success', 'Data is deleted successfully.');
    }

    public function update_detail($id)
    {
        $language_data = Language::where('id',$id)->first();
        $lang_id = $language_data->id;

        $json_data = json_decode(file_get_contents(resource_path('languages/'.$language_data->short_name.'.json')));
        return view('admin.language_update_detail', compact('json_data','lang_id'));
    }

    public function update_detail_submit(Request $request, $id) 
    {
        $language_data = Language::where('id',$id)->first();

        $arr1 = [];
        $arr2 = [];

        foreach($request->arr_key as $val) {
            $arr1[] = $val;
        }

        foreach($request->arr_value as $val) {
            $arr2[] = $val;
        }

        for($i=0;$i<count($arr1);$i++) {
            $data[$arr1[$i]] = $arr2[$i];
        }

        $after_encode = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('languages/'.$language_data->short_name.'.json'),$after_encode);

        return redirect()->route('admin_language_show')->with('success', 'Data is updated successfully.');
        
    }
}
