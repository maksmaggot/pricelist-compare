<?php

namespace Comparator;

use Comparator\Entity\Product;
use PHPUnit\Framework\TestCase;

class PriceListsComparatorTest extends TestCase
{
    public function testCompare()
    {
        $firstPriceList = new PriceList();
        $firstPriceList->add(
            new Product(
                'Ноутбук Acer Aspire 3 A315-42G-R300 15.6',
                '1920x1080 AMD Ryzen 7 3700U 2.3GHz 12Gb RAM 512Gb SSD',
                '59700'
            )
        );

        $firstPriceList->add(new Product(
                'Ноутбук Acer Aspire 3 A315-42G-R47B 15.6',
                '1920x1080 AMD Ryzen 3 3200U 2.6GHz 4Gb RAM 512Gb SSD',
                '35200'
            )
        );

        $firstPriceList->add(new Product(
                'Ноутбук Acer Aspire 3 A315-42G-R6EF 15.6',
                '1920x1080 AMD Ryzen 3 3200U 2.6GHz 8Gb RAM 512Gb SSD',
                '41900'
            )
        );

        $secondPriceList = new PriceList();
        $secondPriceList->add(new Product(
                'Ноутбук Acer Aspire 3 A315-42G-R300 15.6',
                '1920x1080 AMD Ryzen 7 3700U 2.3GHz 12Gb RAM 512Gb SSD',
                '59700'
            )
        );
        $secondPriceList->add(new Product(
                'Ноутбук Acer Aspire 5 A315-42G-R47B 15.6',
                '1920x1080 AMD Ryzen 3 3200U 2.6GHz 4Gb RAM 512Gb SSD',
                '35100'
            )
        );

        $secondPriceList->add(new Product(
                'Ноутбук Acer Aspire 3 A315-42G-R6EF 15.6',
                '1920x1080 AMD Ryzen 3 3200U 2.6GHz 8Gb RAM 512Gb SSD',
                '40900'
            )
        );

        $priceListsComparator = new PriceListsComparator();
        $compareResult = $priceListsComparator->compare(
            $firstPriceList,
            $secondPriceList
        );

        self::assertEquals(
            [
                new Product(
                    'Ноутбук Acer Aspire 3 A315-42G-R47B 15.6',
                    '1920x1080 AMD Ryzen 3 3200U 2.6GHz 4Gb RAM 512Gb SSD',
                    '35200'
                )
            ],
            $compareResult->getDeleted());


        self::assertEquals(
            [
                new Product(
                    'Ноутбук Acer Aspire 3 A315-42G-R6EF 15.6',
                    '1920x1080 AMD Ryzen 3 3200U 2.6GHz 8Gb RAM 512Gb SSD',
                    '40900'
                )
            ],
            $compareResult->getUpdated()
        );

        self::assertEquals([
            new Product(
                'Ноутбук Acer Aspire 5 A315-42G-R47B 15.6',
                '1920x1080 AMD Ryzen 3 3200U 2.6GHz 4Gb RAM 512Gb SSD',
                '35100'
            )
        ],
        $compareResult->getAdded()
        );
    }
}
