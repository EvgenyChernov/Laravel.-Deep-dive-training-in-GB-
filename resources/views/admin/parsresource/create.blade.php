@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Добавить ресурс</h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.resource.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="body">Ссылка на ресурс</label>
                    <input type="text" id="body" name="body" class="form-control" value="{{old('body')}}">
                </div>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select class="form-control" id="status" name="status">
                        @foreach($statuses as $key => $status)
                            <option value="{{$key}}">{{$status}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
