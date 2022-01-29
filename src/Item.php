<?php

class Item
{
    private function getToken(): string
    {
        return uniqid('', true);
    }
}