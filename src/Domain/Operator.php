<?php
declare(strict_types=1);

namespace Domain;

use Domain\Model\CartInterface;

class Operator
{
    private $cart;
    private $isCustomer;
    private $operatorPriceModifier;

    public function __construct(CartInterface $cart, bool $isCustomer, float $operatorPriceModifier)
    {
        $this->cart = $cart;
        $this->isCustomer = $isCustomer;
        $this->operatorPriceModifier = $operatorPriceModifier;
    }

    public function toArray(): array
    {
        return [
            'oldTotal' => $this->cart->getTotal(),
            'newTotal' => $this->getNewTotal(),
        ];
    }

    private function getNewTotal(): float
    {
        $oldTotal = $this->cart->getTotal();
        $newTotal = $oldTotal;

        if ($this->isCustomer) {
            $modifier = ($this->operatorPriceModifier / 100);
            $newTotal = $oldTotal * $modifier;
        }

        return $newTotal;
    }
}
