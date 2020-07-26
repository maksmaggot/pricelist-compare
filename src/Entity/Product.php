<?php


namespace Comparator\Entity;


class Product
{
    public string $name;
    public string $description;
    public float $price;

    public function __construct(string $name, string $description, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getKey(): string
    {
        return md5($this->name);
    }

    public function equals(Product $product): bool
    {
        if (
            $this->nameEquals($product->name)
            && $this->descriptionEquals($product->description)
            && $this->priceEquals($product->price)
        ) {
            return true;
        }
        return false;
    }

    private function nameEquals(string $name): bool
    {
        return $this->name === $name;
    }

    private function descriptionEquals(string $description): bool
    {
        return $this->description === $description;
    }

    private function priceEquals(float $price): bool
    {
        return $this->price === $price;
    }
}
