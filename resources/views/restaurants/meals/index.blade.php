@extends('layouts.app')

@section('page-header')
    <h4>Cardápio do dia <span class="text-primary text-bold">{{ $day->format('d/m/Y') }}</span> do {{ $restaurant->name }}
    </h4>
@endsection

@section('page-content')
    <a href="{{ route('restaurants.show', [$restaurant, 'day' => request('day')]) }}" class="btn btn-secondary mb-4">
        <i class="fa fa-arrow-left"></i>
    </a>

    <div class="row">
        <div class="col-xl-4 col-lg-4">
            @include('restaurants.meals.partials.breakfast')
        </div>

        <div class="col-xl-4 col-lg-4">
            @include('restaurants.meals.partials.launch')
        </div>

        <div class="col-xl-4 col-lg-4">
            @include('restaurants.meals.partials.dinner')
        </div>


    </div>
@endsection
