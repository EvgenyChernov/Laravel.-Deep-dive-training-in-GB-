@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список ресурсов. Всего {{$count}}</h1>
        <a href="{{ route('admin.resource.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новый ресурс</a>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('admin.parsing') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Запарсить активные новости</a>
    </div>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Наименование</th>
                <th>Ссылка на ресурс</th>
                <th>Статус</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $resource)
                <tr id="{{$resource->id}}">
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->title}}</td>
                    <td>{{$resource->body}}</td>
                    <td>{{$resource->status}}</td>
                    <td>{{$resource->created_at}}</td>
                    <td>
                        <a href="{{route('admin.resource.edit',['resource' => $resource])}}">Редактировать</a>
                        <br>
                        <a href="#"
                           onclick="event.preventDefault();
                               document.getElementById('destroy-form{{$resource->id}}').submit();">Удалить</a>
                        <form id="destroy-form{{$resource->id}}"
                              action="{{ route('admin.resource.destroy', ['resource' => $resource->id]) }}"
                              method="POST"
                              style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="4">Новостей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script>
        //TODO переделать удаление через подтверждение
        $(function () {
            $(".delete").on('click', function () {
                let id = $(this).attr('rel');
                if (confirm("Подтверждаете?")) {
                    $.ajax({
                        method: "delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Content-Type': 'application/json',
                        },
                        url: "/admin/news/" + id,
                        complete: function (response) {
                            document.getElementById(id).remove();
                        }
                    });
                }
            });
        });
    </script>
@endpush
