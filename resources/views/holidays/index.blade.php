@extends('layouts.app')

@section('page-header', 'Estados')

@section('page-content')

    <a href="{{ route('states.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo estado
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Dia</th>
                    <th>Mês</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($holidays as $holiday)
                <tr class="text-sm">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-info">
                        <i class="fa fa-info-circle"></i> Nenhum feriado cadastrado
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
