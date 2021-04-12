@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список категорий. Всего {{$count}} категорий</h1>
        <a href="{{route('admin.category.create')}}"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новую категорию</a>
    </div>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Наименование категории</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a href="{{route('admin.category.edit',['category' => $category->id])}}">Редактировать</a>&nbsp;
                        <a href="#"
                           onclick="event.preventDefault();
                               document.getElementById('destroy-form{{$category->id}}').submit();">Удалить</a>
                        <form id="destroy-form{{$category->id}}"
                              action="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                              method="POST"
                              style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="4">Категорий нет</td>
            @endforelse
            </tbody>
        </table>
        <div class="">
            {{$categories->links()}}
        </div>
    </div>
@endsection
