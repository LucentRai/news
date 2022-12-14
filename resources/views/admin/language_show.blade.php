@extends('admin.layout.app')

@section('heading', 'Languages')

@section('button')
<a href="{{ route('admin_language_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th>Is Default?</th>
                                    <th>Update Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($language_data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->short_name }}</td>
                                    <td>{{ $row->is_default }}</td>
                                    <td>
                                        <a href="{{ route('admin_language_update_detail',$row->id) }}" class="btn btn-success">Update Detail</a>
                                    </td>
                                    <td class="pt_10 pb_10">
                                        
                                        <a href="{{ route('admin_language_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        
                                        @if($loop->iteration != 1)
                                        <a href="{{ route('admin_language_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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