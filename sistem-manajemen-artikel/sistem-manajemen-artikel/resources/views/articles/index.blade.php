<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Artikel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('articles.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        + Tambah Artikel
                    </a>
                    <div class="mt-6">
                        @foreach ($articles as $article)
                            <div class="p-4 mb-4 border rounded-lg">
                                <h3 class="text-lg font-bold">{{ $article->title }}</h3>
                                <p class="text-sm text-gray-600">oleh: {{ $article->user->name }}</p>
                                <p class="mt-2">{{ Str::limit($article->content, 150) }}</p>

                                {{-- Tombol Hapus hanya muncul jika user diizinkan --}}
                                @can('delete', $article)
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block mt-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Anda yakin ingin menghapus artikel ini?')">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>