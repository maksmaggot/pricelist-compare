<?php

namespace Comparator;

use Comparator\Entity\Product;

class CompareResult
{
    /**
     * @var Product[]
     */
    private array $deleted = [];

    /**
     * @var Product[]
     */
    private array $added = [];

    /**
     * @var Product[]
     */
    private array $updated = [];

    public function getDeleted(): array
    {
        return $this->deleted;
    }

    public function getAdded(): array
    {
        return $this->added;
    }

    public function getUpdated(): array
    {
        return $this->updated;
    }

    public function appendDeleted(Product $product): void
    {
        $this->deleted[] = $product;
    }

    public function appendUpdated(Product $product): void
    {
        $this->updated[] = $product;
    }

    public function appendAdded(Product $product): void
    {
        $this->added[] = $product;
    }
}
