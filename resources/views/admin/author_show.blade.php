@extends('admin.layout.app')

@section('heading', 'Authors')

@section('button')
<a href="{{ route('admin_author_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($row->photo == NULL)
                                        <img src="{{ asset('uploads/default.png') }}" alt="" style="width:100px;">
                                        @else
                                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="" style="width:100px;">
                                        @endif
                                        
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_author_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_author_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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