<div class="">

    <section class="card relative">

        <div wire:loading.flex class="absolute h-full w-full justify-center items-center bg-gray-200 bg-opacity-25 z-30">

            <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

        </div>

        <div class="px-6 py-4 bg-gray-50">

            <h1 class="text-gray-700 text-lg font-bold">Métodos de pago agregados</h1>

        </div>

        <div class="card-body divide-y divide-gray-200">

            @forelse ($paymentMethods as $paymentMethod)

                <article class="text-sm text-gray-700 py-2 flex justify-between items-center">

                    <div>

                        <h1 class="">

                            <span class="font-bold">{{ $paymentMethod->billing_details->name }}</span> xxxx- {{ $paymentMethod->card->last4 }}

                            @if($paymentMethod->id == auth()->user()->defaultPaymentMethod()->id)

                                (default)

                            @endif

                        </h1>

                        <p>Expira: {{ $paymentMethod->card->exp_month }}/{{ $paymentMethod->card->exp_year }}</p>

                    </div>

                    <div class="grid grid-cols-2 border border-gray-200 rounded text-gray-500 divide-y divide-gray-200">

                        @unless ($paymentMethod->id == auth()->user()->defaultPaymentMethod()->id)

                            <i class="fas fa-star hover:text-gray-300 cursor-pointer p-3" wire:click="defaultPaymentMethod('{{ $paymentMethod->id }}')"></i>

                            <i class="fas fa-trash hover:text-gray-300 cursor-pointer p-3" wire:click="deletePaymentMethod('{{ $paymentMethod->id }}')"></i>

                        @endunless

                    </div>

                </article>

            @empty

                <article class="p-2">

                    <h1 class="text-sm text-gray-700">No cuenta con ningún método de pago</h1>

                </article>

            @endforelse

        </div>

    </section>

</div>
