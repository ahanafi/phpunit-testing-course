<?php


use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIdIsAnInteger(): void
    {
        $product = new Product();

        $reflector = new ReflectionClass(Product::class);
        $property = $reflector->getProperty('productId');
        $property->setAccessible(true);
        $value = $property->getValue($product); //get value of protected property
        self::assertIsInt($value);
    }
}