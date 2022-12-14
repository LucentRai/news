<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function show()
    {
        $faq_data = Faq::get();
        return view('admin.faq_show', compact('faq_data'));
    }

    public function create()
    {
        return view('admin.faq_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required'
        ]);

        $faq = new Faq();
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->language_id = $request->language_id;
        $faq->save();

        return redirect()->route('admin_faq_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $faq_data = Faq::where('id',$id)->first();
        return view('admin.faq_edit', compact('faq_data'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required'
        ]);

        $faq = Faq::where('id',$id)->first();
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->language_id = $request->language_id;
        $faq->update();

        return redirect()->route('admin_faq_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $faq = Faq::where('id',$id)->first();
        $faq->delete();

        return redirect()->route('admin_faq_show')->with('success', 'Data is deleted successfully.');

    }
}
