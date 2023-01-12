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

            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6">
                    <label for="state_id">Estado</label>
                    <select name="state_id" id="state_id" class="form-control">
                        <option disabled selected></option>
                        @foreach($states as $state)
                        <option value="{{ $state->id }}" @selected($state->id === $campus->state_id)>{{ $state->uf }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-4 col-md-4 col-sm-6">
                    <label for="city_id">Cidade</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option disabled selected></option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" @selected($city->id === $campus->city_id)>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
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
