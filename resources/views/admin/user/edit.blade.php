@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Редактировать пользователя</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.user.update', ['user' => $user])}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="is_admin">Права доступа</label>
                    <select class="form-control" id="is_admin" name="is_admin">
                        <option value="1">Администратор</option>
                        <option value="0" @if(!$user->is_admin) selected @endif>Пользователь</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
