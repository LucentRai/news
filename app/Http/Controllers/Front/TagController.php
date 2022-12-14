<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use App\Helper\Helpers;

class TagController extends Controller
{
    public function show($tag_name)
    {
        Helpers::read_json();
        
        $all_data = Tag::where('tag_name',$tag_name)->get();
        $all_post_ids = [];
        foreach($all_data as $row) {
            $all_post_ids[] = $row->post_id;
        }

        $all_posts = Post::orderBy('id','desc')->get();

        return view('front.tag', compact('all_post_ids','all_posts','tag_name'));

    }
}
