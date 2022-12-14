@extends('admin.layout.app')

@section('heading', 'Edit FAQ')

@section('button')
<a href="{{ route('admin_faq_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_faq_update',$faq_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>FAQ Title *</label>
                            <input type="text" class="form-control" name="faq_title" value="{{ $faq_data->faq_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>FAQ Detail *</label>
                            <textarea name="faq_detail" class="form-control snote" cols="30" rows="10">{{ $faq_data->faq_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach($global_language_data as $row)
                                <option value="{{ $row->id }}" @if($row->id == $faq_data->language_id) selected @endif>{{ $row->name }}</option>
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