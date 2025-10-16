<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between mb-4 items-center">
                <h2 class="text-lg font-semibold">Data Produk</h2>
                <a href="{{ route('product-create') }}" 
                   class="bg-blue-600 text-black px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Tambah Produk
                </a>
            </div>

            <table class="table-auto w-full border-collapse border border-gray-300 text-sm">
                <thead class="bg-gray-100">
                    <tr class="text-gray-700">
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama Produk</th>
                        <th class="border p-2">Unit</th>
                        <th class="border p-2">Type</th>
                        <th class="border p-2">Qty</th>
                        <th class="border p-2">Producer</th>
                        <th class="border p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $index + 1 }}</td>
                            <td class="border p-2">{{ $product->product_name }}</td>
                            <td class="border p-2">{{ $product->unit }}</td>
                            <td class="border p-2">{{ $product->type }}</td>
                            <td class="border p-2">{{ $product->qty }}</td>
                            <td class="border p-2">{{ $product->producer }}</td>
                            <td class="border p-2 flex justify-center space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('product-edit', $product->id) }}" 
                                   class="bg-yellow-500 border border-yellow-600 text-black px-3 py-1 rounded-md text-xs font-semibold hover:bg-yellow-600 transition-colors">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('product-destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-700 border border-red-800 text-black px-3 py-1 rounded-md text-xs font-semibold hover:bg-red-800 transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
