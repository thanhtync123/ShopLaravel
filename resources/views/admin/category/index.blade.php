@extends('admin.dashboard')
@section('content')
<button><a href="{{route('admin.categories.create')}}">Thêm danh mục</a></button>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<table class="table table-bordered border-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td><a href="{{ route('admin.categories.edit', $item->id) }}">Sửa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection