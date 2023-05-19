@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $product->product_name }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 position-relative">
                            @if ($product->image)
                                @php($url = asset($product->image))
                                <img height="400" src="{{ $url }}" alt="" class="img-fluid">
                            @else
                                <img src="https://via.placeholder.com/600x300" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <p>Цена: {{ number_format($product->price, 2, '.', '') }} руб</p>
                            <!-- Форма для добавления товара в корзину -->
                            <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                                  method="post" class="form-inline add-to-basket">
                                @csrf
                                <label for="input-quantity">Количество</label>
                                <input type="text" name="quantity" id="input-quantity" value="1"
                                       class="form-control mx-2 w-25">
                                <button type="submit" class="btn btn-success">
                                    Добавить в корзину
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mt-4 mb-0">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            @isset($product->category)
                                Категория:
                                <a href="{{ route('catalog.products', ['category_id' => $product->category->id]) }}">
                                    {{ $product->category->name }}
                                </a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
