@extends('layouts.app')

@section('page-header')
    Nova Rota <small>{{ $campus->name }}</small>
@endsection

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('transports.store', $campus) }}" method="POST" class="form-row">
            @csrf

            <div class="form-group col-8">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" @class(['form-control', 'is-invalid' => $errors->has('title')]) value="{{ old('title') }}"
                    autofocus>
            </div>

            <div class="form-group col-4">
                <label for="busname">Ônibus</label>
                <input type="text" name="busname" id="busname" @class(['form-control', 'is-invalid' => $errors->has('busname')])
                    value="{{ old('busname') }}">
            </div>

            <div class="form-group col-12">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" @class(['form-control', 'is-invalid' => $errors->has('description')])
                    value="{{ old('description') }}" autofocus>
            </div>

            <div class="form-group col-6">
                <label for="origin">Origem</label>
                <input type="text" name="origin" id="origin" @class(['form-control', 'is-invalid' => $errors->has('origin')]) value="{{ old('origin') }}"
                    autofocus>
            </div>

            <div class="form-group col-6">
                <label for="destination">Destino</label>
                <input type="text" name="destination" id="destination" @class(['form-control', 'is-invalid' => $errors->has('destination')])
                    value="{{ old('destination') }}" autofocus>
            </div>

            <div class="form-group col-12">
                <label for=""></label>
                <a href="{{ route('transports.index', $campus) }}" class="btn btn-secondary"><i
                        class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
