@extends('layouts.app')

@section('page-header', 'Editar Cidade')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('cities.update', $city) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" @class(["form-control", 'is-invalid' => $errors->has('name')]) value="{{ old('name', $city->name) }}" autofocus>
            </div>

            <div class="form-group">
                <label for="state_id">Estado</label>
                <select name="state_id" id="state_id" class="form-control">
                    @foreach($states as $state)
                    <option value="{{ $state->id }}" @selected($state->id === $city->state_id)>{{ $state->uf }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for=""></label>
                <a href="{{ route('cities.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
