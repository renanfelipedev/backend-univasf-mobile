@extends('layouts.app')

@section('page-header', 'Comunicados')

@section('page-content')

    <a href="{{ route('announcements.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo comunicado
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Corpo</th>
                    <th>Data de publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                    <tr class="text-sm">
                        <td>{{ $announcement->title }}</td>
                        <td>{{ $announcement->body }}</td>
                        <td>{{ $announcement->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('announcements.destroy', $announcement) }}" method="POST"
                                id="delete-announcement" onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> editar
                            </a>

                            <button form="delete-announcement" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> excluir
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-info">
                            <i class="fa fa-info-circle"></i> Nenhum comunicado cadastrado
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
