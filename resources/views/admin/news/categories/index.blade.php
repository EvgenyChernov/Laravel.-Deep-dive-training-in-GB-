@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список категорий </h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
            @forelse($categoryList as $key => $category)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$category}}</td>
                    <td>{{now()}}</td>
                    <td><a href="">редактировать</a>&nbsp; <a href="">Удалить</a></td>
                </tr>
            @empty
                <td colspan="4">Новостей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
