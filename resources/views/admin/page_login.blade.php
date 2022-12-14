@extends('admin.layout.app')

@section('heading', 'Edit Login Page Content')

@section('main_content')
<div class="section-body">
    
    
        <div class="row">
            <div class="col-12">


                @foreach($page_data as $row)
                <h5 style="color:deeppink">Language: {{ $row->rLanguage->name }}</h5>
                <form action="{{ route('admin_page_login_update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $row->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="login_title" value="{{ $row->login_title }}">
                        </div>                        
                        <div class="form-group mb-3">
                            <label>Status?</label>
                            <select name="login_status" class="form-control">
                                <option value="Show" @if($row->login_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($row->login_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                </form>
                @endforeach


            </div>
            
        </div>
        

        
</div>
@endsection