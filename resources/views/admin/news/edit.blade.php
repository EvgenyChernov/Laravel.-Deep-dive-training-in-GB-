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
            <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}"
                  enctype="multipart/form-data">
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
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i>Загрузить используя файловый менеджер</a>
                    </span>
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <img src="{{ \Storage::disk('public')->url( $news->image ) }}" style="width: 220px;">
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
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
        var lfm = function (id, type, options) {
            let button = document.getElementById(id);

            button.addEventListener('click', function () {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));

                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));

                    // clear previous preview
                    target_preview.innerHtml = '';

                    // set or change the preview image src
                    items.forEach(function (item) {
                        let img = document.createElement('img')
                        img.setAttribute('style', 'height: 5rem')
                        img.setAttribute('src', item.thumb_url)
                        target_preview.appendChild(img);
                    });

                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };
    </script>
@endpush
{{--@push('js')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            --}}{{--$("#name span").html("{{\Str::random(20) }}")--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}
