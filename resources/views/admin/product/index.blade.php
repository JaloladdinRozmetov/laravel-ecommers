@extends('layout.admin', ['title' => 'Все товары каталога'])

@section('content')
    <h1>Все товары</h1>
    <a href="{{ route('admin.product.create') }}" class="btn btn-success mb-4">
        Создать товар
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
            <th width="30%">Категория</th>
            <th width="20%">дата</th>
            <th width="10%">цена</th>
            <th width="20%">фото</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    <a href="{{ route('admin.product.show', ['product' => $product->id]) }}">
                        {{ $product->product_name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.category.show', ['category' => $product->category_id]) }}">
                        {{ $product->category->name }}
                    </a>
                </td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->price }} руб</td>
                <td><img height="60" width="70" src="{{asset($product->image)}}" class="img-fluid" alt=""></td>
                <td>
                    <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                          method="post" onsubmit="return confirm('Удалить этот товар?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <i class="far fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
