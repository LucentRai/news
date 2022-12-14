@extends('admin.layout.app')

@section('heading', 'Setting')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    
                    <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                        Home Page
                                    </a>
                                    <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                        Logo and Favicon
                                    </a>
                                    <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                        Top Bar
                                    </a>
                                    <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                        Theme Color
                                    </a>
                                    <a class="nav-link" id="v-5-tab" data-toggle="pill" href="#v-5" role="tab" aria-controls="v-5" aria-selected="false">
                                        Google Analytic
                                    </a>
                                    <a class="nav-link" id="v-6-tab" data-toggle="pill" href="#v-6" role="tab" aria-controls="v-6" aria-selected="false">
                                        Disqus Comment
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                        <!-- Home Page Start -->
                                        <div class="form-group mb-3">
                                            <label>News Ticker Total *</label>
                                            <input type="text" name="news_ticker_total" class="form-control" value="{{ $setting_data->news_ticker_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>News Ticker Status</label>
                                            <select name="news_ticker_status" class="form-control">
                                                <option value="Show" @if($setting_data->news_ticker_status == 'Show') selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->news_ticker_status == 'Hide') selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Video Item Total *</label>
                                            <input type="text" name="video_total" class="form-control" value="{{ $setting_data->video_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Video Item Status</label>
                                            <select name="video_status" class="form-control">
                                                <option value="Show" @if($setting_data->video_status == 'Show') selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->video_status == 'Hide') selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <!-- Home Page End -->
                                    </div>

                                    <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                        <!-- Logo and Facivon Start -->
                                        <div class="form-group mb-3">
                                            <label>Existing Logo</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->logo) }}" alt="" style="height:80px;">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Change Logo</label>
                                            <div>
                                                <input type="file" name="logo">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Existing Favicon</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->favicon) }}" alt="" style="height:30px;">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Change Favicon</label>
                                            <div>
                                                <input type="file" name="favicon">
                                            </div>
                                        </div>
                                        <!-- Logo and Facivon End -->
                                    </div>


                                    <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">
                                        <!-- Top Bar Start -->
                                        <div class="form-group mb-3">
                                            <label>Date Status</label>
                                            <select name="top_bar_date_status" class="form-control">
                                                <option value="Show" @if($setting_data->top_bar_date_status == 'Show') selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->top_bar_date_status == 'Hide') selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Email Address *</label>
                                            <input type="text" name="top_bar_email" class="form-control" value="{{ $setting_data->top_bar_email }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Email Status</label>
                                            <select name="top_bar_email_status" class="form-control">
                                                <option value="Show" @if($setting_data->top_bar_email_status == 'Show') selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->top_bar_email_status == 'Hide') selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <!-- Top Bar End -->
                                    </div>



                                    <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">
                                        <!-- color Start -->
                                        <div class="form-group mb-3">
                                            <label>Theme Color 1</label>
                                            <input type="text" name="theme_color_1" class="form-control jscolor" value="{{ $setting_data->theme_color_1 }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Theme Color 2</label>
                                            <input type="text" name="theme_color_2" class="form-control jscolor" value="{{ $setting_data->theme_color_2 }}">
                                        </div>
                                        <!-- color End -->
                                    </div>


                                    <div class="pt_0 tab-pane fade" id="v-5" role="tabpanel" aria-labelledby="v-5-tab">
                                        <!-- Analytic Start -->
                                        <div class="form-group mb-3">
                                            <label>Analytic ID</label>
                                            <input type="text" name="analytic_id" class="form-control" value="{{ $setting_data->analytic_id }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="analytic_status" class="form-control">
                                                <option value="Show" @if($setting_data->analytic_status == 'Show') selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->analytic_status == 'Hide') selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <!-- Analytic End -->
                                    </div>



                                    <div class="pt_0 tab-pane fade" id="v-6" role="tabpanel" aria-labelledby="v-6-tab">
                                        <!-- Disqus Start -->
                                        <div class="form-group mb-3">
                                            <label>Disqus Code</label>
                                            <textarea name="disqus_code" class="form-control" cols="30" rows="10" style="height:200px;">{{ $setting_data->disqus_code }}</textarea>
                                        </div>
                                        <!-- Disqus End -->
                                    </div>



                                    

                                    



                                </div>
                            </div>
                        </div>

                        <div class="form-group mt_30">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection