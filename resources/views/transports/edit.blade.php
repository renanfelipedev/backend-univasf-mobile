@extends('layouts.app')

@section('page-header')
    Nova Rota <small>{{ $campus->name }}</small>
@endsection

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('transports.update', [$campus, $transport]) }}" method="POST" class="form-row">
            @csrf
            @method('PUT')

            <div class="form-group col-8">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" @class(['form-control', 'is-invalid' => $errors->has('title')])
                    value="{{ old('title', $transport->title) }}" autofocus>
            </div>

            <div class="form-group col-4">
                <label for="busname">Ônibus</label>
                <input type="text" name="busname" id="busname" @class(['form-control', 'is-invalid' => $errors->has('busname')])
                    value="{{ old('busname', $transport->busname) }}">
            </div>

            <div class="form-group col-12">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" @class(['form-control', 'is-invalid' => $errors->has('description')])
                    value="{{ old('description', $transport->description) }}" autofocus>
            </div>

            <div class="form-group col-6">
                <label for="origin">Origem</label>
                <input type="text" name="origin" id="origin" @class(['form-control', 'is-invalid' => $errors->has('origin')])
                    value="{{ old('origin', $transport->origin) }}" autofocus>
            </div>

            <div class="form-group col-6">
                <label for="destination">Destino</label>
                <input type="text" name="destination" id="destination" @class(['form-control', 'is-invalid' => $errors->has('destination')])
                    value="{{ old('destination', $transport->destination) }}" autofocus>
            </div>

            <div class="form-group col-12">
                <label for=""></label>
                <a href="{{ route('transports.index', $campus) }}" class="btn btn-secondary"><i
                        class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
