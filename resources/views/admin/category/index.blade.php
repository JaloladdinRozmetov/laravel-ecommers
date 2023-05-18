@extends('layout.admin', ['title' => 'Все категории каталога'])

@section('content')
    <h1>Все категории</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-success mb-4">
        Создать категорию
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="40%">Наименование</th>
            <th width="30%">дата добовления</th>
            <th width="10%"><i class="fas fa-edit"></i></th>
            <th width="10%"><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>
                <a href="{{ route('admin.category.show', ['category' => $item->id]) }}"
                   style="font-weight:@if($item->parent_id !== 0) normal @else bold @endif">
                    {{ $item->name }}
                </a>
            </td>
            <td>
              <p>{{$item->created_at}}</p>
            </td>
            <td>
                <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.category.destroy', ['category' => $item->id]) }}"
                      method="post" onsubmit="return confirm('Удалить эту категорию?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                        <i class="far fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
            @endforeach
        </tr>
    </table>
@endsection
