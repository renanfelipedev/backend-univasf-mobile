@extends('layouts.app')

@section('page-header', 'Novo Campus')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('campuses.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" @class(["form-control", 'is-invalid' => $errors->has('name')]) value="{{ old('name') }}" autofocus>
            </div>

            <div class="form-group">
                <label for="state_id">Estado</label>
                <select name="state_id" id="state_id" class="form-control">
                    <option disabled selected></option>
                    @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->uf }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="city_id">Cidade</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option disabled selected></option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" name="address" id="address" @class(["form-control", 'is-invalid' => $errors->has('address')]) value="{{ old('address') }}">
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="texte" name="cnpj" id="cnpj" @class(["form-control", 'is-invalid' => $errors->has('cnpj')]) value="{{ old('cnpj') }}">
            </div>

            <div class="form-group">
                <label for=""></label>
                <a href="{{ route('campuses.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
