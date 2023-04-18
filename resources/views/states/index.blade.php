@extends('layouts.app')

@section('page-header', 'Estados')

@section('page-content')

    <a href="{{ route('states.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo estado
    </a>

    <div class="card card-body table-responsive">
        <table class="table  table-hover table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($states as $state)
                    <tr class="text-sm">
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->uf }}</td>
                        <td>
                            <form action="{{ route('states.destroy', $state) }}" method="POST"
                                id="delete-state-{{ $loop->iteration }}"
                                onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href="{{ route('states.edit', $state) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> editar
                            </a>

                            <button form="delete-state-{{ $loop->iteration }}" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> excluir
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-info">
                            <i class="fa fa-info-circle"></i> Nenhum estado cadastrado
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
