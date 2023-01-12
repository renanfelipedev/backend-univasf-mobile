@extends('layouts.app')

@section('page-header', 'Campi')

@section('page-content')

    <a href="{{ route('campuses.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo campus
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($campuses as $campus)
                <tr class="text-sm">
                    <td>{{ $campus->name }}</td>
                    <td>{{ $campus->address }}</td>
                    <td>{{ $campus->cnpj }}</td>
                    <td>
                        <form action="{{ route('campuses.destroy', $campus) }}" method="POST" id="delete-campus-{{ $loop->iteration }}" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a href="{{ route('campuses.edit', $campus) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i> editar
                        </a>

                        <button form="delete-campus-{{ $loop->iteration }}" type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> excluir
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-info">
                        <i class="fa fa-info-circle"></i> Nenhuma notícia cadastrada
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
