@extends('layouts.app')

@section('page-header', 'Notícias')

@section('page-content')

    <a href="{{ route('restaurants.create') }}" class="btn btn-primary mb-4">
        <i class="fa fa-plus"></i> Novo Restaurante Universitário
    </a>

    <div class="card card-body table-responsive">
        <table class="table table-borderless table-hover table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Café</th>
                    <th>Almoço</th>
                    <th>Janta</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($restaurants as $restaurant)
                    <tr class="text-sm">
                        <td>{{ $restaurant->name }}</td>
                        <td>
                            @if ($restaurant->coffe_start_at && $restaurant->coffe_end_at)
                                Horário
                                <br>
                                <span class="badge bg-success">{{ $restaurant->coffe_start_at }}</span>
                                <br>
                                <span class="badge bg-danger">{{ $restaurant->coffe_end_at }}</span>
                            @endif
                        </td>

                        <td>
                            @if ($restaurant->lunch_start_at && $restaurant->lunch_end_at)
                                Horário
                                <br>
                                <span class="badge bg-success">{{ $restaurant->lunch_start_at }}</span>
                                <br>
                                <span class="badge bg-danger">{{ $restaurant->lunch_end_at }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($restaurant->dinner_start_at && $restaurant->dinner_end_at)
                                Horário
                                <br>
                                <span class="badge bg-success">{{ $restaurant->dinner_start_at }}</span>
                                <br>
                                <span class="badge bg-danger">{{ $restaurant->dinner_end_at }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST" id="delete"
                                onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href="{{ route('restaurants.edit', $restaurant) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> editar
                            </a>

                            <button form="delete" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> excluir
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-info">
                            <i class="fa fa-info-circle"></i> Nenhuma restaurante cadastrado
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
