@extends('layouts.main')
@section('content')
в данное время функционал не реализован
{{--    <div class="col-lg-8 col-md-10 mx-auto">--}}
{{--        <h2>Показаны новости категории с названием <br>{{$category}} <br> и ID = </h2>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-8 col-md-10 mx-auto">--}}
{{--            @forelse ($category->news as $key => $news)--}}
{{--                <div class="post-preview">--}}

{{--                    <a href="{{ route('news.show', ['id' => $news->id]) }}">--}}
{{--                        <h2 class="post-title"> {!! $news->title !!}</h2>--}}
{{--                        <h3 class="post-subtitle">--}}
{{--                            {!! $news->text !!}--}}
{{--                        </h3>--}}
{{--                    </a>--}}
{{--                    <p class="post-meta">Опубликовал Админ <a href="#">Start Bootstrap</a> {{now()}} </p>--}}
{{--                </div>--}}
{{--                <hr>--}}
{{--            @empty--}}
{{--                <h2>Новостей нет</h2>--}}
{{--        @endforelse--}}
{{--        <!-- Pager -->--}}
{{--            <div class="clearfix">--}}
{{--                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
