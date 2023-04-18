@extends('layouts.app')

@section('page-header', 'Comunicados')

@section('page-content')

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body">
                @php $route = isset($announcement) ? 'update' : 'store' @endphp
                <form action="{{ route("announcements.$route", $announcement ?? null) }}" method="POST">
                    @csrf

                    @isset($announcement)
                        @method('PUT')
                    @endisset

                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" @class(['form-control', 'is-invalid' => $errors->has('title')])
                            value="{{ old('title', $announcement->title ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="body">Corpo</label>
                        <textarea name="body" id="body" @class(['form-control', 'is-invalid' => $errors->has('body')]) cols="30" rows="5">{{ old('body', $announcement->body ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Imagem</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="url">Link externo</label>
                        <input type="text" name="url" id="url" @class(['form-control', 'is-invalid' => $errors->has('url')])
                            value="{{ old('url', $announcement->url ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <a href="{{ route('announcements.index') }}" class="btn btn-secondary"><i
                                class="fa fa-arrow-left"></i></a>
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
                                        id="delete-announcement-{{ $loop->iteration }}"
                                        onsubmit="return confirm('Deseja realmente excluir?');">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('announcements.edit', $announcement) }}"
                                        class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i> editar
                                    </a>

                                    <button form="delete-announcement-{{ $loop->iteration }}" type="submit"
                                        class="btn btn-xs btn-danger">
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
        </div>
    </div>

    {{-- <a href="{{ route('announcements.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo comunicado
    </a> --}}
@endsection
