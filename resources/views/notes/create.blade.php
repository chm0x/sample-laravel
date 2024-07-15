<x-layout>
    <x-slot:title>Crear Nota</x-slot>
    <!-- <x-slot name="title">Crear Nota</x-slot> -->
    <div class="cards">
        <div class="card card-center">
            <div class="card-body">
                <h1>Nueva nota</h1>

                <form action="{{ route('notes.store') }}" method="POST" >
                    @csrf
                    <label for="title" class="field-label">Título: </label>
                    <input type="text" name="title" id="title" class="field-input">

                    <label for="content" class="field-label">Contenido:</label>
                    <textarea name="content" id="content" rows="10" class="field-textarea"></textarea>

                    <button type="submit" class="btn btn-primary">Crear nota</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
