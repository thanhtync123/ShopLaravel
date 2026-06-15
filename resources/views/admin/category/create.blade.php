@extends('admin.dashboard')
@section('content')
@include('components.err_sc')
<form action="{{route('admin.categories.store')}}" method="POST">
    @csrf
    Tên sản phẩm: <input type="text" name="category_name" value="{{ old('category_name') }}">
    <button type="submit">Thêm</button>
</form>
@endsection