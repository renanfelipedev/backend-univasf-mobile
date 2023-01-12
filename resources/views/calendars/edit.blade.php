@extends('layouts.app')

@section('page-header', 'Nova Notícia')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('calendars.update', $calendar) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" @class(["form-control", 'is-invalid' => $errors->has('title')]) value="{{ old('title', $calendar->title) }}" autofocus>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="start_at">Data de início</label>
                    <input type="date" name="start_at" id="start_at" @class(["form-control", 'is-invalid' => $errors->has('start_at')]) value="{{ old('start_at', $calendar->start_at) }}" >
                </div>

                <div class="form-group col-lg-6">
                    <label for="end_at">Data de término</label>
                    <input type="date" name="end_at" id="end_at" @class(["form-control", 'is-invalid' => $errors->has('end_at')]) value="{{ old('end_at', $calendar->end_at) }}">
                </div>
            </div>

            <div class="form-group">
                <label for=""></label>
                <a href="{{ route('calendars.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
