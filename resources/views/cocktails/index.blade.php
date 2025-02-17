@extends('layouts.app')
@section('title', '🍹 Lista de cocteles' )
@section('content')

    <h2 class="text-center">🍹 Lista de Cócteles</h2>
    
    <!-- Botón para ir a la lista de cócteles guardados -->
    <div class="text-center mb-4">
        <a href="{{ url('/saved') }}" class="btn btn-secondary">Ver Cócteles Guardados</a>
    </div>

    <!-- Alerta de éxito con SweetAlert2 -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <div class="row">
        @foreach($cocktails as $cocktail)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top" alt="{{ $cocktail['strDrink'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                    <form method="POST" action="{{ url('/save') }}">
                        @csrf
                        <input type="hidden" name="name" value="{{ $cocktail['strDrink'] }}">
                        <input type="hidden" name="image" value="{{ $cocktail['strDrinkThumb'] }}">
                        <button type="submit" class="btn btn-primary">Guardar Cóctel</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

