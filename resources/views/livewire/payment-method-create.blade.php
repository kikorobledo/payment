<div>

    <article class="card relative">

        <div wire:loading.flex class="absolute h-full w-full justify-center items-center bg-gray-200 bg-opacity-25 z-30">

            <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

        </div>

        <form action="" id="card-form">

            <div class="card-body ">

                <h1 class="text-gray-700 text-lg font-bold mb-4">Agregar metodo de pago</h1>

                <div class="flex flex-col md:flex-row">

                    <p class="text-gray-700 mb-2">Información de tarjeta</p>

                    <div class="flex-1 md:ml-6">

                        <div class="form-group">

                            <input type="text" id="card-holder-name" class="form-control" placeholder="Nombre del titular de la tarjeta" required>

                        </div>

                        <div class="form-group">

                            <div id="card-element" class="form-control"></div>

                            <span id="card-errors" class="invalid-feedback"></span>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer bg-gray-50 flex justify-end">

                <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">

                    Update Payment Method

                </button>

            </div>

        </form>

    </article>

    @push('js')

        <script>

            document.addEventListener('livewire:load', function(){

                stripe();

            });

            Livewire.on('resetStripe', function(){

                document.getElementById('card-form').reset();

                stripe();

            });

            function stripe(){

                const stripe = Stripe("{{ env('STRIPE_KEY') }}");

                const elements = stripe.elements();
                const cardElement = elements.create('card');

                cardElement.mount('#card-element');

                /* Generar Token */

                const cardHolderName = document.getElementById('card-holder-name');
                const cardButton = document.getElementById('card-button');
                const cardForm = document.getElementById('card-form');
                const clientSecret = cardButton.dataset.secret;

                cardForm.addEventListener('submit', async (e) => {

                    e.preventDefault();

                    const { setupIntent, error } = await stripe.confirmCardSetup(
                        clientSecret, {
                            payment_method: {
                                card: cardElement,
                                billing_details: { name: cardHolderName.value }
                            }
                        }
                    );

                    if (error) {
                        document.getElementById('card-errors').textContent = error.message;
                    } else {
                        Livewire.emit('paymentMethodCreate', setupIntent.payment_method);
                    }
                });

            }

        </script>

    @endpush

</div>

