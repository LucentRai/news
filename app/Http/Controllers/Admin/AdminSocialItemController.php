<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialItem;

class AdminSocialItemController extends Controller
{
    public function show()
    {
        $social_item_data = SocialItem::get();
        return view('admin.social_item_show', compact('social_item_data'));
    }

    public function create()
    {
        return view('admin.social_item_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'url' => 'required'
        ]);

        $social_item = new SocialItem();
        $social_item->icon = $request->icon;
        $social_item->url = $request->url;
        $social_item->save();

        return redirect()->route('admin_social_item_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $social_item_data = SocialItem::where('id',$id)->first();
        return view('admin.social_item_edit', compact('social_item_data'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'icon' => 'required',
            'url' => 'required'
        ]);

        $social_item = SocialItem::where('id',$id)->first();
        $social_item->icon = $request->icon;
        $social_item->url = $request->url;
        $social_item->update();

        return redirect()->route('admin_social_item_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $social_item = SocialItem::where('id',$id)->first();
        $social_item->delete();

        return redirect()->route('admin_social_item_show')->with('success', 'Data is deleted successfully.');

    }
}
