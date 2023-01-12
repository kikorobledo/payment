<x-app-layout>


    <div class="container py-12 grid grid-cols-12 gap-6">

        <div class="col-span-7">

            <article class="card">

                <div class="card-body">

                    <div class="flex">

                        <img src="{{ $product->image }}" class="w-28 h-28 object-cover" alt="Image">

                        <div class="ml-4 flex justify-between flex-1 items-center self-start">

                            <h1 class="font-bold text-lg uppercase  text-gray-500">{{ $product->title }}</h1>

                            <p class="font-bold text-gray-500">{{ $product->price }} USD</p>

                        </div>

                    </div>

                    <hr class="my-4">

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit ullam quam vero iure libero voluptatum velit rem consectetur, perspiciatis voluptatibus aliquam iste nesciunt eius laboriosam! Eos fugiat ullam perferendis ipsum. <a href="#" class="font-bold text-blue-500">Terminos y condicciones</a> </p>

                </div>

            </article>

        </div>

        <div class="col-span-5">

            @livewire('product-pay', ['product' => $product])

        </div>

    </div>

</x-app-layout>
