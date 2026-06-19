@extends('admin.dashboard')
@section('content')
@include('components.err_sc')
<form action="{{route('admin.products.create')}}" method="POST">
    @csrf
ID: <input type="text" name="txb_id" readonly> <br>
Tên sản phẩm: <input type="text" name="txb_name" required> <br>
Danh mục: 
<select name="category_id" required>
    <option value="">-- Chọn danh mục --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select> <br>
Giá: <input type="number" name="nb_price" required> <br>
Số lượng: <input type="number" name="nb_quantity" required> <br>
Mô tả: <input type="area" name="txb_description" required>
<button type="submit" name="btnSubmit">Thêm</button>
</form>
<table class="table table-bordered border-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->category_name}}</td>
            <td>{{ number_format($item->price, 0, ',', '.') }}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->description}}</td>
            <td>
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                @endif
            </td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>
           <button
                type="button"
                onclick="editProduct(
                    '{{ $item->id }}',
                    '{{ $item->name }}',
                    '{{ $item->price }}',
                    '{{ $item->quantity }}',
                    '{{ $item->description }}',
                    '{{ $item->category_name }}'
                )">
                Sửa
</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<script>
function editProduct(id,name,price,quantity,description,category_id)
{
    try {
    // document.getElementsByName("txb_id")[0].value = id;
    // document.getElementsByName("txb_name")[0].value = name;
    // document.getElementsByName("nb_price")[0].value = price;
    // document.getElementsByName("nb_quantity")[0].value = quantity;
    // document.getElementsByName("txb_description")[0].value = description;
    // document.getElementsByName("btnSubmit")[0].innerHTML = "Cập nhật";
    // document.querySelector('[name="category_id"]').value = category_id;
} catch (error) {
        // alert(error)
}
   

}
</script>