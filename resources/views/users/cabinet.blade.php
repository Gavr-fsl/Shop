@extends('welcome')

@section('title-content')
    Личный кабинет
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h1 class="display-5 my-4">Личный кабинет</h1>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ФИО: {{ Auth::user()->fullname }}</li>
                    <li class="list-group-item">Почта: {{ Auth::user()->email }}</li>
                    <li class="list-group-item">Логин: {{ Auth::user()->login }}</li>
                    <li class="list-group-item">Адрес: {{ Auth::user()->address }}</li>
                    <li class="list-group-item">Адрес: {{ Auth::user()->address }}</li>
                </ul>
                <a href="{{ route('cabinetEdit') }}" class="btn btn-outline-primary mt-4">Редактировать аккаунт</a>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
