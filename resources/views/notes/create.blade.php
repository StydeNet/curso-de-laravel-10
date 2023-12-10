<x-layout>
        <x-slot:title>Nueva nota</x-slot:title>

        <main class="content">
            <div class="cards">
                <div class="card card-center">
                    <div class="card-body">
                        <h1>Nueva nota</h1>

                        <form action="{{ route('notes.store') }}" method="POST">
                            @csrf

                            <label for="title" class="field-label">Título: </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="field-input @error('title') field-error @enderror">
                            @error('title')
                                <p class="error-message">{{ $message }}</p>
                            @enderror

                            <label for="content" class="field-label">Contenido:</label>
                            <textarea name="content" id="content" rows="10" class="field-textarea @error('content') field-error @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="error-message">{{ $message }}</p>
                            @enderror

                            <button type="submit" class="btn btn-primary">Crear nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
</x-layout>
