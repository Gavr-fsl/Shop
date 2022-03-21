@extends('welcome')

@section('title-content')
    Просмотр товара
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h1 class="display-5 my-4">Товар</h1>
                <div class="card" style="width: 100%;">
                    <div class="card-header">{{ $product->name }}</div>
                    <img src="/public/storage/{{$product->photo }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->made }}</h5>
                        <p class="card-text">Цена: {{ $product->price }}</p>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}" class="card-link">Редактировать</a>
                        <a href="" class="card-link link-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Удалить</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение удаления</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы действительно хотите удалить товар:
                    <br>{{ $product->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <form method="POST" action="{{ route('admin.product.destroy', ['product' => $product->id]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
