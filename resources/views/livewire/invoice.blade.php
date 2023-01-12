<div>


    <div class="card relative">

        <div wire:loading.flex class="absolute h-full w-full justify-center items-center bg-gray-200 bg-opacity-25 z-30">

            <img src="{{ asset('storage/img/spinner.svg')}}" alt="Spinner">

        </div>

        <div class="card-body">

            <table class="w-full">

                <thead>

                    <tr class="text-left">
                        <th class="w-1/2 px-4 py-2">Fecha</th>
                        <th class="w-1/4 px-4 py-2">Dolares</th>
                        <th class="w-1/4 px-4 py-2"></th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse ($invoices as $invoice)

                        <tr>
                            <td class="px-4 py-3">{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td class="px-4 py-3">{{ $invoice->total() }}</td>
                            <td class="px-4 py-3 text-right"><a class="btn btn-primary" href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="px-4 py-3 text-gray-700 text-sm">Usted no tiene facturas registradas.</td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
