@extends('layouts.app')

@section('page-header', 'Nova Notícia')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('states.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" @class(["form-control", 'is-invalid' => $errors->has('name')]) value="{{ old('name') }}" autofocus>
            </div>

            <div class="form-group">
                <label for="uf">UF</label>
                <input type="text" name="uf" id="uf" @class(["form-control", 'is-invalid' => $errors->has('uf')]) value="{{ old('uf') }}">
            </div>

            <div class="form-group">
                <label for=""></label>
                <a href="{{ route('states.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
