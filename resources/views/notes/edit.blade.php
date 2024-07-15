<x-layout>
    <x-slot:title>Editar Nota</x-slot>
    

    <div class="cards">
        <div class="card card-center">
            <div class="card-body">
                <h1>Editar nota</h1>
                @if($errors->any())
                    <div class="errors">
                        <p>El formulario contiene errores, favor de corregir.</p>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('notes.update', ['id' => $note->id]) }}" method="POST" >
                    @csrf
                    @method('PUT')


                    <label for="title" class="field-label">@lang('validation.attributes.title'): </label>
                    <input type="text" value="{{ old('title', $note->title) }}" name="title" id="title" class="field-input @error('title') field-error @enderror" />
                    @error('title')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    
                    <label for="content" class="field-label">Contenido:</label>
                    <textarea name="content" id="content" rows="10" class="field-textarea @error('content') field-error @enderror ">
                        {{ old('content', $note->content) }}
                    </textarea>
                    @error('content')
                        <p class="error-message">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-primary">Actualizar la nota</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
