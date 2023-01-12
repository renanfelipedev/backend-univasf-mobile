@extends('layouts.app')

@section('page-header', 'Nova Cidade')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('cities.store') }}" method="POST">
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
                <label for=""></label>
                <a href="{{ route('cities.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
