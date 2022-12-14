<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;

class AdminOnlinePollController extends Controller
{
    public function show()
    {
        $online_poll_data = OnlinePoll::orderBy('id','desc')->get();
        return view('admin.online_poll_show', compact('online_poll_data'));
    }

    public function create()
    {
        return view('admin.online_poll_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required'
        ]);

        $online_poll = new OnlinePoll();
        $online_poll->question = $request->question;
        $online_poll->yes_vote = 0;
        $online_poll->no_vote = 0;
        $online_poll->language_id = $request->language_id;
        $online_poll->save();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $online_poll_data = OnlinePoll::where('id',$id)->first();
        return view('admin.online_poll_edit', compact('online_poll_data'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'question' => 'required'
        ]);

        $online_poll_data = OnlinePoll::where('id',$id)->first();
        $online_poll_data->question = $request->question;
        $online_poll_data->language_id = $request->language_id;
        $online_poll_data->update();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $online_poll_data = OnlinePoll::where('id',$id)->first();
        $online_poll_data->delete();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is deleted successfully.');

    }
}
