@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @forelse ($categories as $category)
                <div class="post-preview">
                    <a href="{{ route('category.show', ['id' => $category->id]) }}">
                        <h2 class="post-title"> {!! $category->title !!}</h2>
                    </a>
                </div>
                <hr>
            @empty
                <h2>Категорий нет</h2>
        @endforelse
        <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@endsection
