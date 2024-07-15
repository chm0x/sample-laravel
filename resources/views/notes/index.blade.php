<x-layout>
    <x-slot name="title">Listado de Notas</x-slot>
    <div class="cards">
        <!-- PHP PURO -->
        <!-- foreach($notes as $note): -->

        <!-- Con LARAVEL -->
        @forelse($notes as $note)
        <div class="card card-small">
            <div class="card-body">
                <h4>{{ $note->title }}</h4>
                <!-- Eso es para PHP puro y seguridad -->
                <!-- <h4><?php // htmlentities($note) 
                            ?> </h4> -->

                {{ rand(1,1000) }}
                <p>
                    {{ $note->content }}
                </p>
                <form method="POST" action="{{ route('notes.destroy', ['id'=>$note->id]) }}">
                    @csrf
                    @method('DELETE')

                    <!-- <input type="hidden" name="_method" value="DELETE" /> -->
                    <button>
                        Eliminar
                    </button>
                </form>
            </div>

            <footer class="card-footer">
                <a href="{{ $note->editUrl() }}" class="action-link action-edit">

                    <!-- NO LO BORRES EL DE ABAJO -->
                    <!-- <a href="{{ route('notes.edit', ['id' => $note->id ]) }}" class="action-link action-edit"> -->
                    <i class="icon icon-pen"></i>
                </a>

                <a class="action-link action-delete" data-js-delete-note="{{ $note->id }}">
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

    <x-slot:javascript>
        <script>
            let deleteUrlPlaceholder = "{{ route('notes.destroy', ':id') }}";
            let csrfToken = '{{ csrf_token() }}';

            document.querySelectorAll('a[data-js-delete-note]').forEach(function(link) {
                link.addEventListener('click', function(event) {

                    deleteNote(event.target.closest('a'));





                })
            }); // End Event Listener

            function deleteNote(deleteNoteLink) {
                let noteCard = deleteNoteLink.closest('.card');

                let noteId = deleteNoteLink.dataset.jsDeleteNote;

                let deleteNoteUrl = deleteUrlPlaceholder.replace(':id', noteId);

                noteCard.style.display = 'none';

                fetch(deleteNoteUrl, {
                    method: 'DELETE',
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest",

                    },
                    body: JSON.stringify({
                        _token: csrfToken
                    })
                }).then(function(response) {
                    if (response.status !== 204) {
                        restoreNote(noteCard)
                        return;
                    }

                    noteCard.remove();

                }).catch(function(response) {
                    restoreNote(noteCard)
                });

            }

            function restoreNote(noteCard) {
                alert('Ocurrio un error eliminando la nota');
                noteCard.style.display = 'flex';
            }
        </script>
    </x-slot:javascript>
</x-layout>