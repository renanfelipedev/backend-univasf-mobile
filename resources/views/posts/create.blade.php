@extends('layouts.app')

@section('page-header', 'Nova Notícia')

@section('page-content')
    <div class="card card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" @class(['form-control', 'is-invalid' => $errors->has('title')]) value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="body">Corpo</label>
                <textarea name="body" id="body" @class(['form-control', 'is-invalid' => $errors->has('body')]) cols="30" rows="5">{{ old('body') }}</textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Data de publicação</label>
                <input type="date" name="published_at" id="published_at" @class(['form-control', 'is-invalid' => $errors->has('published_at')])
                    value="{{ old('published_at', now()->format('Y-m-d')) }}">
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="image_url">Url da Imagem</label>
                    <input type="text" name="image_url" id="image_url" @class(['form-control', 'is-invalid' => $errors->has('image_url')])
                        value="{{ old('image_url') }}" placeholder="http://">
                </div>

                <div class="form-group col-lg-6">
                    <label for="image_file">Arquivo de imagem</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image_file" name="image_file">
                        <label class="custom-file-label" for="image_file">Escolha o arquivo</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="slug">Link externo</label>
                <input type="text" name="slug" id="slug" @class(['form-control', 'is-invalid' => $errors->has('slug')])
                    value="{{ old('slug') }}">
            </div>

            <div class="form-group">
                <label for=""></label>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
