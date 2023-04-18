@extends('layouts.app')

@section('page-header', 'Eventos')

@section('page-content')

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo evento
    </a>

    <div class="card card-body table-responsive">
        <table class="table  table-hover table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Description</th>
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
                            <form action="{{ route('events.destroy', $event) }}" method="POST"
                                id="delete-event-{{ $loop->iteration }}"
                                onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href="{{ route('events.edit', $event) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> editar
                            </a>

                            <button form="delete-event-{{ $loop->iteration }}" type="submit" class="btn btn-xs btn-danger">
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
@endsection
