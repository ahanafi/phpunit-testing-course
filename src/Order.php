<?php

class Order
{
    public $amount = 0;

    protected PaymentGateway $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function proccess()
    {
        return $this->gateway->charge($this->amount);
    }
}