<?php


namespace Comparator;

use Comparator\Entity\Product;

class PriceList implements \Iterator
{
    /**
     * @var Product[]
     */
    private array $elements = [];

    /**
     * @return Product[]
     */
    public function toArray(): array
    {
        return $this->elements;
    }

    public function add(Product $product): void
    {
        $this->elements[$product->getKey()] = $product;
    }

    public function get(string $key): ?Product
    {
        return $this->elements[$key] ?? null;
    }

    public function rewind()
    {
        return reset($this->elements);
    }

    public function current()
    {
        return current($this->elements);
    }

    public function next()
    {
        return next($this->elements);
    }

    public function key()
    {
        return key($this->elements);
    }

    public function valid()
    {
        return key($this->elements) !== null;
    }
}
