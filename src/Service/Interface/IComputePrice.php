<?php

namespace App\Service\Interface;

use App\Entity\Product;

interface IComputePrice
{
    public function compute(Product $product);
}