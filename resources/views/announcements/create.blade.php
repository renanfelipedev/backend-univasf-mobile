@extends('layouts.app')

@section('page-header')
    @isset($announcement)
        Editar
    @else
        Novo
    @endisset
    comunicado
@endsection

@section('page-content')
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
                <a href="{{ route('announcements.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
