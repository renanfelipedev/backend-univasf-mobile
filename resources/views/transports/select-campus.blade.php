@extends('layouts.app')

@section('page-header')
    Adicionar rota
@endsection

@section('page-content')
    <div class="card card-body table-responsive">
        <table class="table  table-hover table-sm">
            <thead>
                <tr>
                    <th>Campus</th>
                    <th class="col-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campuses as $campus)
                    <tr>
                        <td>{{ $campus->name }}</td>
                        <td>
                            <a href="{{ route('transports.index', $campus) }}" class="btn btn-sm btn-default">
                                <i class="fa fa-bus"></i> ver rotas
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
