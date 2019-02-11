<?php
declare(strict_types=1);

namespace Domain;

use Domain\Model\TotalInterface;

class Total implements TotalInterface
{
    private $value = 00.00;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function add(float $value) : void
    {
        $this->value += $value;
    }

    public function change(float $value) : void
    {
        $this->value = $value;
    }

    public function toFloat(): float
    {
        return $this->value;
    }
}
