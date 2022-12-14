@extends('admin.layout.app')

@section('heading', 'Posts')

@section('button')
<a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Thumbnail</th>
                                    <th>Post Title</th>
                                    <th>Sub Category</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Admin</th>
                                    <th>Language</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->post_photo) }}" alt="" style="width:200px;">
                                    </td>
                                    <td>{{ $row->post_title }}</td>
                                    <td>{{ $row->rSubCategory->sub_category_name }}</td>
                                    <td>{{ $row->rSubCategory->rCategory->category_name }}</td>
                                    <td>
                                        @if($row->author_id != 0)
                                        {{ \App\Models\Author::where('id',$row->author_id)->first()->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->admin_id != 0)
                                        {{ Auth::guard('admin')->user()->name }}
                                        @endif
                                    </td>
                                    <td>{{ $row->rLanguage->name }}</td>
                                    <td class="pt_10 pb_10">
                                        @if($row->admin_id!=0)
                                        <a href="{{ route('admin_post_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_post_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection