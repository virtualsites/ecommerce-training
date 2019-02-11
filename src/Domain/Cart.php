<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemsCollection;
use Domain\Model\CartInterface;
use Domain\Model\ItemInterface;

class Cart implements CartInterface
{
    protected $items;
    protected $total;

    public static function empty()
    {
        return new self(new ItemsCollection);
    }

    public static function withDemonstratedItems() : Cart
    {
        return new self(
            new ItemsCollection([
                [
                    'name' => 'TV LCD',
                    'price' => 100
                ],
                [
                    'name' => 'Samsung S1000',
                    'price' => 200,
                ]
            ])
        );
    }

    public function __construct(ItemsCollection $items)
    {
        $this->items = $items;
        $this->total = new Total(00.00);
        $this->initTotal();
    }

    public function addItem(ItemInterface $item): void
    {
        $this->items->add($item);
        $this->total->add($item->getPrice());
    }

    public function getTotal(): float
    {
        return $this->total->toFloat();
    }

    public function changeTotal(float $total): void
    {
        $this->total->change($total);
    }

    private function initTotal() : void
    {
        /** @var Item $item */
        foreach ($this->items as $item) {
            $this->total->add($item->getPrice());
        }
    }
}
