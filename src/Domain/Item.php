<?php
declare(strict_types=1);

namespace Domain;

use Domain\Model\ItemInterface;

class Item implements ItemInterface
{
    private $name;
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
