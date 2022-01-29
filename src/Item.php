<?php

class Item
{
    public function getDescription(): string
    {
        return $this->getId() . $this->getToken();
    }

    protected function getId(): int
    {
        return mt_rand();
    }

    private function getToken(): string
    {
        return uniqid('', true);
    }
}