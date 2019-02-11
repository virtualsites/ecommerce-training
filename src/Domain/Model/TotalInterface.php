<?php
declare(strict_types=1);

namespace Domain\Model;

interface TotalInterface
{
    public function toFloat(): float;
}
