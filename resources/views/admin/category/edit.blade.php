@extends('layout.admin', ['title' => 'Редактирование категории'])

@section('content')
    <h1>Редактирование категории</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.category.update', ['category' => $category->id]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Наименование"
                   required maxlength="100" value="{{ old('name') ?? $category->name ?? '' }}">
        </div>
        <div class="form-group">
            @php
                $parent_id = old('parent_id') ?? $category->parent_id ?? 0;
            @endphp
            <select name="parent_id" class="form-control" title="Родитель">
                <option value="0">Без родителя</option>
                @foreach($items as $item)
                    <option value="{{$item->id}}" @if($item->id === $category->parent_id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
