@extends('layouts.app')

@section('page-header', 'Novo evento')

@section('page-content')
    <div class="card card-body row">
        <form action="{{ route('calendar-events.store') }}" method="POST">
            @csrf

            <div class="form-group col">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" @class(['form-control', 'is-invalid' => $errors->has('title')]) value="{{ old('title') }}"
                    autofocus>
            </div>

            <div class="form-group col">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" @class(['form-control', 'is-invalid' => $errors->has('description')])
                    value="{{ old('description') }}">
            </div>

            <div class="form-group col">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" @class(['form-control', 'is-invalid' => $errors->has('link')])
                    value="{{ old('link') }}">
            </div>

            <div class="form-group col">
                <label for="date">Data do evento</label>
                <input type="date" name="date" id="date" @class(['form-control', 'is-invalid' => $errors->has('date')])
                    value="{{ old('date') }}">
            </div>

            <div class="form-group col">
                <label for="calendar_id">Calendário Acadêmico</label>
                <select name="calendar_id" id="calendar_id" class="form-control">
                    <option value="" selected disabled></option>
                    @foreach ($calendars as $calendar)
                        <option value="{{ $calendar->id }}">{{ $calendar->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col">
                <label for=""></label>
                <a href="{{ route('events.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
