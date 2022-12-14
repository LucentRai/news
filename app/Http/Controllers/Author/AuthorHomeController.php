<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class AuthorHomeController extends Controller
{
    public function index()
    {
        $total_news = Post::where('author_id',Auth::guard('author')->user()->id)->count();
        return view('author.home', compact('total_news'));
    }
}
