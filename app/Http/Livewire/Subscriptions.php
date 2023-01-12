<?php

namespace App\Http\Livewire;

use Laravel\Cashier\Exceptions\IncompletePayment;
use Livewire\Component;

class Subscriptions extends Component
{

    public $price;
    public $name = "Curso Pasarela De Pagos";
    public $cupon;

    protected $listeners = ['render'];

    public function newSubscription(){

        try {

            if($this->cupon){

                auth()->user()->newSubscription($this->name, $this->price)->withCoupon($this->cupon)->create();

                $this->emitTo('invoice', 'render');

                $this->emitTo('subscriptions', 'render');


            }else{

                auth()->user()->newSubscription($this->name, $this->price)->create();

                $this->emitTo('invoice', 'render');

                $this->emitTo('subscriptions', 'render');

            }

        } catch (IncompletePayment $e) {

            return redirect()->route(
                'cashier.payment',
                [$e->payment->id, 'redirect' => route('billing.index')]
            );
        }

    }

    public function changingPlans(){

        auth()->user()->subscription($this->name)->swap($this->price);

        $this->emitTo('invoice', 'render');

        $this->emitTo('subscriptions', 'render');

    }

    public function cancellingSubscription(){

        auth()->user()->subscription($this->name)->cancel();

        $this->emitTo('subscriptions', 'render');

    }

    public function resumingSubscription(){

        auth()->user()->subscription($this->name)->resume();

        $this->emitTo('subscriptions', 'render');

    }

    public function render()
    {
        return view('livewire.subscriptions');
    }
}
