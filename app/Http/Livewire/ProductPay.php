<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class ProductPay extends Component
{

    protected $listeners = ['paymentMethodCreate'];

    public $product;

    public function paymentMethodCreate($paymentMethod){

        try {

            auth()->user()->charge($this->product->price * 100, $paymentMethod);

            $this->emit('resetStripe');

        } catch (Exception $e) {

            $this->emit('errorPayment');
        }

    }

    public function render()
    {
        return view('livewire.product-pay');
    }
}
