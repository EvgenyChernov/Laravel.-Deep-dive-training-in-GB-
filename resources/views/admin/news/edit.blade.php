@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Редактировать новость</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category_id">
                        @forelse($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($category->id === $news->category_id) selected @endif>{{$category->title}}</option>
                        @empty
                            <option value="0">Нет категорий</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$news->title}}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea type="text" id="description" name="description"
                              class="form-control">{!! $news->text !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="is_visible">Текущий статус</label>
                    {{--                    TODO переделать на статус--}}
                    {{--                    <input type="checkbox" id="is_visible" name="is_visible" value="1"--}}
                    {{--                           @if($news->is_visible === true) checked @endif>--}}
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
{{--@push('js')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            --}}{{--$("#name span").html("{{\Str::random(20) }}")--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}
