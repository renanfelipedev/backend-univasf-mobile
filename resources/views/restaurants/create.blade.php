@extends('layouts.app')

@section('page-header')
    Nova Restaurante Universitário
@endsection

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('restaurants.store') }}" method="POST" class="form-row">
            @csrf

            <div class="form-group col-12">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" @class(['form-control', 'is-invalid' => $errors->has('name')]) value="{{ old('name') }}"
                    autofocus>
            </div>

            <div class="row col-12">
                <div class="form-group col-6">
                    <label for="coffe_start_at">Início do Café da Manhã</label>
                    <input type="time" name="coffe_start_at" id="coffe_start_at" @class([
                        'form-control',
                        'is-invalid' => $errors->has('coffe_start_at'),
                    ])
                        value="{{ old('coffe_start_at') }}">
                </div>

                <div class="form-group col-6">
                    <label for="coffe_end_at">Término do Café da Manhã</label>
                    <input type="time" name="coffe_end_at" id="coffe_end_at" @class(['form-control', 'is-invalid' => $errors->has('coffe_end_at')])
                        value="{{ old('coffe_end_at') }}">
                </div>
            </div>


            <div class="row col-12">
                <div class="form-group col-6">
                    <label for="lunch_start_at">Início do Almoço</label>
                    <input type="time" name="lunch_start_at" id="lunch_start_at" @class([
                        'form-control',
                        'is-invalid' => $errors->has('lunch_start_at'),
                    ])
                        value="{{ old('lunch_start_at') }}">
                </div>

                <div class="form-group col-6">
                    <label for="lunch_end_at">Término do Almoço</label>
                    <input type="time" name="lunch_end_at" id="lunch_end_at" @class(['form-control', 'is-invalid' => $errors->has('lunch_end_at')])
                        value="{{ old('lunch_end_at') }}">
                </div>
            </div>

            <div class="row col-12">
                <div class="form-group col-6">
                    <label for="dinner_start_at">Início da Janta</label>
                    <input type="time" name="dinner_start_at" id="dinner_start_at" @class([
                        'form-control',
                        'is-invalid' => $errors->has('dinner_start_at'),
                    ])
                        value="{{ old('dinner_start_at') }}">
                </div>

                <div class="form-group col-6">
                    <label for="dinner_end_at">Término da Janta</label>
                    <input type="time" name="dinner_end_at" id="dinner_end_at" @class([
                        'form-control',
                        'is-invalid' => $errors->has('dinner_end_at'),
                    ])
                        value="{{ old('dinner_end_at') }}">
                </div>
            </div>




            <div class="form-group col-12">
                <label for=""></label>
                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
