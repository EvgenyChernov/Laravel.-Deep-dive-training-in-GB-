@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список категорий </h1>
        <a href="{{route('admin.category.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новую категорию</a>
    </div>
    <div class="row">
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
                    <td><a href="">редактировать</a>&nbsp; <a href="">Удалить</a></td>
                </tr>
            @empty
                <td colspan="4">Категорий нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
