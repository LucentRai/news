@if(!session()->get('session_short_name'))
    @php
    $current_short_name = $global_short_name;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif
@php
    $current_language_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
@endphp

<div class="sidebar">

    <div class="widget">
        @foreach($global_sidebar_top_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif
            </div>
        @endforeach
    </div>


    <div class="widget">
        <div class="tag-heading">
            <h2>{{ TAGS }}</h2>
        </div>
        <div class="tag">
            @php
            $all_tags = \App\Models\Tag::select('tag_name')->distinct()->get();
            @endphp
            @foreach($all_tags as $item)
            @php
                $count = 0;
                $all_data = \App\Models\Tag::where('tag_name',$item->tag_name)->get();
                foreach($all_data as $row) {
                    $temp = \App\Models\Post::where('id',$row->post_id)->where('language_id',$current_language_id)->count();
                    if($temp>0) {
                        $count=1;
                        break;
                    }
                }
                if($count==0)
                {
                    continue;
                }
            @endphp
            <div class="tag-item">
                <a href="{{ route('tag_posts_show',$item->tag_name) }}"><span class="badge bg-secondary">{{ $item->tag_name }}</span></a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="widget">
        <div class="archive-heading">
            <h2>{{ ARCHIVE }}</h2>
        </div>
        <div class="archive">
            @php
                $archive_array = [];
                $all_post_data = \App\Models\Post::orderBy('id','desc')->get();
                foreach($all_post_data as $row) {
                    $ts = strtotime($row->created_at);
                    $month = date('m',$ts);
                    $month_full = date('F',$ts);
                    $year = date('Y',$ts);
                    $archive_array[] = $month.'-'.$month_full.'-'.$year;
                }
                $archive_array = array_values(array_unique($archive_array));
            @endphp
            <form action="{{ route('archive_show') }}" method="post">
                @csrf
                <select name="archive_month_year" class="form-select" onChange="this.form.submit()">
                    <option value="">{{ SELECT_MONTH }}</option>
                    @for($i=0;$i<count($archive_array);$i++)
                        @php
                            $temp_arr = explode('-',$archive_array[$i]);
                        @endphp
                        <option value="{{ $temp_arr[0].'-'.$temp_arr[2] }}">{{ $temp_arr[1] }}, {{ $temp_arr[2] }}</option>
                    @endfor
                </select>
            </form>
        </div>
    </div>

    <div class="widget">
        @php
        $live_channel_data = \App\Models\LiveChannel::where('language_id',$current_language_id)->get();
        @endphp
        @foreach($live_channel_data as $item)
            <div class="live-channel">
                <div class="live-channel-heading">
                    <h2>{{ $item->heading }}</h2>
                </div>
                <div class="live-channel-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        @endforeach        
    </div>
    
    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>{{ POPULAR_RECENT_NEWS }}</h2>
            </div>           

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ RECENT_NEWS }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ POPULAR_NEWS }}</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @php
                    $recent_news_data = \App\Models\Post::with('rSubCategory')->where('language_id',$current_language_id)->orderBy('id','desc')->get();
                    @endphp
                    @foreach($recent_news_data as $item)
                        @if($loop->iteration > 5)
                            @break
                        @endif
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        @if($item->author_id==0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                            $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $user_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                        $ts = strtotime($item->updated_at);
                                        $updated_date = date('d F, Y',$ts);
                                        @endphp
                                        <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @php
                    $popular_news_data = \App\Models\Post::with('rSubCategory')->where('language_id',$current_language_id)->orderBy('visitors','desc')->get();
                    @endphp
                    @foreach($popular_news_data as $item)
                        @if($loop->iteration > 5)
                            @break
                        @endif
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        @if($item->author_id==0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                            $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $user_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                        $ts = strtotime($item->updated_at);
                                        $updated_date = date('d F, Y',$ts);
                                        @endphp
                                        <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>



    <div class="widget">
        <div class="poll-heading">
            <h2>{{ ONLINE_POLL }}</h2>
        </div>
        <div class="poll">
            <div class="question">
                @php
                $online_poll_data = \App\Models\OnlinePoll::orderBy('id','desc')->where('language_id',$current_language_id)->first();
                @endphp
                {{ $online_poll_data->question }}
            </div>

            @php
            $total_vote = $online_poll_data->yes_vote+$online_poll_data->no_vote;
            if($online_poll_data->yes_vote == 0)
            {
                $total_yes_percentage = 0;
            }
            else 
            {
                $total_yes_percentage = ($online_poll_data->yes_vote*100)/$total_vote;
                $total_yes_percentage = ceil($total_yes_percentage);
            }
                       
            if($online_poll_data->no_vote == 0)
            {
                $total_no_percentage = 0;
            }
            else
            {
                $total_no_percentage = ($online_poll_data->no_vote*100)/$total_vote;
                $total_no_percentage = ceil($total_no_percentage);
            }            
            @endphp

            @if(session()->get('current_poll_id') == $online_poll_data->id)
            <div class="poll-result">                        
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width:100px;">{{ YES }} ({{ $online_poll_data->yes_vote }})</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $total_yes_percentage }}%" aria-valuenow="{{ $total_yes_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_yes_percentage }}%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ NO }} ({{ $online_poll_data->no_vote }})</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_no_percentage }}%" aria-valuenow="{{ $total_no_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_no_percentage }}%</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('poll_previous') }}" class="btn btn-primary old" style="margin-top:0;">{{ OLD_RESULTS }}</a>
            </div>
            @endif

            @if(session()->get('current_poll_id') != $online_poll_data->id)
            <div class="answer-option">
                <form action="{{ route('poll_submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $online_poll_data->id }}">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_1" value="Yes" checked>
                        <label class="form-check-label" for="poll_id_1">{{ YES }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_2" value="No">
                        <label class="form-check-label" for="poll_id_2">{{ NO }}</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
                        <a href="{{ route('poll_previous') }}" class="btn btn-primary old">{{ OLD_RESULTS }}</a>
                    </div>
                </form>
            </div>
            @endif



        </div>
    </div>

    <div class="widget">
        @foreach($global_sidebar_bottom_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif
            </div>
        @endforeach
    </div>

</div>