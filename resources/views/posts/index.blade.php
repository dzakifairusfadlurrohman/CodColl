<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Post
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ Tambah Post</a>
        @endauth

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white p-4 rounded shadow">
            <table class="table table-bordered w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Judul</th>
                        <th class="border px-4 py-2">Slug</th>
                        <th class="border px-4 py-2">Dibuat</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">{{ $post->slug }}</td>
                        <td class="border px-4 py-2">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="border px-4 py-2">
                            @auth
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
