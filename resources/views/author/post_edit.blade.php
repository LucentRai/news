@extends('author.layout.app')

@section('heading', 'Edit Post')

@section('button')
<a href="{{ route('author_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('author_post_update',$post_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Post Title *</label>
                            <input type="text" class="form-control" name="post_title" value="{{ $post_single->post_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail *</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10">{{ $post_single->post_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Post Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/'.$post_single->post_photo) }}" alt="" style="width:300px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Post Photo *</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="sub_category_id" class="form-control select2">
                                @foreach($sub_categories as $item)
                                <option value="{{ $item->id }}" @if($item->id == $post_single->sub_category_id) selected @endif>{{ $item->sub_category_name }} ({{ $item->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1" @if($post_single->is_share == 1) selected @endif>Yes</option>
                                <option value="0" @if($post_single->is_share == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1" @if($post_single->is_comment == 1) selected @endif>Yes</option>
                                <option value="0" @if($post_single->is_comment == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Tags</label>
                            <table class="table table-bordered">
                                @foreach($existing_tags as $item)
                                    <tr>
                                        <td>{{ $item->tag_name }}</td>
                                        <td>
                                            <a href="{{ route('author_post_delete_tag', [$item->id,$post_single->id]) }}" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="form-group mb-3">
                            <label>New Tags</label>
                            <input type="text" class="form-control" name="tags" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach($global_language_data as $row)
                                <option value="{{ $row->id }}" @if($row->id == $post_single->language_id) selected @endif>{{ $row->name }}</option>
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