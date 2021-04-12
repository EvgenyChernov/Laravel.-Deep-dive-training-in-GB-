@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Форма заказа для получения выгрузки данных из какого-либо источника (Функционал не
                реализован)</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('orders.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email - адрес</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="description">Информации о том, что Вы хотите получить</label>
                    <textarea type="text" id="description" name="description"
                              class="form-control">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
@endsection
