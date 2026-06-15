@extends('admin.dashboard')
@section('content')

@if($errors->any())
<div class="alert alert-danger">{{ $errors }}</div>
@endif
<form action="{{route('admin.categories.update',$category->id)}}" method="POST">
    @csrf
    @method('PUT')
    Tên sản phẩm: <input type="text" name="category_name" value="{{ old('category_name',$category->name) }}">
    <button type="submit">Thêm</button>
</form>
@endsection