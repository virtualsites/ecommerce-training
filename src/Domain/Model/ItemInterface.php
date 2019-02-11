<?php
declare(strict_types=1);

namespace Domain\Model;

interface ItemInterface
{
    public function getPrice(): float;
}
