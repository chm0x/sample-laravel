@extends('layouts.app')
<!-- OLD: -->
<!-- @@include('layouts.header') -->

<!-- Es casi lo mismo -->
<!-- @@section('title') Mis Notas @@endsection -->
 @section('title', 'Mis Notas')


@section('content')
    <div class="cards">
        <!-- PHP PURO -->
        <!-- foreach($notes as $note): -->

        <!-- Con LARAVEL -->
        @forelse($notes as $note)
            <div class="card card-small">
                <div class="card-body">
                    <h4>{{ $note }}</h4>
                    <!-- Eso es para PHP puro y seguridad -->
                    <!-- <h4><?php // htmlentities($note) ?> </h4> -->

                    {{ rand(1,1000) }}


                    <p>
                        {{ $note }}
                    </p>
                </div>

                <footer class="card-footer">
                    <a class="action-link action-edit">
                        <i class="icon icon-pen"></i>
                    </a>
                    <a class="action-link action-delete">
                        <i class="icon icon-trash"></i>
                    </a>
                </footer>
            </div>
        @empty
            <p>Ya no hay notas!</p>
        @endforelse

        <div class="card">
            
            <p>Ignorar las variables: @{{ variable_ignorada }}</p>

            <p>Porque las directivas del Blade Laravel comienza con Arroba "@"</p>
            <p>Por ejemplo: @@foreach</p>

            <p>El doble arroba (@@) es especial, es como una especie del comentario.</p>

            @verbatim
                <p>El verbatim es como el doble arroba pero mejorado</p>
                <code>@foreach; @if; {{ mi_variable }}</code>
            @endverbatim
            
        </div>
    </div>    
@endsection
<!-- @@include('layouts.footer') -->