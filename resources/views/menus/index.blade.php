@extends('layouts.app')

@section('page-header')
    <h1>Novo cardápio para o {{ $restaurant->name }}</h1>
@endsection

@section('page-content')
    <div class="card card-body">

        <div class="form-group">
            <label for="tipo">Tipo de Refeição</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="cafe">Café</option>
                <option value="almoco">Almoço</option>
                <option value="janta">Janta</option>
            </select>
        </div>

    </div>
@endsection
