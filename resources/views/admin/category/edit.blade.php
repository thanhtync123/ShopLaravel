@extends('admin.dashboard')
@section('content')
@include('components.err_sc')
<form action="{{route('admin.categories.update',$category->id)}}" method="POST">
    @csrf
    @method('PUT')
    Tên sản phẩm: <input type="text" name="category_name" value="{{ old('category_name',$category->name) }}">
    <button type="submit">Sửa</button>
</form>
@endsection