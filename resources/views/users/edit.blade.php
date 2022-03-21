@extends('welcome')

@section('title-content')
    Добавление товара
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h1 class="display-5 my-4">Редактриовать аккаунт</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">Профиль успешно отредактирован</div>
                @endif
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputFullname" class="form-label">ФИО: </label>
                        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="exampleInputFullname" aria-describedby="invalidFullnameFeedback" value="{{ Auth::user()->fullname }}">
                        @error('fullname')<div id="invalidFullnameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Ваш адрес: </label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputAddress" aria-describedby="invalidAddressFeedback" value="{{ Auth::user()->address }}">
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
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
