<?php

namespace Comparator\Reader;

use Comparator\Entity\Product;
use Comparator\PriceList;

class CsvPriceListReader implements PriceListReader
{
    /**
     * @inheritDoc
     */
    public function read(string $path): PriceList
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException('Wrong path to file.File not found.');
        }

        $priceList = new PriceList();

        $headers = null;
        $handler = fopen($path, 'r');
        while ($line = fgetcsv($handler, 1000, ";")) {
            if (!$headers) {
                $headers = $line;
                continue;
            }

            $priceList->add(new Product($line[0], $line[1], $line[2]));
        }
        return $priceList;
    }
}