<?php

class Item
{
    private function getToken(): string
    {
        return uniqid('', true);
    }

    private function getPrefixedToken(string $prefix): string
    {
        return uniqid($prefix, true);
    }
}