@extends('layouts.app')

@section('page-header', 'Novo evento')

@section('page-content')
    <div class="card card-body row">
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group col">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" @class(["form-control", 'is-invalid' => $errors->has('title')]) value="{{ old('title', $event->title) }}" autofocus>
            </div>

            <div class="form-group col">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" @class(["form-control", 'is-invalid' => $errors->has('description')]) value="{{ old('description', $event->description) }}" >
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="start_at">Data de início</label>
                    <input type="date" name="start_at" id="start_at" @class(["form-control", 'is-invalid' => $errors->has('start_at')]) value="{{ old('start_at', $event->start_at) }}" >
                </div>

                <div class="form-group col-6">
                    <label for="end_at">Data de término</label>
                    <input type="date" name="end_at" id="end_at" @class(["form-control", 'is-invalid' => $errors->has('end_at')]) value="{{ old('end_at', $event->end_at) }}" >
                </div>
            </div>

            <div class="form-group col">
                <label for="date">Data do evento</label>
                <input type="date" name="date" id="date" @class(["form-control", 'is-invalid' => $errors->has('date')]) value="{{ old('date', $event->date) }}" >
            </div>

            <div class="form-group col">
                <label for="calendar_id">Calendário Acadêmico</label>
                <select name="calendar_id" id="calendar_id" class="form-control">
                    <option selected disabled></option>
                    @foreach($calendars as $calendar)
                    <option @selected($calendar->id === $event->calendar_id) value="{{ $calendar->id }}">{{ $calendar->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col">
                <label for=""></label>
                <a href="{{ route('events.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
