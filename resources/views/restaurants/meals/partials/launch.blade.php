<div class="card card-maroon">
    <h5 class="card-header">Almoço</h5>

    <div class="card-body">

        <form action="{{ route('meals.store', $restaurant) }}" id="form-almoco" method="POST">
            @csrf
            <div class="form-group">
                <label for="food">Adicionar alimento</label>
                <input type="text" name="food" id="food" class="form-control"
                    @if (session('meal') === 'almoco') autofocus @endif>
                <input type="hidden" name="meal" value="almoco">
                <input type="hidden" name="day" value="{{ request('day') }}">
            </div>

            <div class="form-group">
                <label for=""></label>
                <button type="submit" form="form-almoco" class="btn btn-default">Salvar</button>
            </div>
        </form>
    </div>
</div>

<div class="card card-body">
    @if ($almocos)
        @forelse ($almocos->foods as $food)
            <span>
                <i class="fa fa-utensils text-muted mr-2"></i>
                {{ $food->name }}


                <button tabindex="-1" class="btn btn-link" type="submit" form="delete-food-{{ $food->id }}">
                    <i class="fa fa-times"></i>
                </button>
                <form method="POST" action="{{ route('foods.destroy', $food->id) }}"
                    id="delete-food-{{ $food->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </span>
        @empty
            <span>Nenhum almoço cadastrado!</span>
        @endforelse
    @else
        <span>Nenhum almoço cadastrado!</span>
    @endif
</div>
