<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">

            <h3 class="text-lg font-semibold mb-4">Form Edit Produk</h3>

            <form action="{{ route('product-update', $product->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" name="product_name" value="{{ $product->product_name }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Unit</label>
                    <input type="text" name="unit" value="{{ $product->unit }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Type</label>
                    <input type="text" name="type" value="{{ $product->type }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Information</label>
                    <textarea name="information"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $product->information }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Qty</label>
                    <input type="number" name="qty" value="{{ $product->qty }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Producer</label>
                    <input type="text" name="producer" value="{{ $product->producer }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('product-index') }}" 
                       class="bg-gray-500 text-black px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                        Kembali
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-black px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
