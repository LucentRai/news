<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Helper\Helpers;

class ArchiveController extends Controller
{
    public function show(Request $request)
    {
        Helpers::read_json();

        $temp = explode('-',$request->archive_month_year);
        $month = $temp[0];
        $year = $temp[1];

        return redirect()->route('archive_detail',[$year,$month]);
        
    }

    public function detail($year,$month)
    {
        Helpers::read_json();
        
        $post_data_archive = Post::with('rSubCategory')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->paginate(12);

        foreach($post_data_archive as $item) {
            $ts = strtotime($item->created_at);
            $updated_date = date('F, Y',$ts);
            break;
        }

        return view('front.archive', compact('post_data_archive','updated_date'));
    }

}
