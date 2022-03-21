@extends('welcome')

@section('title-content')
    Регистрация
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Регистрация</h1>
                @auth
                    <div class="alert alert-success">Вы зарегистрированы</div>
                @endauth
                @guest
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputFullname" class="form-label">ФИО: </label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="exampleInputFullname" aria-describedby="invalidFullnameFeedback" value="{{ old('fullname') }}">
                            @error('fullname')<div id="invalidFullnameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputLogin" class="form-label">Логин: </label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="exampleInputLogin" aria-describedby="invalidLoginFeedback" value="{{ old('login') }}">
                            @error('login')<div id="invalidLoginFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Элекстронная почта: </label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="invalidEmailFeedback" value="{{ old('email') }}">
                            @error('email')<div id="invalidEmailFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputAddress" class="form-label">Ваш адрес: </label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputAddress" aria-describedby="invalidAddressFeedback" value="{{ old('address') }}">
                            @error('address')<div id="invalidAddressFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Пароль: </label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password')<div id="invalidPasswordFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputConfirmation" class="form-label">Подтверждение пароля: </label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputConfirmation" aria-describedby="invalidConfirmationFeedback">
                            @error('password_confirmation')<div id="invalidConfirmationFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
