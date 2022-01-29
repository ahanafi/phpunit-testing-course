<?php

class Product
{
    protected int $productId;

    public function __construct()
    {
        $this->productId = mt_rand();
    }
}