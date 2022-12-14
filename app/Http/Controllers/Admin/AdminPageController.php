<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_about', compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->about_title = $request->about_title;
        $page->about_detail = $request->about_detail;
        $page->about_status = $request->about_status;
        $page->update();

        return redirect()->route('admin_page_about')->with('success', 'Data is updated successfully.');

    }



    public function faq()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_faq', compact('page_data'));
    }

    public function faq_update(Request $request)
    {
        $request->validate([
            'faq_title' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->faq_title = $request->faq_title;
        $page->faq_detail = $request->faq_detail;
        $page->faq_status = $request->faq_status;
        $page->update();

        return redirect()->route('admin_page_faq')->with('success', 'Data is updated successfully.');

    }


    public function terms()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_terms', compact('page_data'));
    }

    public function terms_update(Request $request)
    {
        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->terms_title = $request->terms_title;
        $page->terms_detail = $request->terms_detail;
        $page->terms_status = $request->terms_status;
        $page->update();

        return redirect()->route('admin_page_terms')->with('success', 'Data is updated successfully.');

    }


    public function privacy()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_privacy', compact('page_data'));
    }

    public function privacy_update(Request $request)
    {
        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->privacy_title = $request->privacy_title;
        $page->privacy_detail = $request->privacy_detail;
        $page->privacy_status = $request->privacy_status;
        $page->update();

        return redirect()->route('admin_page_privacy')->with('success', 'Data is updated successfully.');

    }


    public function disclaimer()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_disclaimer', compact('page_data'));
    }

    public function disclaimer_update(Request $request)
    {
        $request->validate([
            'disclaimer_title' => 'required',
            'disclaimer_detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->disclaimer_title = $request->disclaimer_title;
        $page->disclaimer_detail = $request->disclaimer_detail;
        $page->disclaimer_status = $request->disclaimer_status;
        $page->update();

        return redirect()->route('admin_page_disclaimer')->with('success', 'Data is updated successfully.');

    }


    public function login()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_login', compact('page_data'));
    }

    public function login_update(Request $request)
    {
        $request->validate([
            'login_title' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->login_title = $request->login_title;
        $page->login_status = $request->login_status;
        $page->update();

        return redirect()->route('admin_page_login')->with('success', 'Data is updated successfully.');

    }


    public function contact()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('admin.page_contact', compact('page_data'));
    }

    public function contact_update(Request $request)
    {
        $request->validate([
            'contact_title' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->contact_title = $request->contact_title;
        $page->contact_detail = $request->contact_detail;
        $page->contact_map = $request->contact_map;
        $page->contact_status = $request->contact_status;
        $page->update();

        return redirect()->route('admin_page_contact')->with('success', 'Data is updated successfully.');

    }
}
