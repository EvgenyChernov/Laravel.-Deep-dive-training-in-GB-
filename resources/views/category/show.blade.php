@extends('layouts.main')
@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        <h2>Показаны новости категории с названием <br>{{$category->title}} <br> и ID = {{$category->id}}</h2>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            @forelse ($newsList as $key => $news)
                <div class="post-preview">

                    <a href="{{ route('news.show', ['id' => $news->id]) }}">
                        <h2 class="post-title"> {!! $news->title !!}</h2>
                        <h3 class="post-subtitle">
                            {!! $news->text !!}
                        </h3>
                    </a>
                    <p class="post-meta">Опубликовал Админ <a href="#">Start Bootstrap</a> {{now()}} </p>
                </div>
                <hr>
            @empty
                <h2>Новостей нет</h2>
        @endforelse
        <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@endsection
