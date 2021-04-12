@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список Отзывов. Всего {{$count}}</h1>
    </div>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя пользователя</th>
                <th>Отзыв</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reviews as $review)
                <tr>
                    <td>{{$review->id}}</td>
                    <td>{!! $review->userCustomers->name!!}</td>
                    <td>{!! $review->text !!}</td>
                    <td>{{$review->created_at}}</td>

                    <td>
                        <a href="{{route('admin.feedback.edit',['feedback' => $review->id])}}">редактировать</a>
                        <a href="#"
                           onclick="event.preventDefault();
                           document.getElementById('destroy-form{{$review->id}}').submit();">Удалить</a>
                        <form id="destroy-form{{$review->id}}"
                              action="{{ route('admin.feedback.destroy', ['feedback' => $review->id]) }}"
                              method="POST"
                              style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="4">Отзывов нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
