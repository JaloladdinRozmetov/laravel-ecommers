@extends('layout.admin', ['title' => 'Создание категории'])

@section('content')
    <h1>Создание новой категории</h1>
    <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
        @csrf
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Наименование"
                   required maxlength="100" value="{{ old('name') ?? $category->name ?? '' }}">
        </div>
        <div class="form-group">
            <select name="parent_id" class="form-control" title="Родитель">
                <option value="1">Без родителя</option>
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
