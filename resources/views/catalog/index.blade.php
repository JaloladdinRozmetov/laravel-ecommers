@extends('layout.site', ['title' => 'Каталог товаров'])

@section('content')
    <h2 class="mb-4">Разделы каталога</h2>
    <div class="row mb-5">
        @foreach ($parentCategories as $category)
            <a style="margin: 5px" href="{{ route('catalog.products', ['category_id'=>$category->id]) }}"
               class="btn btn-dark">{{$category->name}}</a>
        @endforeach
    </div>
    <h1>Каталог товаров</h1>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card list-item">
                    <div class="card-header">
                        <h3 class="mb-0">{{ $product->name }}</h3>
                    </div>
                    <div class="card-body p-0 position-relative">
                        @if ($product->image)
                            @php($url =asset($product->image))
                            <img width="300" height="150" src="{{ $url }}" class="img-fluid" alt="">
                        @else
                            <img width="300" height="150" src="https://via.placeholder.com/300x150" class="img-fluid" alt="">
                        @endif
                    </div>
                    <div class="card-footer">
                        <!-- Форма для добавления товара в корзину -->
                        <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                              method="post" class="d-inline add-to-basket">
                            @csrf
                            <button type="submit" class="btn btn-success">В корзину</button>
                        </form>
                        <a href="{{ route('catalog.product', ['id' => $product->id]) }}"
                           class="btn btn-dark float-right">Смотреть</a>
                    </div>
                </div>
            </div>        @endforeach
    </div>
@endsection
