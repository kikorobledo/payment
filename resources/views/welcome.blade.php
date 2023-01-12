<x-app-layout>

    <div class="container py-10">

        <div class="grid grid-cols-3 gap-6">

            @foreach ($products as $product)

                <div class="card">

                    <div class="px-4 py-2 bg-gray-900 flex justify-between items-center">

                        <p class="text-gray-200 font-bold text-xl">${{ $product->price }}</p>

                        <a href="{{ route('products.pay', $product) }}" class="btn btn-secondary">Comprar</a>

                    </div>

                    <img class="h-56 w-full object-cover" src="{{ $product->image }}" alt="Image">

                    <div class="card-body">

                        <h1 class="text-gray-900 font-bold text-xl uppercase">{{ $product->title }}</h1>

                        <p class="text-gray-600 text-sm mt-3">{{ Str::limit($product->description, 150) }}</p>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="mt-2">

            {{ $products->links() }}

        </div>

    </div>

</x-app-layout>
