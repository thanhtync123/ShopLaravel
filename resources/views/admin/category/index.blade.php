@extends('admin.dashboard')
@section('content')
<a href="{{route('admin.categories.create')}}"><button>Thêm</button></a>
@include('components.err_sc')
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
            <td>
                <a href="{{ route('admin.categories.edit', $item->id) }}"><button>Sửa</button></a>
                <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
