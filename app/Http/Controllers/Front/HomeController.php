<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Video;
use App\Models\Category;
use App\Models\Language;
use App\Helper\Helpers;

class HomeController extends Controller
{
    public function index()
    {
        Helpers::read_json();

        if(!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        } else {
            $current_short_name = session()->get('session_short_name');
        }    
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        
        $video_data = Video::where('language_id',$current_language_id)->get();
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        $setting_data = Setting::where('id',1)->first();
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->get();
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->where('language_id',$current_language_id)->get();
        $category_data = Category::orderBy('category_order','asc')->where('language_id',$current_language_id)->get();
        return view('front.home', compact('home_ad_data', 'setting_data', 'post_data', 'sub_category_data','video_data','category_data'));
    }

    public function get_subcategory_by_category($id)
    {
        Helpers::read_json();
        
        $sub_category_data = SubCategory::where('category_id',$id)->get();
        $response = "<option value=''>".SELECT_SUBCATEGORY."</option>";
        foreach($sub_category_data as $item) {
            $response .= '<option value="'.$item->id.'">'.$item->sub_category_name.'</option>';
        }

        return response()->json(['sub_category_data'=>$response]);
    }

    public function search(Request $request)
    {
        Helpers::read_json();
        
        $post_data = Post::with('rSubCategory')->orderBy('id','desc');
        if($request->text_item!=''){
            $post_data = $post_data->where('post_title', 'like', '%'.$request->text_item.'%');
        }
        if($request->sub_category!='') {
            $post_data = $post_data->where('sub_category_id', $request->sub_category);
        }
        $post_data = $post_data->paginate(12);

        return view('front.search_result', compact('post_data'));
    }
}
