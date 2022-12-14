@extends('admin.layout.app')

@section('heading', 'Language Update Detail')

@section('button')
<a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Back to Previous Page</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_language_update_detail_submit',$lang_id) }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th style="width:40px;">SL</th>
                                        <th style="width:45%;">Key</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($json_data as $key=>$value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $key }}</td>
                                        <td>
                                            <input type="hidden" name="arr_key[]" class="form-control" value="{{ $key }}">
                                            <input type="text" name="arr_value[]" class="form-control" value="{{ $value }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection