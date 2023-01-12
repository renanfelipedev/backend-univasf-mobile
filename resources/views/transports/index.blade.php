@extends('layouts.app')

@section('page-header')
    Rotas <small>{{ $campus->name }}</small>
@endsection

@section('page-content')
    <a href="{{ route('transports.create', $campus) }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Nova rota
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Rota</th>
                    <th>Descrição</th>
                    <th class="col-3">Itinerário</th>
                    <th class="col-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($campus->transports as $transport)
                    <tr class="text-sm">
                        <td>{{ $transport->title }} - ({{ $transport->busname }})</td>
                        <td>{{ $transport->description }}</td>
                        <td>
                            <strong>Origem:</strong> {{ $transport->origin }}
                            <br>
                            <strong>Destino:</strong> {{ $transport->destination }}
                        </td>
                        <td>
                            <form action="{{ route('campuses.destroy', $campus) }}" method="POST"
                                id="delete-campus-{{ $loop->iteration }}"
                                onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href="{{ route('stops.index', [$campus, $transport]) }}" class="btn btn-default btn-sm">
                                <i class="fa fa-bus"></i> ver paradas
                            </a>

                            {{-- <a href="{{ route('campuses.edit', $campus) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> editar
                            </a>

                            <button form="delete-campus-{{ $loop->iteration }}" type="submit"
                                class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> excluir
                            </button> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-info">
                            <i class="fa fa-info-circle"></i> Nenhuma rota cadastrada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
