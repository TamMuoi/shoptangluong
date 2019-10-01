@extends('admincp.index')
@section('content')
    <form role="form" action="{{ url('admincp/cateproduct/edit').'/'.$data->id }}" method="POST">
        @csrf
        <fieldset class="form-group">
            <label>Name</label>
            <input class="form-control" name="name" value="{{$data->name}}">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </fieldset>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option {{ $data->active == 0 ? 'selected' :'' }} value="0">Không hiển thị</option>
                <option {{ $data->active == 1 ? 'selected' :'' }} value="1">Hiển thị</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a class="btn btn-info" href="{{ url('admincp/cateproduct') }}" type="submit" title="Cancel">Quay lại</a>
    </form>
@endsection
