@props(
    [
        'name',
        'price'
    ]
)


@if(auth()->user()->hasDefaultPaymentMethod())

    @if(auth()->user()->subscribed($name))

        @if (auth()->user()->subscribedToPrice($price, $name))

            @if( auth()->user()->subscription($name)->onGracePeriod() )

                <button
                    wire:loading.remove
                    wire.target="resumingSubscription('{{ $name }}')"
                    wire:click="resumingSubscription('{{ $name }}')"
                    class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">
                    Reanudar Plan
                </button>

                <button
                    wire:loading.flex
                    wire.target="resumingSubscription('{{ $name }}')"
                    class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

                    <div wire:loading.flex wire:target="resumingSubscription('{{ $name }}')" class="h-6 w-6 justify-center items-center mr-4">

                        <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                    </div>

                    Reanudar Plan

                </button>



            @else

                <button
                    wire:loading.remove
                    wire.target="cancellingSubscription('{{ $name }}')"
                    wire:click="cancellingSubscription('{{ $name }}')"
                    class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">
                    Cancelar
                </button>

                <button
                    wire:loading.flex
                    wire.target="cancellingSubscription('{{ $name }}')"
                    class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

                    <div wire:loading.flex wire:target="cancellingSubscription('{{ $name }}')" class="h-6 w-6 justify-center items-center mr-4">

                        <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                    </div>

                    Cancelar

                </button>

            @endif

        @else

            <button
                wire:loading.remove
                wire.target="changingPlans('{{ $name }}', '{{ $price }}')"
                wire:click="changingPlans('{{ $name }}', '{{ $price }}')"
                class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">
                Cambiar de plan
            </button>

            <button
                wire:loading.flex
                wire.target="changingPlans('{{ $name }}', '{{ $price }}')"
                class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

                <div wire:loading.flex wire:target="changingPlans('{{ $name }}', '{{ $price }}')" class="h-6 w-6 justify-center items-center mr-4">

                    <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                </div>

                Cambiar de plan

            </button>

        @endif


    @else

        <button
            wire:loading.remove
            wire.target="newSubscription('{{ $name }}', '{{ $price }}')"
            wire:click="newSubscription('{{ $name }}', '{{ $price }}')"
            class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">
            Suscribirse
        </button>

        <button
            wire:loading.flex
            wire.target="newSubscription('{{ $name }}', '{{ $price }}')"
            wire:click="newSubscription('{{ $name }}', '{{ $price }}')"
            class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

            <div wire:loading.flex wire:target="newSubscription('{{ $name }}', '{{ $price }}')" class="h-6 w-6 justify-center items-center mr-4">

                <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

            </div>

            Suscribirse

        </button>

    @endif

@else

    <button
        class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">
        Agregar Método de pago
    </button>

@endif

