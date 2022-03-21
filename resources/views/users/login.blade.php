@extends('welcome')

@section('title-content')
    Авторизация
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Авторизация</h1>
                @auth
                    <div class="alert alert-success">Вы успешно авторизованы</div>
                @endauth
                @guest
                    @error('auth')
                        <div class="alert alert-danger">Неверный логин или пароль</div>
                    @enderror
                    @if(session()->has('register'))
                        <div class="alert alert-primary">Регистрация прошла успешно, выполните авторизацию</div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputLogin" class="form-label">Логин: </label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="exampleInputLogin" aria-describedby="invalidLoginFeedback" value="{{ old('login') }}">
                            @error('login')<div id="invalidLoginFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Пароль: </label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password')<div id="invalidPasswordFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Авторизация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
