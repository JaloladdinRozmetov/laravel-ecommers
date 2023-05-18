@extends('layout.admin', ['title' => 'Редактирование товара'])

@section('content')
    <h1>Редактирование товара</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.product.update', ['product' => $product->id]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="product_name" placeholder="Наименование"
                   required maxlength="100" value="{{ old('product_name') ?? $product->product_name ?? '' }}">
        </div>
        <div class="form-group">
            <!-- цена (руб) -->
            <input type="text" class="form-control w-25 d-inline mr-4" placeholder="Цена (руб.)"
                   name="price" required value="{{ old('price') ?? $product->price ?? '' }}">
        </div>
        <div class="form-group">
            @php
                $category_id = old('category_id') ?? $product->category_id ?? 0;
            @endphp
            <select name="category_id" class="form-control" title="Категория">
                <option value="0">Выберите</option>
                @if (count($items))
                    @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach

                @endif
            </select>
        </div>
        <div class="form-group">
    <textarea class="form-control" name="description" placeholder="Описание"
              rows="4">{{ old('description') ?? $product->description ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file"  name="image" accept="image/png, image/jpeg">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
