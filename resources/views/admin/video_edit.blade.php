@extends('admin.layout.app')

@section('heading', 'Edit Video')

@section('button')
<a href="{{ route('admin_video_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_video_update',$video_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Video Id *</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $video_data->video_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Caption *</label>
                            <input type="text" class="form-control" name="caption" value="{{ $video_data->caption }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach($global_language_data as $row)
                                <option value="{{ $row->id }}" @if($row->id == $video_data->language_id) selected @endif>{{ $row->name }}</option>
                                @endforeach
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