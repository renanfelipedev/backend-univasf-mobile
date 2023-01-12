@extends('layouts.app')

@section('page-header', 'Calendários')

@section('page-content')

    <a href="{{ route('calendars.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo Calendário
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @forelse($calendars as $calendar)
                <tr class="text-sm">
                    <td class="col-4">{{ $calendar->title }}</td>

                    <td class="col-8">
                        <form action="{{ route('calendars.destroy', $calendar) }}" method="POST" id="delete-calendars-{{ $loop->iteration }}" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a href="{{ route('events.index', $calendar) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-calendar-plus"></i> Ver eventos
                        </a>

                        <a href="{{ route('calendars.edit', $calendar) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i> editar
                        </a>

                        <button form="delete-calendars-{{ $loop->iteration }}" type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> excluir
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-info">
                        <i class="fa fa-info-circle"></i> Nenhum calendário cadastrado
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
