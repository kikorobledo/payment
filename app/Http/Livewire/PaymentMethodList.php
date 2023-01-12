<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethodList extends Component
{

    protected $listeners = ['render'];

    public function deletePaymentMethod($paymentMethodId){

        $paymentMethod = auth()->user()->findPaymentMethod($paymentMethodId);

        $paymentMethod->delete();

    }

    public function defaultPaymentMethod($paymentMethodId){

        auth()->user()->updateDefaultPaymentMethod($paymentMethodId);

    }

    public function render()
    {

        $paymentMethods = auth()->user()->paymentMethods();

        return view('livewire.payment-method-list', compact('paymentMethods'));
    }
}
