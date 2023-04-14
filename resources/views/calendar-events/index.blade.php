@extends('layouts.app')

@section('page-header', 'Eventos do calendário acadêmico')

@section('page-content')
    <div class="row">
        <div class="col-4">
            <div class="card card-body row">
                <form action="{{ route('calendar-events.store') }}" method="POST">
                    @csrf

                    <div class="form-group col">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" @class(['form-control', 'is-invalid' => $errors->has('title')])
                            value="{{ old('title') }}" autofocus>
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
        </div>
        <div class="col-8">
            <div class="card card-body table-responsive">
                <table class="table table-borderless table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr class="text-sm">
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->formatted_date }}</td>
                                <td>
                                    <form action="{{ route('calendar-events.destroy', $event) }}" method="POST"
                                        id="delete-event-{{ $loop->iteration }}"
                                        onsubmit="return confirm('Deseja realmente excluir?');">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button form="delete-event-{{ $loop->iteration }}" type="submit"
                                        class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i> excluir
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-info">
                                    <i class="fa fa-info-circle"></i> Nenhum evento cadastrado
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
