<?php

namespace Comparator\Reader;


use Comparator\PriceList;

interface PriceListReader
{
    /**
     * @param string $path
     * @return PriceList
     *
     * @throws \InvalidArgumentException
     */
    public function read(string $path): PriceList;
}