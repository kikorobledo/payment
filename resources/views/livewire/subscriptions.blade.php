<div class="w-full">

    @if(auth()->user()->hasDefaultPaymentMethod())

        @if(auth()->user()->subscribed($name))

            @if (auth()->user()->subscribedToPrice($price, $name))

                @if( auth()->user()->subscription($name)->onGracePeriod() )

                    <div>

                        <button
                            wire:loading.attr='disabled'
                            wire.target="resumingSubscription"
                            wire:click="resumingSubscription"
                            class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

                            <div wire:loading.flex wire:target="resumingSubscription" class="h-6 w-6 justify-center items-center mr-4">

                                <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                            </div>

                            Reanudar Plan

                        </button>

                    </div>

                @else

                    <article>

                        <button
                            wire:loading.attr='disabled'
                            wire.target="cancellingSubscription"
                            wire:click="cancellingSubscription"
                            class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

                            <div wire:loading.flex wire:target="cancellingSubscription" class="h-6 w-6 justify-center items-center mr-4">

                                <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                            </div>

                            Cancelar
                        </button>

                    </article>

                @endif

            @else

                <button
                wire:loading.attr='disabled'
                    wire.target="changingPlans"
                    wire:click="changingPlans"
                    class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">

                    <div wire:loading.flex wire:target="changingPlans" class="h-6 w-6 justify-center items-center mr-4">

                        <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                    </div>

                    Cambiar de plan
                </button>

            @endif

        @else

            <input type="text" class="mb-2 form-control" placeholder="Ingrese un cupon..." wire:model.lazy="cupon">

            <a
                wire:loading.attr='disabled'
                wire.target="newSubscription"
                wire:click="newSubscription"
                class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center cursor-pointer">

                <div wire:loading.flex wire:target="newSubscription" class="h-6 w-6 justify-center items-center mr-4">

                    <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

                </div>

                Suscribirse
            </a>

        @endif

    @else

        <button
            class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex justify-center items-center">
            Agregar Método de pago
        </button>

    @endif


</div>
