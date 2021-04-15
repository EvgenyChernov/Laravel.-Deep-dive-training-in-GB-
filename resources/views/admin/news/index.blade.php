@extends('layouts.admin')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список новостей. Всего {{$count}} новостей</h1>
        <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новую новость</a>
    </div>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
                <tr id="{{$newsItem->id}}">
                    <td>{{$newsItem->id}}</td>
                    <td>{!! $newsItem->title !!}</td>
                    <td>{{$newsItem->created_at}}</td>
                    <td><a href="{{route('admin.news.edit',['news' => $newsItem])}}">редактировать</a>
                        <a href="javascript:;" class="delete" rel="{{$newsItem->id}}">Уд.</a>
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
