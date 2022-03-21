@extends('welcome')

@section('title-content')
    Добавление товара
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                @if(isset($product))
                    <h1 class="display-5 my-4">Редактировать: {{ $product->name }}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Товар отредактирован</div>
                    @endif
                @else
                    <h1 class="display-5 my-4">Добавить товар</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Товар успешно создан</div>
                    @endif
                @endif
                <form method="POST" action="{{ (isset($product) ? route('admin.product.update', ['product' => $product->id]) : route('admin.product.store')) }}" enctype="multipart/form-data">
                    @csrf
                    @isset($product)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Наименование товара: </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="InputName" aria-describedby="InputNameFeedback" value="{{ old('name') }}">
                        @error('name')<div id="InputNameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputPrice" class="form-label">Цена товара: </label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="InputPrice" aria-describedby="InputPriceFeedback" value="{{ old('price') }}">
                        @error('price')<div id="InputPriceFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputMade" class="form-label">Место создания: </label>
                        <input type="text" name="made" class="form-control @error('made') is-invalid @enderror" id="InputName" aria-describedby="InputMadeFeedback" value="{{ old('made') }}">
                        @error('made')<div id="InputMadeFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputPhoto" class="form-label">Фото товара: </label>
                        <input type="file" name="photo_file" class="form-control @error('photo_file') is-invalid @enderror" id="InputPhoto" aria-describedby="InputPhotoFeedback" accept="image/*" value="{{ old('photo_file') }}">
                        @error('photo_file')<div id="InputPhotoFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputDescription" class="form-label">Описание товара: </label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="InputDescription" aria-describedby="InputDescriptionFeedback" rows="3">{{ old('description') }}</textarea>
                        @error('description')<div id="InputDescriptionFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($product))
                            Отредактировать товар
                        @else
                            Создать товар
                        @endif
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
