@extends('admincp.index')
@section('content')
    <div class="card shadow mb-4">
        <div class="row" style="margin: 5px;">
            <div class="col-lg-12">
                <form role="form" action="{{ url('admincp/producttype/edit').'/'.$producttype->id }}" method="POST">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="{{ $producttype->name }}">
                            @if($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                    </fieldset>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="idCategory" value="{{ $producttype->cate_id }}">
                            @foreach($cateproduct as $cate)
                                <option value="{{ $cate->id }}" @if ($cate->id == $producttype->cate_id) selected @endif >{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option {{ $producttype->active == 0 ? 'selected' :'' }} value="0">Không hiển thị</option>
                            <option {{ $producttype->active == 1 ? 'selected' :'' }} value="1">Hiển thị</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection