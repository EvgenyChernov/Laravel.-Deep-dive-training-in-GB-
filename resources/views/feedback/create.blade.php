@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Обратная связь</h2>
            @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="post" action="{{route('feedback.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Имя пользователя</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="comment">Комментарий</label>
                    <textarea type="text" id="comment" name="comment"
                              class="form-control">{!! old('comment') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>


        </div>
    </div>
@endsection
