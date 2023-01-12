@extends('layouts.app')

@section('page-header', 'Nova Notícia')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('campuses.update', $campus) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" @class(["form-control", 'is-invalid' => $errors->has('name')]) value="{{ old('name', $campus->name) }}" autofocus>
            </div>

            <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" name="address" id="address" @class(["form-control", 'is-invalid' => $errors->has('address')]) value="{{ old('address', $campus->address) }}">
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="number" name="cnpj" id="cnpj" @class(["form-control", 'is-invalid' => $errors->has('cnpj')]) value="{{ old('cnpj', $campus->cnpj) }}">
            </div>

            <div class="form-group">
                <label for=""></label>
                <a href="{{ route('campuses.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
