<?php

namespace Comparator;

class PriceListsComparator
{
    public function compare(PriceList $firstPriceList, PriceList $secondPriceList): CompareResult
    {
        $compareResult = new CompareResult();
        foreach ($firstPriceList as $key => $product) {
            if (!$secondPriceList->get($key)) {
                $compareResult->appendDeleted($product);
                continue;
            }

            if (!$product->equals($secondPriceList->get($key))) {
                $compareResult->appendUpdated($secondPriceList->get($key));
            }
        }

        foreach ($secondPriceList as $key => $product) {
            if (!$firstPriceList->get($key)) {
                $compareResult->appendAdded($product);
            }
        }

        return $compareResult;
    }
}
