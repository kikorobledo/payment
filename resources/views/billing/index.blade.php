<x-app-layout>

    <div class="pb-12">

        <div>

            <div class="w-full mx-auto px-5 py-10 text-gray-600 mb-10">

                <div class="text-center max-w-xl mx-auto">
                    <h1 class="text-5xl md:text-6xl font-bold mb-5">Pricing</h1>
                    <h3 class="text-xl font-medium mb-10">Lorem ipsum dolor sit amet consectetur adipisicing elit repellat dignissimos laboriosam odit accusamus porro</h3>
                </div>

                <div class="max-w-4xl mx-auto md:flex">

                    <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-6 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow">
                            <h2 class="text-center font-bold uppercase mb-4">MENSUAL</h2>
                            <h3 class="text-center font-bold text-4xl mb-5">$9.99/mo</h3>
                            <ul class="text-sm px-5 mb-8">
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Lorem ipsum</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Dolor sit amet</li>
                            </ul>
                        </div>

                        @livewire('subscriptions', ['price' => 'price_1Lxh5ZGzmjtLLmjQrten3enL', key('price_1Lxh5ZGzmjtLLmjQrten3enL')])

                    </div>

                    <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:-mx-3 md:mb-0 rounded-md shadow-lg shadow-gray-600 md:relative md:z-50 md:flex md:flex-col">
                        <div class="w-full flex-grow">
                            <h2 class="text-center font-bold uppercase mb-4">TRIMESTRAL</h2>
                            <h3 class="text-center font-bold text-4xl md:text-5xl mb-5">$19.99/mo</h3>
                            <ul class="text-sm px-5 mb-8">
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Lorem ipsum</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Dolor sit amet</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Consectetur</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Adipisicing</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Elit repellat</li>
                            </ul>
                        </div>

                        @livewire('subscriptions', ['price' => 'price_1Lxh5ZGzmjtLLmjQ9lCR6Rnt', key('price_1Lxh5ZGzmjtLLmjQ9lCR6Rnt')])

                    </div>

                    <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-6 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow">
                            <h2 class="text-center font-bold uppercase mb-4">ANUAL</h2>
                            <h3 class="text-center font-bold text-4xl mb-5">$89.99/mo</h3>
                            <ul class="text-sm px-5 mb-8">
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Lorem ipsum</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Dolor sit amet</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Consectetur</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Adipisicing</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Much more...</li>
                            </ul>
                        </div>

                        @livewire('subscriptions', ['price' => 'price_1Lxh5ZGzmjtLLmjQwYwIDl2A', key('price_1Lxh5ZGzmjtLLmjQwYwIDl2A')])

                    </div>

                </div>

            </div>

        </div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @livewire('payment-method-create')


            <div class="mt-8">

                @livewire('payment-method-list')

            </div>

            <div class="mt-8">

                @livewire('invoice')

            </div>

        </div>

    </div>

</x-app-layout>
