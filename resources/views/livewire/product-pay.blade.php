<div>

    <div class="card relative">

        <div wire:loading.flex class="absolute h-full w-full justify-center items-center bg-gray-200 bg-opacity-25 z-30">

            <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

        </div>

        <div class="card-body">

            <div class="flex justify-between items-center mb-4">

                <h1 class="text-lg font-bold text-gray-500">Método de pago</h1>

                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8" alt="Logo">

            </div>

            <form id="card-form">

                <div class="form-group">

                    <label class="form-label">Nombre de la tarjeta</label>

                    <input class="form-control" type="text" id="card-holder-name" placeholder="Ingrese el nombre del titular de la tarjeta" required>

                </div>

                <div class="form-group">

                    <label for="" class="form-label">Número de tarjeta</label>

                    <div class="form-control" id="card-element"></div>

                    <span id="card-error" class="invalid-feedback"></span>

                </div>

                <button class="btn btn-primary" id="card-button">Process Payment</button>

            </form>

        </div>

    </div>

    @push('js')

        <script>

            document.addEventListener('livewire:load', function(){

                stripe();

                Livewire.on('resetStripe', function(){

                    document.getElementById('card-form').reset();

                    stripe();

                    alert('Compra exitosa');

                });

                Livewire.on('errorPayment', function(){

                    document.getElementById('card-form').reset();

                    stripe();

                    alert('Compra fallida');

                });

            });

            function stripe(){

                const stripe = Stripe("{{ env('STRIPE_KEY') }}");

                const elements = stripe.elements();

                const cardElement = elements.create('card');

                cardElement.mount('#card-element');

                //Método de pago

                const cardHolderName = document.getElementById('card-holder-name');

                const cardButton = document.getElementById('card-button');

                const cardForm = document.getElementById('card-form');

                cardForm.addEventListener('submit', async (e) => {

                    e.preventDefault();

                    const { paymentMethod, error} = await stripe.createPaymentMethod(
                        'card', cardElement, {
                            billing_details : { name: cardHolderName.value }
                        }
                    );

                    if(error){

                        document.getElementById('card-error').textContent = error.message;

                    }else{

                        Livewire.emit('paymentMethodCreate', paymentMethod.id);
                    }

                })

            }

        </script>

    @endpush

</div>
