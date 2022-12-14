@extends('admin.layout.app')

@section('heading', 'Edit Disclaimer Page Content')

@section('main_content')
<div class="section-body">
    
        <div class="row">
            <div class="col-12">

                @foreach($page_data as $row)
                <h5 style="color:deeppink">Language: {{ $row->rLanguage->name }}</h5>
                <form action="{{ route('admin_page_disclaimer_update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $row->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="disclaimer_title" value="{{ $row->disclaimer_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail *</label>
                            <textarea name="disclaimer_detail" class="form-control snote" cols="30" rows="10">{{ $row->disclaimer_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Status?</label>
                            <select name="disclaimer_status" class="form-control">
                                <option value="Show" @if($row->disclaimer_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($row->disclaimer_status == 'Hide') selected @endif>Hide</option>
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