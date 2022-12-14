@extends('admin.layout.app')

@section('heading', 'Edit Language')

@section('button')
<a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_language_update',$language_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $language_data->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Default?</label>
                            <select name="is_default" class="form-control">
                                <option value="Yes" @if($language_data->is_default == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if($language_data->is_default == 'No') selected @endif>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection