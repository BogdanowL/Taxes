<?php

namespace App\Service;

use App\Entity\Product;
use App\Service\Interface\IComputePrice;

class ComputePrice implements IComputePrice
{

    public function compute(Product $product) : float
    {
        $price = $product->getPrice();
        $taxResident = $product->getTaxResident();
        $tax = $taxResident->getTaxPercentage();

        return $price + $price * ($tax / 100);
    }



}