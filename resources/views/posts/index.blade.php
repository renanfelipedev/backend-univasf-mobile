@extends('layouts.app')

@section('page-header', 'Notícias')

@section('page-content')

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Nova notícia
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Corpo</th>
                    <th>Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr class="text-sm">
                    <td>{{ str()->substr($post->title, 0, 60) }} ...</td>
                    <td>{{ str()->substr($post->body, 0, 100) }} ...</td>
                    <td>{{ $post->published_at }}</td>
                    <td>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" id="delete-post" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i> editar
                        </a>

                        <button form="delete-post" type="submit" class="btn btn-xs btn-danger">
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
