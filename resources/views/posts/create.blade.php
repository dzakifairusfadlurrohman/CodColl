<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Post
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium">Judul</label>
                <input type="text" name="title" class="form-input w-full rounded border px-3 py-2" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block font-medium">Konten</label>
                <textarea name="content" id="editor" rows="10" class="form-textarea w-full rounded border px-3 py-2" required>{{ old('content') }}</textarea>
            </div>

            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
        </form>
    </div>

    @push('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    @endpush
</x-app-layout>
