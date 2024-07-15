<x-layout>
    <x-slot:title>Crear Nota</x-slot>
    <!-- <x-slot name="title">Crear Nota</x-slot> -->
    <div class="cards">
        <div class="card card-center">
            <div class="card-body">
                <h1>Nueva nota</h1>
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
                <form action="{{ route('notes.store') }}" method="POST" >
                    @csrf
                    <label for="title" class="field-label">@lang('validation.attributes.title'): </label>
                    <input type="text" value="{{ old('title') }}" name="title" id="title" class="field-input @error('title') field-error @enderror" />
                    @error('title')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    
                    <label for="content" class="field-label">Contenido:</label>
                    <textarea name="content" id="content" rows="10" class="field-textarea @error('content') field-error @enderror ">
                        {{ old('content') }}
                    </textarea>
                    @error('content')
                        <p class="error-message">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-primary">Crear nota</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
