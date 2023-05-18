@extends('layout.admin', ['title' => 'Просмотр товара'])

@section('content')
    <h1>Просмотр товара</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Название:</strong> {{ $product->product_name }}</p>
            <p><strong>Категория:</strong> {{ $product->category->name }}</p>
        </div>
        <div class="col-md-6">
            <img height="200" width="200" src="{{ asset($product->image) }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(isset($product->description))
                <p><strong>Описание</strong></p>
                <p>{{ $product->description }}</p>
            @else
                <p>Описание отсутствует</p>
            @endif
            <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"
               class="btn btn-success">
                Редактировать товар
            </a>
            <form method="post" class="d-inline" onsubmit="return confirm('Удалить этот товар?')"
                  action="{{ route('admin.product.destroy', ['product' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Удалить товар
                </button>
            </form>
        </div>
    </div>
@endsection
