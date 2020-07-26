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

            $secondPriceListProduct = $secondPriceList->get($key);
            if (!$product->equals($secondPriceListProduct)) {
                $compareResult->appendUpdated($secondPriceListProduct);
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
