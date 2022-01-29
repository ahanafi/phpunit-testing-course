<?php

class Order
{
    public float $amount = 0;
    public int $quantity;
    public float $unitPrice;

    public function __construct(int $quantity, float $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;

        $this->amount = $quantity * $unitPrice;
    }

    /**
     * @param PaymentGateway $gateway
     * @return mixed
     */
    public function proccess(PaymentGateway $gateway)
    {
        return $gateway->charge($this->amount);
    }
}