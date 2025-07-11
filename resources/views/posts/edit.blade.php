<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-medium">Judul</label>
                <input type="text" name="title" class="form-input w-full rounded border px-3 py-2" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block font-medium">Konten</label>
                <textarea name="content" id="editor" rows="10" class="form-textarea w-full rounded border px-3 py-2" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Update
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
