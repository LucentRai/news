@extends('admin.layout.app')

@section('heading', 'Edit About Page Content')

@section('main_content')
<div class="section-body">
   
        <div class="row">
            <div class="col-12">


                @foreach($page_data as $row)
                <h5 style="color:deeppink">Language: {{ $row->rLanguage->name }}</h5>
                <form action="{{ route('admin_page_about_update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Title *</label>
                                <input type="text" class="form-control" name="about_title" value="{{ $row->about_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Detail *</label>
                                <textarea name="about_detail" class="form-control snote" cols="30" rows="10">{{ $row->about_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status?</label>
                                <select name="about_status" class="form-control">
                                    <option value="Show" @if($row->about_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if($row->about_status == 'Hide') selected @endif>Hide</option>
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