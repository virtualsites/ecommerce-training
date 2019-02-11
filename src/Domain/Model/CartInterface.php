<?php
declare(strict_types=1);

namespace Domain\Model;

interface CartInterface
{
    public function getTotal(): float;
    public function addItem(ItemInterface $item): void;
    public function changeTotal(float $total): void;
}
