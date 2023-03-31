@extends('layouts.app')

@section('page-header', $restaurant->name)

@section('page-content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('restaurants.show', $restaurant) }}" method="GET">
                <div class="form-group">
                    <label for="day">Selecione um dia da semana específico:</label>
                    <div class="input-group input-group col-lg-6 col-md-12 col-sm-6">
                        <input type="date" class="form-control" id="day" name="day" value="{{ request('day') }}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">filtrar</button>
                        </span>
                        <span class="input-group-append">
                            <a href="{{ Route('restaurants.show', $restaurant) }}" class="btn btn-outline-info">remover
                                filtro</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12 my-4">
            <h4>Cardápios disponíveis na semana</h4>
        </div>
        @foreach ($week as $day)
            <div class="col-lg-4">
                <div class="card ">
                    <div class="card-header">
                        <span class="card-title">
                            {{ $day['date']->format('d/m/Y') }}
                        </span>
                        <div class="card-tools">
                            @if ($day['hasMeals'])
                                <i class="fa fa-check text-success text-bold text-lg"></i>
                            @else
                                <i class="fa fa-times text-danger text-bold text-lg"></i>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('meals.index', $restaurant) }}" method="GET">
                            <input type="hidden" name="day" value="{{ $day['date'] }}">
                            @if ($day['hasMeals'])
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search mr-2"></i> Ver Refeições
                                </button>
                            @else
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-plus mr-2"></i> Adicionar Refeições
                                </button>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
