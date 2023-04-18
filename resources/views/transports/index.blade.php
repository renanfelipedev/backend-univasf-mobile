@extends('layouts.app')

@section('page-header')
    Rotas <small>{{ $campus->name }}</small>
@endsection

@section('page-content')
    <div class="mb-4">
        <a href="{{ route('transports.select-campus') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
        </a>
        <a href="{{ route('transports.create', $campus) }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nova rota
        </a>
    </div>

    <div class="card card-body table-responsive">
        <table class="table  table-hover table-sm">
            <thead>
                <tr>
                    <th>Rota</th>
                    <th>Descrição</th>
                    <th class="col-3">Itinerário</th>
                    <th class="col-3">Ações</th>
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

                            <a href="{{ route('transports.edit', [$campus, $transport]) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> editar
                            </a>


                            <button form="delete-campus-{{ $loop->iteration }}" type="submit"
                                class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> excluir
                            </button>
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
