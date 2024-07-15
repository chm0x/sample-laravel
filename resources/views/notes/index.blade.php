<x-layout>
    <x-slot name="title">Listado de Notas</x-slot>
    <div class="cards">
        <!-- PHP PURO -->
        <!-- foreach($notes as $note): -->

        <!-- Con LARAVEL -->
        @forelse($notes as $note)

        <x-note-card :note="$note" />

        
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

   
</x-layout>