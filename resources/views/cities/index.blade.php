@extends('layouts.app')

@section('page-header', 'Cidades')

@section('page-content')

    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Nova cidade
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cities as $city)
                <tr class="text-sm">
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->state->uf }}</td>
                    <td>
                        <form action="{{ route('cities.destroy', $city) }}" method="POST" id="delete-city-{{ $loop->iteration }}" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a href="{{ route('cities.edit', $city) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i> editar
                        </a>

                        <button form="delete-city-{{ $loop->iteration }}" type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> excluir
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-info">
                        <i class="fa fa-info-circle"></i> Nenhuma cidade cadastrada
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
