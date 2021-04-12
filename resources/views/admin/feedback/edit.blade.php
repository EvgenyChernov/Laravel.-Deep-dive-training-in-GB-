@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Редактировать отзыв</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.feedback.update', ['feedback' => $feedback]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{$feedback->userCustomers->name}}">
                </div>

                <div class="form-group">
                    <label for="text">Отзыв</label>
                    <textarea type="text" id="text" name="text"
                              class="form-control">{!! $feedback->text !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
