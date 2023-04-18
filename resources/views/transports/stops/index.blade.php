@extends('layouts.app')

@section('page-header')
    Rota:
    <small>{{ $transport->title }} ({{ $transport->busname }})</small>
    <div class="text-sm">
        <strong>Origem:</strong> {{ $transport->origin }}
        <br>
        <strong>Destino:</strong> {{ $transport->destination }}
    </div>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body">
                <form action="{{ route('stops.store', [$campus, $transport]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title">Nome Parada</label>
                        <input type="title" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="time">Hora</label>
                        <input type="time" name="time" id="time" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <a href="{{ route('transports.index', $campus) }}" class="btn btn-default">Voltar</a>
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-body table-responsive">
                <table class="table  table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Parada</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transport->stops as $stop)
                            <tr class="text-sm">
                                <td>{{ $stop->time }}</td>
                                <td>{{ $stop->title }}</td>
                                <td>
                                    <form action="{{ route('stops.destroy', [$campus, $transport, $stop]) }}" method="POST"
                                        id="delete-{{ $loop->iteration }}"
                                        onsubmit="return confirm('Deseja realmente excluir?');">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('stops.edit', [$campus, $transport, $stop]) }}"
                                        class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i> editar
                                    </a>

                                    <button form="delete-{{ $loop->iteration }}" type="submit"
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
        </div>
    </div>
@endsection
