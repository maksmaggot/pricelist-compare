<?php

use Comparator\Entity\Product;
use Comparator\Reader\CsvPriceListReader;
use PHPUnit\Framework\TestCase;

class CsvReaderTest extends TestCase
{
    public function testRead()
    {
        $reader = new CsvPriceListReader();
        $result = $reader->read(__DIR__ . '/../testdata/pricelist.csv');
        self::assertEquals(
            new Product(
                'Ноутбук Acer Aspire 7 A715-75G-73DV 15.6',
                '1920x1080 Intel Core i7-9750H 2.6GHz 8Gb RAM 512Gb SSD',
                87700
            ), $result->toArray()['cf4f270019cd5d280ee225e579822df1']
        );
    }

    public function testReadException()
    {
        self::expectException(\InvalidArgumentException::class);

        $reader = new CsvPriceListReader();
        $reader->read('notfound.csv');
    }
}
