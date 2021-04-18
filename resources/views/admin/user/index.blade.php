@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список зарегистрированных пользователей. Всего {{$count}}</h1>
    </div>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Подтвержден</th>
                <th>Права доступа</th>
                <th>Возможные действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr id="{{$user->id}}">
                    <td>{{$user->id}}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{{$user->email}}</td>
                    <td> {{$user->email_verified_at ? 'Подтвержден' : 'Не подтвержден'}}</td>
                    <td>{{$user->is_admin ? 'Администратор' : 'Пользователь'}}</td>
                    <td><a href="{{route('admin.user.edit',['user' => $user])}}">Редактировать</a>
                        <a href="#"
                           onclick="event.preventDefault();
                               document.getElementById('destroy-form{{$user->id}}').submit();">Удалить</a>
                        <form id="destroy-form{{$user->id}}"
                              action="{{ route('admin.user.destroy', ['user' => $user->id]) }}"
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
                        url: "/admin/user/" + id,
                        complete: function (response) {
                            document.getElementById(id).remove();
                        }
                    });
                }
            });
        });
    </script>
@endpush
